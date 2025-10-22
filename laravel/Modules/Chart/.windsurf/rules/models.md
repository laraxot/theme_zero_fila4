# Regole Modelli

## Indice
- [Regole Fondamentali](#regole-fondamentali)
- [Struttura](#struttura)
- [Best Practices](#best-practices)
- [Checklist](#checklist)

## Regole Fondamentali

### Modelli
- **REGOLA FONDAMENTALE**: Ogni modello deve estendere il modello base del modulo
- Implementare trait obbligatori
- Documentare il modello
- Testare il modello

### Esempio Corretto
```php
// CORRETTO
class Doctor extends User
{
    use HasParent;
    
    protected $fillable = [
        'name',
        'email',
        'phone',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function getCasts(): array
    {
        return array_merge(parent::getCasts(), $this->casts);
    }
}
```

### Esempio Errato
```php
// ERRATO
class Doctor extends Model // ❌ Non estende User
{
    use HasFactory; // ❌ Duplicato in User
    
    protected $fillable = [
        'name',
        'email',
        'phone',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
```

## Struttura

### Regole Fondamentali
1. **Namespace**
   - `App\Models`
   - `Modules\{Module}\Models`

2. **Nome Classe**
   - Nome descrittivo
   - PascalCase
   - No suffisso Model

3. **Metodi**
   - `getCasts()`: Override casts
   - `getFillable()`: Override fillable
   - `getHidden()`: Override hidden
   - `getVisible()`: Override visible

### Esempi

#### Modello Base
```php
// CORRETTO
class Doctor extends User
{
    use HasParent;
    
    protected $fillable = [
        'name',
        'email',
        'phone',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function getCasts(): array
    {
        return array_merge(parent::getCasts(), $this->casts);
    }
}

// ERRATO
class Doctor extends Model // ❌ Non estende User
{
    use HasFactory; // ❌ Duplicato in User
    
    protected $fillable = [
        'name',
        'email',
        'phone',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
```

#### Modello con Relazioni
```php
// CORRETTO
class Doctor extends User
{
    use HasParent;
    
    protected $fillable = [
        'name',
        'email',
        'phone',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function getCasts(): array
    {
        return array_merge(parent::getCasts(), $this->casts);
    }
    
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
    
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
    
    public function patients(): HasMany
    {
        return $this->hasMany(Patient::class);
    }
}

// ERRATO
class Doctor extends Model // ❌ Non estende User
{
    use HasFactory; // ❌ Duplicato in User
    
    protected $fillable = [
        'name',
        'email',
        'phone',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function role() // ❌ No return type
    {
        return $this->belongsTo(Role::class);
    }
    
    public function department() // ❌ No return type
    {
        return $this->belongsTo(Department::class);
    }
    
    public function patients() // ❌ No return type
    {
        return $this->hasMany(Patient::class);
    }
}
```

#### Modello con Accessori e Mutatori
```php
// CORRETTO
class Doctor extends User
{
    use HasParent;
    
    protected $fillable = [
        'name',
        'email',
        'phone',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function getCasts(): array
    {
        return array_merge(parent::getCasts(), $this->casts);
    }
    
    public function getFullNameAttribute(): string
    {
        return "{$this->name} {$this->surname}";
    }
    
    public function setPhoneAttribute(?string $value): void
    {
        $this->attributes['phone'] = $value ? preg_replace('/[^0-9]/', '', $value) : null;
    }
}

// ERRATO
class Doctor extends Model // ❌ Non estende User
{
    use HasFactory; // ❌ Duplicato in User
    
    protected $fillable = [
        'name',
        'email',
        'phone',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function getFullName() // ❌ No attribute, no return type
    {
        return $this->name . ' ' . $this->surname;
    }
    
    public function setPhone($value) // ❌ No attribute, no type hint, no return type
    {
        $this->phone = preg_replace('/[^0-9]/', '', $value);
    }
}
```

## Best Practices

### Regole Fondamentali
1. **Modelli**
   - Classe dedicata
   - Estensione corretta
   - Trait obbligatori
   - Documentazione

2. **Proprietà**
   - Fillable
   - Casts
   - Hidden
   - Visible

3. **Metodi**
   - Relazioni
   - Accessori
   - Mutatori
   - Scope

4. **Test**
   - Test unitari
   - Test integrazione
   - Test relazioni
   - Test performance

### Esempi

#### Modello Completo
```php
// CORRETTO
class Doctor extends User
{
    use HasParent;
    
    protected $fillable = [
        'name',
        'email',
        'phone',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    protected $visible = [
        'id',
        'name',
        'email',
        'phone',
    ];
    
    public function getCasts(): array
    {
        return array_merge(parent::getCasts(), $this->casts);
    }
    
    public function getFillable(): array
    {
        return array_merge(parent::getFillable(), $this->fillable);
    }
    
    public function getHidden(): array
    {
        return array_merge(parent::getHidden(), $this->hidden);
    }
    
    public function getVisible(): array
    {
        return array_merge(parent::getVisible(), $this->visible);
    }
    
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
    
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
    
    public function patients(): HasMany
    {
        return $this->hasMany(Patient::class);
    }
    
    public function getFullNameAttribute(): string
    {
        return "{$this->name} {$this->surname}";
    }
    
    public function setPhoneAttribute(?string $value): void
    {
        $this->attributes['phone'] = $value ? preg_replace('/[^0-9]/', '', $value) : null;
    }
    
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('active', true);
    }
    
    public function scopeInDepartment(Builder $query, int $departmentId): Builder
    {
        return $query->where('department_id', $departmentId);
    }
}

// ERRATO
class Doctor extends Model // ❌ Non estende User
{
    use HasFactory; // ❌ Duplicato in User
    
    protected $fillable = [
        'name',
        'email',
        'phone',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    protected $visible = [
        'id',
        'name',
        'email',
        'phone',
    ];
    
    public function role() // ❌ No return type
    {
        return $this->belongsTo(Role::class);
    }
    
    public function department() // ❌ No return type
    {
        return $this->belongsTo(Department::class);
    }
    
    public function patients() // ❌ No return type
    {
        return $this->hasMany(Patient::class);
    }
    
    public function getFullName() // ❌ No attribute, no return type
    {
        return $this->name . ' ' . $this->surname;
    }
    
    public function setPhone($value) // ❌ No attribute, no type hint, no return type
    {
        $this->phone = preg_replace('/[^0-9]/', '', $value);
    }
    
    public function scopeActive($query) // ❌ No type hint, no return type
    {
        return $query->where('active', true);
    }
    
    public function scopeInDepartment($query, $departmentId) // ❌ No type hint, no return type
    {
        return $query->where('department_id', $departmentId);
    }
}
```

## Checklist

### Per Ogni Modello
- [ ] Classe dedicata
- [ ] Estensione corretta
- [ ] Trait obbligatori
- [ ] Documentata

### Per Proprietà
- [ ] Fillable
- [ ] Casts
- [ ] Hidden
- [ ] Visible

### Per Metodi
- [ ] Relazioni
- [ ] Accessori
- [ ] Mutatori
- [ ] Scope

### Per Test
- [ ] Unitari
- [ ] Integrazione
- [ ] Relazioni
- [ ] Performance
- [ ] Copertura 

## Regole Aggiuntive
- Le relazioni tra Studio e Doctor devono usare solo belongsToManyX senza chaining superfluo (niente ->using, ->withPivot, ->withTimestamps). Motivazione: DRY, centralizzazione, zen, nessun lock-in. Vedi anche: [<nome progetto>/docs/models/doctor.md](../../laravel/Modules/<nome progetto>/docs/models/doctor.md)
- I trait SoftDeletes, BelongsToTenant e RelationX NON vanno mai aggiunti direttamente a Doctor (o a modelli che ereditano da BaseUser), perché già presenti nella catena di ereditarietà. Motivazione: DRY, coerenza, zen, evitare conflitti. Vedi anche: [<nome progetto>/docs/models/doctor.md](../../laravel/Modules/<nome progetto>/docs/models/doctor.md)
- Nelle migrazioni delle tabelle pivot usare sempre foreignIdFor(Modello::class) per le chiavi esterne, mai uuid manuale. Motivazione: coerenza, type safety, migliore integrazione con Eloquent, filosofia zen. Vedi anche: [<nome progetto>/docs/models/doctor.md](../../laravel/Modules/<nome progetto>/docs/models/doctor.md)
- Chi estende XotBaseMigration non deve mai dichiarare il metodo down(): è già gestito dalla base o non richiesto. Motivazione: DRY, centralizzazione, zen, nessun lock-in. Vedi anche: [<nome progetto>/docs/models/doctor.md](../../laravel/Modules/<nome progetto>/docs/models/doctor.md)
- Nelle migrazioni che estendono XotBaseMigration non si usa mai $table->timestamps(), ma si usa sempre $this->tableUpdate con updateTimestamps($table, true) dopo la creazione della tabella. Motivazione: centralizzazione, coerenza, DRY, gestione automatica di soft delete e campi utente, filosofia zen. Vedi anche: [<nome progetto>/docs/models/doctor.md](../../laravel/Modules/<nome progetto>/docs/models/doctor.md)
- Chi estende BasePivot non deve mai dichiarare protected $table: la gestione del nome tabella è centralizzata in BasePivot/Xot. Motivazione: DRY, coerenza, nessun lock-in, filosofia zen. Vedi anche: [<nome progetto>/docs/models/doctor.md](../../laravel/Modules/<nome progetto>/docs/models/doctor.md)
- Ogni RelationManager che gestisce relazioni cross-db (es. Studio-Doctor) deve implementare AttachAction personalizzato su entrambi i lati, con query manuali e connessione esplicita tramite on(). Motivazione: simmetria, coerenza, nessun lock-in, policy multi-tenant, zen. Vedi anche: [<nome progetto>/docs/filament-relation-managers.md](../../laravel/Modules/<nome progetto>/docs/filament-relation-managers.md)
