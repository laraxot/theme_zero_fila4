# Memoria per le Traduzioni

## Esempi Pratici

### 1. Componenti Filament

#### ❌ NON FARE
```php
TextInput::make('first_name')
    ->label('Nome')
    ->placeholder('Inserisci il nome');

Select::make('country')
    ->label('Paese')
    ->options([
        'it' => 'Italia',
        'fr' => 'Francia'
    ]);
```

#### ✅ FARE
```php
TextInput::make('first_name')
    ->placeholder('Inserisci il nome');

Select::make('country')
    ->options([
        'it' => 'Italia',
        'fr' => 'Francia'
    ]);
```

### 2. Wizard Steps

#### ❌ NON FARE
```php
Step::make('personal_data_step')
    ->label('Dati Personali')
    ->description('Inserisci i tuoi dati personali');
```

#### ✅ FARE
```php
Step::make('personal_data');
```

Con il file di traduzione:
```php
return [
    'steps' => [
        'personal_data' => [
            'label' => 'Dati Personali',
            'description' => 'Inserisci i tuoi dati personali',
            'help' => 'Compila tutti i campi richiesti'
        ]
    ]
];
```

### 3. Azioni

#### ❌ NON FARE
```php
Action::make('save')
    ->label('Salva')
    ->icon('heroicon-o-save');
```

#### ✅ FARE
```php
Action::make('save')
    ->icon('heroicon-o-save');
```

Con il file di traduzione:
```php
return [
    'actions' => [
        'save' => [
            'label' => 'Salva',
            'tooltip' => 'Salva le modifiche',
            'icon' => 'heroicon-o-save'
        ]
    ]
];
```

## Casi d'Uso Comuni

### 1. Campi con Validazione
```php
TextInput::make('email')
    ->email()
    ->required()
    ->unique();
```

File di traduzione:
```php
return [
    'fields' => [
        'email' => [
            'label' => 'Email',
            'placeholder' => 'Inserisci la tua email',
            'help' => 'La tua email principale',
            'validation' => [
                'required' => 'L\'email è obbligatoria',
                'email' => 'Inserisci un\'email valida',
                'unique' => 'Questa email è già registrata'
            ]
        ]
    ]
];
```

### 2. Campi con Relazioni
```php
Select::make('country_id')
    ->relationship('country', 'name');
```

File di traduzione:
```php
return [
    'fields' => [
        'country_id' => [
            'label' => 'Paese',
            'placeholder' => 'Seleziona il paese',
            'help' => 'Il paese di residenza'
        ]
    ]
];
```

### 3. Campi con Date
```php
DatePicker::make('birth_date')
    ->required();
```

File di traduzione:
```php
return [
    'fields' => [
        'birth_date' => [
            'label' => 'Data di Nascita',
            'help' => 'Seleziona la tua data di nascita',
            'validation' => [
                'required' => 'La data di nascita è obbligatoria'
            ]
        ]
    ]
];
```

## Best Practices

1. **Struttura dei File**
   - Organizzare le traduzioni in sezioni logiche
   - Mantenere una struttura coerente tra i moduli
   - Documentare le chiavi di traduzione

2. **Naming**
   - Usare nomi descrittivi e significativi
   - Mantenere coerenza tra le diverse lingue
   - Evitare abbreviazioni non standard

3. **Manutenzione**
   - Centralizzare tutte le traduzioni
   - Evitare duplicazioni
   - Mantenere la documentazione aggiornata

4. **Testing**
   - Verificare tutte le traduzioni
   - Testare in tutte le lingue supportate
   - Controllare la coerenza dell'interfaccia 