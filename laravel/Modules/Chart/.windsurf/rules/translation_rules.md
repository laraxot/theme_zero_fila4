---
trigger: always_on
description: Regole per le traduzioni in Laraxot <nome progetto>
globs: ["**/lang/**/*.php"]
---

# Regole per le Traduzioni in Laraxot <nome progetto>

## Struttura Espansa per i Campi

### ✅ DO - Utilizzare la struttura espansa per i campi

```php
// resources/lang/it/resource.php
return [
    'fields' => [
        'nome_campo' => [
            'label' => 'Etichetta Campo',
            'tooltip' => 'Descrizione di aiuto per il campo',
            'placeholder' => 'Esempio di input'
        ],
        // Altri campi...
    ],
];
```

### ❌ DON'T - Non utilizzare mai la struttura semplificata

```php
// NON FARE MAI QUESTO
return [
    'fields' => [
        'nome_campo' => 'Etichetta Campo',
    ],
];
```

## Struttura Espansa per le Azioni

### ✅ DO - Utilizzare la struttura espansa per le azioni

```php
// resources/lang/it/resource.php
return [
    'actions' => [
        'nome_azione' => [
            'label' => 'Etichetta Azione',
            'icon' => 'heroicon-name',
            'color' => 'primary|secondary|success|danger',
            'tooltip' => 'Descrizione dell\'azione',
            'modal' => [
                'heading' => 'Titolo Modal',
                'description' => 'Descrizione dettagliata',
                'confirm' => 'Conferma',
                'cancel' => 'Annulla'
            ],
            'messages' => [
                'success' => 'Operazione completata con successo',
                'error' => 'Si è verificato un errore: :error'
            ]
        ],
        // Altre azioni...
    ],
];
```

## Struttura Completa per Risorse Filament

```php
// Modules/Performance/lang/it/filament/resources/organizzativa-resource.php
return [
    // Metadati della risorsa
    'label' => 'Organizzativa',
    'plural_label' => 'Organizzative',
    'navigation_group' => 'Performance',
    'navigation_icon' => 'heroicon-o-chart-bar',
    'navigation_sort' => 1,
    'description' => 'Gestione completa delle organizzative',
    
    // Campi del form e tabella
    'fields' => [
        'id' => [
            'label' => 'ID',
            'tooltip' => 'Identificativo univoco'
        ],
        'descrizione' => [
            'label' => 'Descrizione',
            'tooltip' => 'Descrizione dell\'organizzativa',
            'placeholder' => 'Inserisci la descrizione'
        ],
        // Altri campi...
    ],
    
    // Azioni disponibili
    'actions' => [
        'create' => [
            'label' => 'Nuova organizzativa',
            'icon' => 'heroicon-o-plus',
            'color' => 'primary',
            'tooltip' => 'Crea una nuova organizzativa'
        ],
        // Altre azioni...
    ],
    
    // Sezioni del form
    'sections' => [
        'details' => [
            'label' => 'Dettagli',
            'tooltip' => 'Informazioni di base'
        ],
        // Altre sezioni...
    ],
    
    // Messaggi di feedback
    'messages' => [
        'created' => 'Organizzativa creata con successo',
        'updated' => 'Organizzativa aggiornata con successo',
        'deleted' => 'Organizzativa eliminata con successo'
    ],
];
```

## Best Practices per Traduzioni

1. Utilizzare **frasi complete** per messaggi
2. **Coerenza** nella capitalizzazione
3. Grammatica e punteggiatura **corrette**
4. **Help text** per campi complessi
5. Label **concise** ma chiare
6. **Sintassi breve** degli array (`[]` invece di `array()`)
7. **Organizzzare** traduzioni per contesto
8. **Documentare** requisiti speciali
9. **Aggiornare** traduzioni quando si modificano funzionalità
10. Mantenere **coerenza** tra moduli

## Utilizzo nelle View e nei Componenti

### In Filament Components (NO ->label())

```php
// ✅ CORRETTO
TextInput::make('nome'),  // usa traduzione automaticamente

// ❌ ERRATO
TextInput::make('nome')->label('Nome'),
```

### In Blade Templates

```blade
{{-- ✅ CORRETTO --}}
{{ trans('module-name::page.title') }}
@lang('module-name::buttons.save')

{{-- ❌ ERRATO --}}
<h1>Titolo Hardcoded</h1>
<button>Salva</button>
```

## Organizzazione File di Traduzione

### Struttura per Moduli Filament

```
Modules/
└── ModuleName/
    └── lang/
        └── it/
            ├── actions.php            # Azioni globali del modulo
            ├── fields.php             # Campi comuni a più risorse
            ├── messages.php           # Messaggi globali
            ├── navigation.php         # Voci di navigazione
            └── filament/
                └── resources/
                    ├── resource1.php  # Traduzioni specifiche risorsa 1
                    └── resource2.php  # Traduzioni specifiche risorsa 2
```

## Checklist Traduzioni

- [ ] Struttura espansa per tutti i campi
- [ ] Struttura espansa per tutte le azioni
- [ ] Traduzioni complete per risorse Filament
- [ ] Nessuna label hardcoded nei componenti
- [ ] File di traduzione organizzati per contesto
- [ ] Coerenza in capitalizzazione e terminologia
- [ ] Documentazione aggiornata

## Backlink e Riferimenti

- [Modules/Xot/docs/TRANSLATIONS-BEST-PRACTICES.md](mdc:../../laravel/Modules/Xot/docs/TRANSLATIONS-BEST-PRACTICES.md)
- [docs/FILAMENT-BEST-PRACTICES.md](mdc:../../docs/FILAMENT-BEST-PRACTICES.md)
- [Modules/Performance/docs/translation_guidelines.md](mdc:../../laravel/Modules/Performance/docs/translation_guidelines.md)

*Ultimo aggiornamento: maggio 2025*
