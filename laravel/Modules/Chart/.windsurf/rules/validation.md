# Regole Validazione

## Indice
- [Regole Fondamentali](#regole-fondamentali)
- [Form Requests](#form-requests)
- [Best Practices](#best-practices)
- [Checklist](#checklist)

## Regole Fondamentali

### Form Requests
- **REGOLA FONDAMENTALE**: Utilizzare form requests
- Estendere `FormRequest`
- Implementare `rules()`
- Implementare `messages()`
- Implementare `attributes()`

### Esempio Corretto
```php
// CORRETTO
class CreateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'L\'email è obbligatoria',
            'email.email' => 'L\'email non è valida',
            'email.unique' => 'L\'email è già in uso',
            'password.required' => 'La password è obbligatoria',
            'password.min' => 'La password deve essere di almeno 8 caratteri',
        ];
    }

    public function attributes(): array
    {
        return [
            'email' => 'Email',
            'password' => 'Password',
        ];
    }
}
```

### Esempio Errato
```php
// ERRATO
class CreateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required'], // ❌ Validazione incompleta
            'password' => ['required'], // ❌ Validazione incompleta
        ];
    }

    // ❌ Manca messages()
    // ❌ Manca attributes()
}
```

## Form Requests

### Regole Fondamentali
1. **Rules**
   - Utilizzare array associativi
   - Utilizzare regole multiple
   - Utilizzare regole custom
   - Documentare regole

2. **Messages**
   - Utilizzare array associativi
   - Utilizzare messaggi personalizzati
   - Utilizzare traduzioni
   - Documentare messaggi

3. **Attributes**
   - Utilizzare array associativi
   - Utilizzare attributi personalizzati
   - Utilizzare traduzioni
   - Documentare attributi

### Esempi

#### Rules Corrette
```php
// CORRETTO
public function rules(): array
{
    return [
        'email' => [
            'required',
            'email',
            'unique:users,email',
            'max:255',
        ],
        'password' => [
            'required',
            'min:8',
            'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
        ],
    ];
}

// ERRATO
public function rules(): array
{
    return [
        'email' => 'required', // ❌ Non array
        'password' => 'required', // ❌ Non array
    ];
}
```

#### Messages Corrette
```php
// CORRETTO
public function messages(): array
{
    return [
        'email.required' => 'L\'email è obbligatoria',
        'email.email' => 'L\'email non è valida',
        'email.unique' => 'L\'email è già in uso',
        'email.max' => 'L\'email non può superare i 255 caratteri',
        'password.required' => 'La password è obbligatoria',
        'password.min' => 'La password deve essere di almeno 8 caratteri',
        'password.regex' => 'La password deve contenere almeno una lettera maiuscola, una minuscola e un numero',
    ];
}

// ERRATO
public function messages(): array
{
    return [
        'email' => 'L\'email è obbligatoria', // ❌ Chiave errata
        'password' => 'La password è obbligatoria', // ❌ Chiave errata
    ];
}
```

#### Attributes Corrette
```php
// CORRETTO
public function attributes(): array
{
    return [
        'email' => 'Email',
        'password' => 'Password',
    ];
}

// ERRATO
public function attributes(): array
{
    return [
        'email' => 'email', // ❌ Non capitalizzato
        'password' => 'password', // ❌ Non capitalizzato
    ];
}
```

## Best Practices

### Regole Fondamentali
1. **Validazione**
   - Validare input prima della creazione
   - Utilizzare form requests
   - Utilizzare validation rules
   - Utilizzare validation messages
   - Utilizzare validation attributes

2. **Regole**
   - Utilizzare regole multiple
   - Utilizzare regole custom
   - Documentare regole
   - Testare regole

3. **Messaggi**
   - Utilizzare messaggi personalizzati
   - Utilizzare traduzioni
   - Documentare messaggi
   - Testare messaggi

4. **Attributi**
   - Utilizzare attributi personalizzati
   - Utilizzare traduzioni
   - Documentare attributi
   - Testare attributi

5. **Test**
   - Testare validazione
   - Testare messaggi
   - Testare attributi
   - Testare regole custom

### Esempi

#### Validazione Corretta
```php
// CORRETTO
public function store(CreateUserRequest $request)
{
    $user = User::create($request->validated());
    return redirect()->route('users.show', $user);
}

// ERRATO
public function store(Request $request) // ❌ Non usa form request
{
    $request->validate([ // ❌ Validazione inline
        'email' => 'required',
        'password' => 'required',
    ]);
    $user = User::create($request->all());
    return redirect()->route('users.show', $user);
}
```

#### Regole Custom Corrette
```php
// CORRETTO
public function rules(): array
{
    return [
        'email' => [
            'required',
            'email',
            'unique:users,email',
            'max:255',
            function ($attribute, $value, $fail) {
                if (!str_ends_with($value, '@example.com')) {
                    $fail('L\'email deve essere del dominio example.com');
                }
            },
        ],
    ];
}

// ERRATO
public function rules(): array
{
    return [
        'email' => [
            'required',
            'email',
            'unique:users,email',
            'max:255',
            'ends_with:@example.com', // ❌ Regola non custom
        ],
    ];
}
```

## Checklist

### Per Ogni Form Request
- [ ] Estende FormRequest
- [ ] Implementa rules()
- [ ] Implementa messages()
- [ ] Implementa attributes()
- [ ] Documentazione completa
- [ ] Test completi

### Per Rules
- [ ] Array associativi
- [ ] Regole multiple
- [ ] Regole custom
- [ ] Documentate
- [ ] Testate

### Per Messages
- [ ] Array associativi
- [ ] Messaggi personalizzati
- [ ] Traduzioni
- [ ] Documentate
- [ ] Testate

### Per Attributes
- [ ] Array associativi
- [ ] Attributi personalizzati
- [ ] Traduzioni
- [ ] Documentate
- [ ] Testate

### Per Test
- [ ] Validazione
- [ ] Messaggi
- [ ] Attributi
- [ ] Regole custom
- [ ] Performance 
