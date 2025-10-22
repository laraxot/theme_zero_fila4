# Regole per le Traduzioni - Guida per Cursor

## Configurazione di Cursor

Aggiungi questa configurazione al tuo file `settings.json` di Cursor:

```json
{
  "files.associations": {
    "*.php": "php"
  },
  "php.suggest.basic": false,
  "editor.quickSuggestions": {
    "strings": true
  },
  "translation.autoDetectLanguage": true
}
```

## Snippet Utili

### Snippet per Nuova Traduzione

```snippets
{
  "New Translation": {
    "prefix": "trans-new",
    "body": [
      "'${1:key}' => [",
      "    'label' => '${2:Label}',"
      "${3:, 'placeholder' => '${4:Placeholder}'}",
      "${5:, 'helper_text' => '${6:Helper text}'}",
      "]$0"
    ],
    "description": "Crea una nuova voce di traduzione"
  }
}
```

### Snippet per Navigazione

```snippets
{
  "Navigation Translation": {
    "prefix": "trans-nav",
    "body": [
      "'navigation' => [",
      "    'label' => '${1:Label}',",
      "    'group' => '${2:Group}',",
      "    'icon' => '${3:heroicon-o-icon}',",
      "    'sort' => ${4:100}",
      "],"
    ],
    "description": "Aggiunge la sezione di navigazione"
  }
}
```

## Regole di Linting

1. **No Chiavi Grezze**
   - Evitare chiavi che terminano con `.navigation`
   - Non usare stringhe hardcoded nell'interfaccia utente

2. **Struttura Consistente**
   - Usare sempre la struttura gerarchica
   - Mantenere lo stesso ordine dei campi in tutte le lingue

## Esempi di Completamento

### ❌ Sbagliato
```php
'label' => 'user.navigation',
'group' => 'user.navigation',
```

### ✅ Corretto
```php
'label' => 'Utenti',
'group' => 'Amministrazione',
'icon' => 'heroicon-o-users',
```

## Strumenti Consigliati

1. **PHP Intelephense** - Per il completamento del codice PHP
2. **Laravel Extra Intellisense** - Per il supporto a Laravel
3. **i18n Ally** - Per la gestione delle traduzioni

## Suggerimenti per la Produttività

1. Usa `Ctrl+Space` per il completamento delle chiavi di traduzione
2. Usa `F2` per rinominare una chiave in tutti i file
3. Usa `Ctrl+Click` per navigare alla definizione di una chiave

## Configurazione di Prettier

Aggiungi questa configurazione al tuo `.prettierrc`:

```json
{
  "printWidth": 120,
  "singleQuote": true,
  "trailingComma": "all",
  "bracketSpacing": true,
  "arrowParens": "avoid"
}
```

## Regole per i Commit

- Usa il prefisso `i18n:` per i commit che riguardano le traduzioni
- Includi sempre la lista delle chiavi modificate/aggiunte
- Aggiorna la documentazione quando necessario
