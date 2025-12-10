# Memoria: Traduzioni in Filament

## Errore Comune: Uso di ->label()

Ho imparato che non devo mai usare `->label()` o altri metodi diretti per le traduzioni in Filament perché:

1. Le traduzioni devono essere gestite centralmente dal LangServiceProvider
2. Questo permette una gestione più flessibile e manutenibile delle traduzioni
3. Facilita l'internazionalizzazione dell'applicazione
4. Mantiene la coerenza in tutto il progetto

## Struttura Corretta

### File di Traduzione
```php
// resources/lang/it/module-name.php
return [
    'fields' => [
        'name' => [
            'label' => 'Nome',
            'placeholder' => 'Inserisci il nome',
            'helper_text' => 'Il nome completo dell\'utente',
            'tooltip' => 'Inserisci il nome come appare sul documento',
        ],
    ],
];
```

### Componente Filament
```php
// ✅ CORRETTO
TextInput::make('name')  // La traduzione viene gestita automaticamente

// ❌ ERRATO - NON FARE QUESTO
TextInput::make('name')
    ->label('Nome')
    ->placeholder('Inserisci il nome')
```

## Checklist per le Traduzioni

Prima di implementare un componente Filament:
1. [ ] Verificare se esiste già il file di traduzione per il modulo
2. [ ] Creare la struttura corretta nel file di traduzione
3. [ ] Non usare mai metodi diretti per le traduzioni
4. [ ] Testare tutte le lingue supportate

## Note per il Futuro

- Ricordare sempre di NON usare ->label() o simili
- Controllare sempre la documentazione del modulo
- Mantenere la coerenza con il resto del progetto
- Aggiornare la documentazione quando necessario

## Collegamenti Utili

- [Documentazione Filament](https://filamentphp.com/docs/3.x/panels/installation)
- [Laravel Localization](https://laravel.com/docs/10.x/localization)
- [Best Practices](/.cursor/rules/filament-translations.rule)

## Esempi di Implementazione

### Form Fields
```php
// ✅ CORRETTO
TextInput::make('first_name')
TextInput::make('last_name')
TextInput::make('email')

// File di traduzione
return [
    'fields' => [
        'first_name' => [
            'label' => 'Nome',
            'placeholder' => 'Inserisci il nome',
        ],
        'last_name' => [
            'label' => 'Cognome',
            'placeholder' => 'Inserisci il cognome',
        ],
        'email' => [
            'label' => 'Email',
            'placeholder' => 'Inserisci l\'email',
        ],
    ],
];
```

### Table Columns
```php
// ✅ CORRETTO
Tables\Columns\TextColumn::make('name')
Tables\Columns\TextColumn::make('email')
Tables\Columns\BooleanColumn::make('is_active')

// File di traduzione
return [
    'columns' => [
        'name' => [
            'label' => 'Nome',
            'tooltip' => 'Nome dell\'utente',
        ],
        'email' => [
            'label' => 'Email',
            'tooltip' => 'Indirizzo email',
        ],
        'is_active' => [
            'label' => 'Attivo',
            'tooltip' => 'Stato dell\'utente',
        ],
    ],
];
```

## Promemoria

1. Mai usare:
   - ->label()
   - ->placeholder()
   - ->helperText()
   - ->hint()
   - ->tooltip()

2. Sempre usare:
   - File di traduzione
   - Struttura gerarchica
   - Convenzioni di naming
   - Documentazione aggiornata 