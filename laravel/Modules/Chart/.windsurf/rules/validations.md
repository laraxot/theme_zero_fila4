# Regole Validazioni

## Indice
- [Regole Fondamentali](#regole-fondamentali)
- [Struttura](#struttura)
- [Best Practices](#best-practices)
- [Checklist](#checklist)

## Regole Fondamentali

### Validazioni
- **REGOLA FONDAMENTALE**: Ogni validazione deve essere una classe dedicata
- Estendere `Illuminate\Validation\Rule`
- Implementare metodi obbligatori
- Documentare la validazione
- Testare la validazione

### Esempio Corretto
```php
// CORRETTO
class UniqueEmailRule extends Rule
{
    public function __construct(
        protected ?string $ignore = null
    ) {
    }
    
    public function passes($attribute, $value): bool
    {
        $query = User::query()->where('email', $value);
        
        if ($this->ignore) {
            $query->where('id', '!=', $this->ignore);
        }
        
        return !$query->exists();
    }
    
    public function message(): string
    {
        return __('validation.unique', ['attribute' => 'email']);
    }
}

// ERRATO
class UniqueEmailRule extends Rule
{
    public function passes($attribute, $value): bool
    {
        return !User::where('email', $value)->exists(); // ❌ No ignore
    }
    
    public function message(): string
    {
        return 'Email already exists'; // ❌ No traduzione
    }
}
```

## Struttura

### Regole Fondamentali
1. **Namespace**
   - `App\Rules`
   - `Modules\{Module}\Rules`

2. **Nome Classe**
   - Suffisso `Rule`
   - Nome descrittivo
   - PascalCase

3. **Metodi**
   - `__construct()`: Parametri
   - `passes()`: Validazione
   - `message()`: Messaggio

### Esempi

#### Regola Base
```php
// CORRETTO
class RequiredRule extends Rule
{
    public function passes($attribute, $value): bool
    {
        return !empty($value);
    }
    
    public function message(): string
    {
        return __('validation.required', ['attribute' => $attribute]);
    }
}

// ERRATO
class RequiredRule extends Rule
{
    public function passes($attribute, $value): bool
    {
        return $value !== null; // ❌ No controllo empty
    }
    
    public function message(): string
    {
        return 'Field is required'; // ❌ No traduzione
    }
}
```

#### Regola con Parametri
```php
// CORRETTO
class MinLengthRule extends Rule
{
    public function __construct(
        protected int $length
    ) {
    }
    
    public function passes($attribute, $value): bool
    {
        return strlen($value) >= $this->length;
    }
    
    public function message(): string
    {
        return __('validation.min.string', [
            'attribute' => $attribute,
            'min' => $this->length,
        ]);
    }
}

// ERRATO
class MinLengthRule extends Rule
{
    public function passes($attribute, $value): bool
    {
        return strlen($value) >= 8; // ❌ No parametro
    }
    
    public function message(): string
    {
        return 'Minimum length is 8'; // ❌ No traduzione
    }
}
```

## Best Practices

### Regole Fondamentali
1. **Validazioni**
   - Classe dedicata
   - Metodi obbligatori
   - Documentazione
   - Test unitari

2. **Regole**
   - Array di regole
   - Traduzioni
   - Test regole
   - Log errori

3. **Test**
   - Test unitari
   - Test integrazione
   - Test UI
   - Test performance

### Esempi

#### Regola Completa
```php
// CORRETTO
class PasswordRule extends Rule
{
    public function __construct(
        protected bool $requireUppercase = true,
        protected bool $requireLowercase = true,
        protected bool $requireNumbers = true,
        protected bool $requireSpecialChars = true,
        protected int $minLength = 8
    ) {
    }
    
    public function passes($attribute, $value): bool
    {
        if (strlen($value) < $this->minLength) {
            return false;
        }
        
        if ($this->requireUppercase && !preg_match('/[A-Z]/', $value)) {
            return false;
        }
        
        if ($this->requireLowercase && !preg_match('/[a-z]/', $value)) {
            return false;
        }
        
        if ($this->requireNumbers && !preg_match('/[0-9]/', $value)) {
            return false;
        }
        
        if ($this->requireSpecialChars && !preg_match('/[^A-Za-z0-9]/', $value)) {
            return false;
        }
        
        return true;
    }
    
    public function message(): string
    {
        $requirements = [];
        
        if ($this->requireUppercase) {
            $requirements[] = __('validation.password.uppercase');
        }
        
        if ($this->requireLowercase) {
            $requirements[] = __('validation.password.lowercase');
        }
        
        if ($this->requireNumbers) {
            $requirements[] = __('validation.password.numbers');
        }
        
        if ($this->requireSpecialChars) {
            $requirements[] = __('validation.password.special_chars');
        }
        
        $requirements[] = __('validation.password.min_length', ['min' => $this->minLength]);
        
        return __('validation.password.invalid', [
            'requirements' => implode(', ', $requirements),
        ]);
    }
}

// ERRATO
class PasswordRule extends Rule
{
    public function passes($attribute, $value): bool
    {
        return strlen($value) >= 8; // ❌ No controlli complessi
    }
    
    public function message(): string
    {
        return 'Password must be at least 8 characters'; // ❌ No traduzione
    }
}
```

## Checklist

### Per Ogni Validazione
- [ ] Classe dedicata
- [ ] Metodi obbligatori
- [ ] Documentata
- [ ] Testata

### Per Regole
- [ ] Array di regole
- [ ] Traduzioni
- [ ] Testate
- [ ] Loggate

### Per Test
- [ ] Unitari
- [ ] Integrazione
- [ ] UI
- [ ] Performance
- [ ] Copertura 
