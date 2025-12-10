# Regole Migrazioni

## Indice
- [Regole Fondamentali](#regole-fondamentali)
- [Struttura](#struttura)
- [Best Practices](#best-practices)
- [Checklist](#checklist)

## Regole Fondamentali

### Migrazioni
- **REGOLA FONDAMENTALE**: Ogni migrazione deve estendere `XotBaseMigration`
- Implementare solo il metodo `up()`
- Non implementare il metodo `down()`
- Documentare la migrazione

### Esempio Corretto
```php
// CORRETTO
return new class extends XotBaseMigration
{
    public function up(): void
    {
        $this->tableUpdate('users', function (Blueprint $table) {
            if (!$table->hasColumn('name')) {
                $table->string('name')->nullable();
            }
            
            if (!$table->hasColumn('email')) {
                $table->string('email')->unique();
            }
            
            if (!$table->hasColumn('phone')) {
                $table->string('phone')->nullable();
            }
        });
    }
};
```

### Esempio Errato
```php
// ERRATO
class CreateUsersTable extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // ❌ No controllo esistenza
            $table->string('email')->unique(); // ❌ No controllo esistenza
            $table->string('phone'); // ❌ No controllo esistenza
            $table->timestamps();
        });
    }
    
    public function down(): void // ❌ No down
    {
        Schema::dropIfExists('users');
    }
}
```

## Struttura

### Regole Fondamentali
1. **Namespace**
   - `database/migrations`
   - `Modules/{Module}/database/migrations`

2. **Nome File**
   - Timestamp
   - Nome descrittivo
   - Snake case

3. **Metodi**
   - `up()`: Creazione/modifica tabelle
   - No `down()`

### Esempi

#### Migrazione Base
```php
// CORRETTO
return new class extends XotBaseMigration
{
    public function up(): void
    {
        $this->tableUpdate('users', function (Blueprint $table) {
            if (!$table->hasColumn('name')) {
                $table->string('name')->nullable();
            }
            
            if (!$table->hasColumn('email')) {
                $table->string('email')->unique();
            }
            
            if (!$table->hasColumn('phone')) {
                $table->string('phone')->nullable();
            }
        });
    }
};

// ERRATO
class CreateUsersTable extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // ❌ No controllo esistenza
            $table->string('email')->unique(); // ❌ No controllo esistenza
            $table->string('phone'); // ❌ No controllo esistenza
            $table->timestamps();
        });
    }
    
    public function down(): void // ❌ No down
    {
        Schema::dropIfExists('users');
    }
}
```

#### Migrazione con Indici
```php
// CORRETTO
return new class extends XotBaseMigration
{
    public function up(): void
    {
        $this->tableUpdate('users', function (Blueprint $table) {
            if (!$table->hasColumn('name')) {
                $table->string('name')->nullable();
            }
            
            if (!$table->hasColumn('email')) {
                $table->string('email')->unique();
            }
            
            if (!$table->hasColumn('phone')) {
                $table->string('phone')->nullable();
            }
            
            if (!$table->hasIndex(['email'])) {
                $table->index('email');
            }
            
            if (!$table->hasIndex(['phone'])) {
                $table->index('phone');
            }
        });
    }
};

// ERRATO
class CreateUsersTable extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // ❌ No controllo esistenza
            $table->string('email')->unique(); // ❌ No controllo esistenza
            $table->string('phone'); // ❌ No controllo esistenza
            $table->timestamps();
            
            $table->index('email'); // ❌ No controllo esistenza
            $table->index('phone'); // ❌ No controllo esistenza
        });
    }
    
    public function down(): void // ❌ No down
    {
        Schema::dropIfExists('users');
    }
}
```

#### Migrazione con Relazioni
```php
// CORRETTO
return new class extends XotBaseMigration
{
    public function up(): void
    {
        $this->tableUpdate('users', function (Blueprint $table) {
            if (!$table->hasColumn('name')) {
                $table->string('name')->nullable();
            }
            
            if (!$table->hasColumn('email')) {
                $table->string('email')->unique();
            }
            
            if (!$table->hasColumn('phone')) {
                $table->string('phone')->nullable();
            }
            
            if (!$table->hasColumn('role_id')) {
                $table->foreignId('role_id')->nullable()->constrained('roles')->nullOnDelete();
            }
            
            if (!$table->hasColumn('department_id')) {
                $table->foreignId('department_id')->nullable()->constrained('departments')->nullOnDelete();
            }
        });
    }
};

// ERRATO
class CreateUsersTable extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // ❌ No controllo esistenza
            $table->string('email')->unique(); // ❌ No controllo esistenza
            $table->string('phone'); // ❌ No controllo esistenza
            $table->timestamps();
            
            $table->foreignId('role_id')->constrained('roles'); // ❌ No controllo esistenza, no nullOnDelete
            $table->foreignId('department_id')->constrained('departments'); // ❌ No controllo esistenza, no nullOnDelete
        });
    }
    
    public function down(): void // ❌ No down
    {
        Schema::dropIfExists('users');
    }
}
```

## Best Practices

### Regole Fondamentali
1. **Migrazioni**
   - Classe anonima
   - XotBaseMigration
   - Solo up()
   - Documentazione

2. **Tabelle**
   - Controllo esistenza
   - Controllo colonne
   - Controllo indici
   - Controllo relazioni

3. **Colonne**
   - Nullable quando possibile
   - Lunghezza massima
   - Valori di default
   - Commenti

4. **Test**
   - Test unitari
   - Test integrazione
   - Test rollback
   - Test performance

### Esempi

#### Migrazione Completa
```php
// CORRETTO
return new class extends XotBaseMigration
{
    public function up(): void
    {
        $this->tableUpdate('users', function (Blueprint $table) {
            if (!$table->hasColumn('name')) {
                $table->string('name')->nullable()->comment('Nome utente');
            }
            
            if (!$table->hasColumn('email')) {
                $table->string('email')->unique()->comment('Email utente');
            }
            
            if (!$table->hasColumn('phone')) {
                $table->string('phone')->nullable()->comment('Telefono utente');
            }
            
            if (!$table->hasColumn('role_id')) {
                $table->foreignId('role_id')->nullable()->constrained('roles')->nullOnDelete()->comment('Ruolo utente');
            }
            
            if (!$table->hasColumn('department_id')) {
                $table->foreignId('department_id')->nullable()->constrained('departments')->nullOnDelete()->comment('Dipartimento utente');
            }
            
            if (!$table->hasIndex(['email'])) {
                $table->index('email');
            }
            
            if (!$table->hasIndex(['phone'])) {
                $table->index('phone');
            }
            
            if (!$table->hasIndex(['role_id'])) {
                $table->index('role_id');
            }
            
            if (!$table->hasIndex(['department_id'])) {
                $table->index('department_id');
            }
        });
    }
};

// ERRATO
class CreateUsersTable extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // ❌ No controllo esistenza, no nullable, no comment
            $table->string('email')->unique(); // ❌ No controllo esistenza, no comment
            $table->string('phone'); // ❌ No controllo esistenza, no nullable, no comment
            $table->timestamps();
            
            $table->foreignId('role_id')->constrained('roles'); // ❌ No controllo esistenza, no nullOnDelete, no comment
            $table->foreignId('department_id')->constrained('departments'); // ❌ No controllo esistenza, no nullOnDelete, no comment
            
            $table->index('email'); // ❌ No controllo esistenza
            $table->index('phone'); // ❌ No controllo esistenza
            $table->index('role_id'); // ❌ No controllo esistenza
            $table->index('department_id'); // ❌ No controllo esistenza
        });
    }
    
    public function down(): void // ❌ No down
    {
        Schema::dropIfExists('users');
    }
}
```

## Checklist

### Per Ogni Migrazione
- [ ] Classe anonima
- [ ] XotBaseMigration
- [ ] Solo up()
- [ ] Documentata

### Per Tabelle
- [ ] Controllo esistenza
- [ ] Controllo colonne
- [ ] Controllo indici
- [ ] Controllo relazioni

### Per Colonne
- [ ] Nullable quando possibile
- [ ] Lunghezza massima
- [ ] Valori di default
- [ ] Commenti

### Per Test
- [ ] Unitari
- [ ] Integrazione
- [ ] Rollback
- [ ] Performance
- [ ] Copertura 
