---
trigger: always_on
description: Regole per le proprietà dei modelli Laraxot
globs: ["**/Models/*.php"]
---

# Regole per le Proprietà dei Modelli Laraxot

## Proprietà Standard: Definizione e Tipizzazione

### Proprietà `$fillable`
- Deve essere sempre `protected`
- Deve essere annotata con `/** @var list<string> */`
- Deve contenere solo campi effettivamente fillable
- Mai usare `protected $guarded = []` come alternativa

```php
/** @var list<string> */
protected $fillable = ['nome', 'cognome', 'email'];
```

### Proprietà `$hidden`
- Deve essere sempre `protected`
- Deve essere annotata con `/** @var list<string> */`
- Deve contenere campi sensibili da nascondere nelle serializzazioni

```php
/** @var list<string> */
protected $hidden = ['password', 'remember_token'];
```

### Proprietà `$dates`
- Deve essere sempre `protected`
- Deve essere annotata con `/** @var list<string> */`
- Deve contenere solo campi di tipo data/ora oltre a created_at/updated_at

```php
/** @var list<string> */
protected $dates = ['data_nascita', 'data_assunzione'];
```

### Proprietà `$with`
- Deve essere sempre `protected`
- Deve essere annotata con `/** @var list<string> */`
- Deve contenere solo relazioni valide definite nel modello

```php
/** @var list<string> */
protected $with = ['permessi', 'ruoli'];
```

## Casting (IMPORTANTE: Regola aggiornata 2025)

### Proprietà `$casts` (DEPRECATA)
- **Non usare mai** la proprietà `$casts` (deprecata)
- Usare invece il metodo `casts()`

### Metodo `casts()`
- Deve essere `protected`
- Deve restituire `array<string, string>`
- Deve avere PHPDoc corretto

```php
/**
 * Get the attributes that should be cast.
 *
 * @return array<string, string>
 */
protected function casts(): array
{
    return [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'is_active' => 'boolean',
        'score' => 'float',
        'options' => 'array',
        'status' => Status::class, // per enum
    ];
}
```

### Regole di Casting
1. Tutti i campi datetime devono essere cast a 'datetime'
2. Tutti i campi booleani devono essere cast a 'boolean'
3. Tutti i campi numerici devono avere cast appropriato ('integer', 'float')
4. Tutti i campi enum devono essere cast alla rispettiva classe enum
5. Mai usare mutator/accessor dove un semplice cast è sufficiente

## Documentazione PHPDoc per Proprietà

### Proprietà del Modello
Tutte le proprietà accessibili devono essere documentate con PHPDoc:

```php
/**
 * @property int $id
 * @property string $nome
 * @property string $cognome
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Permessi\Models\Permesso> $permessi
 */
class User extends BaseModel
{
    // ...
}
```

### Proprietà di Sola Lettura
Usare `@property-read` per proprietà accessibili solo in lettura:

```php
/**
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Permessi\Models\Permesso> $permessi
 */
```

### Proprietà di Sola Scrittura
Usare `@property-write` per proprietà accessibili solo in scrittura:

```php
/**
 * @property-write string $password
 */
```

## Accessors e Mutators

### Pattern Moderno (Laravel 9+)
Utilizzare la sintassi moderna per accessor e mutator:

```php
// Accessor
protected function nome(): Attribute
{
    return Attribute::make(
        get: fn (string $value): string => ucfirst($value),
    );
}

// Mutator
protected function email(): Attribute
{
    return Attribute::make(
        set: fn (string $value): string => strtolower($value),
    );
}

// Accessor e Mutator
protected function indirizzo(): Attribute
{
    return Attribute::make(
        get: fn (string $value): string => $value,
        set: fn (string $value): string => trim($value),
    );
}
```

### Tipizzazione
- Sempre utilizzare type hints per parametri e valori di ritorno
- Gestire esplicitamente i casi null

## Validazione e Controlli

- Eseguire PHPStan livello 9+ per verificare la corretta tipizzazione
- Controllare che le proprietà `$fillable` corrispondano alle colonne in migrazione
- Verificare che tutti i campi siano documentati in PHPDoc

## Backlink e Riferimenti

- [Modules/Xot/docs/MODEL_BASE_RULES.md](mdc:../../laravel/Modules/Xot/docs/MODEL_BASE_RULES.md)
- [docs/PHPSTAN_FIXES.md](mdc:../../docs/PHPSTAN_FIXES.md)
- [model_casting_rules.md](mdc:model_casting_rules.md)

*Ultimo aggiornamento: maggio 2025*