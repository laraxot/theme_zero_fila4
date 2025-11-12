# Memoria Form Widget Filament

## Componenti Essenziali

### 1. Proprietà Data
```php
public ?array $data = [];
```
- **Scopo**: Contenere i dati del form
- **Obbligatorio**: Sì
- **Tipo**: Array nullable
- **Inizializzazione**: Array vuoto

### 2. Mount Method
```php
public function mount(): void
{
    $this->form->fill();
}
```
- **Scopo**: Inizializzare il form
- **Obbligatorio**: Sì
- **Quando**: All'inizializzazione del componente
- **Cosa fa**: Popola il form con i dati iniziali

### 3. Form Schema
```php
public function getFormSchema(): array
{
    return [
        // Schema del form
    ];
}
```
- **Scopo**: Definire la struttura del form
- **Obbligatorio**: Sì
- **Tipo**: Array di componenti
- **Validazione**: Integrata nei componenti

### 4. Form Configuration
```php
public function form(Form $form): Form
{
    return $form
        ->schema($this->getFormSchema())
        ->statePath('data');
}
```
- **Scopo**: Configurare il form
- **Obbligatorio**: Sì
- **StatePath**: Sempre 'data'
- **Schema**: Dal getFormSchema()

## Errori Comuni e Soluzioni

### 1. Proprietà Data Mancante
```php
// ❌ ERRATO
class MyWidget extends XotBaseWidget
{
    // Manca public ?array $data = [];
}

// ✅ CORRETTO
class MyWidget extends XotBaseWidget
{
    public ?array $data = [];
}
```

### 2. Mount Non Inizializzato
```php
// ❌ ERRATO
public function mount(): void
{
    // Manca $this->form->fill();
}

// ✅ CORRETTO
public function mount(): void
{
    $this->form->fill();
}
```

### 3. StatePath Mancante
```php
// ❌ ERRATO
public function form(Form $form): Form
{
    return $form->schema($this->getFormSchema());
}

// ✅ CORRETTO
public function form(Form $form): Form
{
    return $form
        ->schema($this->getFormSchema())
        ->statePath('data');
}
```

## Best Practices

### 1. Validazione nel Form Schema
```php
public function getFormSchema(): array
{
    return [
        TextInput::make('email')
            ->required()
            ->email()
            ->unique('users', 'email'),
    ];
}
```

### 2. Accesso ai Dati
```php
// ✅ CORRETTO
$state = $this->form->getState();
$email = $state['email'];

// ❌ ERRATO
$email = $this->email;
```

### 3. Binding nei Template
```blade
<!-- ✅ CORRETTO -->
<x-filament::input wire:model="data.email" />

<!-- ❌ ERRATO -->
<x-filament::input wire:model="email" />
```

## Checklist di Verifica

1. **Setup Base**
   - [ ] Proprietà `$data` definita
   - [ ] Mount method con `fill()`
   - [ ] Form schema implementato
   - [ ] StatePath configurato

2. **Validazione**
   - [ ] Regole nel form schema
   - [ ] Messaggi di errore personalizzati
   - [ ] Validazione real-time
   - [ ] Validazione server-side

3. **Template**
   - [ ] Binding corretto con `data.`
   - [ ] Gestione errori
   - [ ] Loading states
   - [ ] Feedback utente 