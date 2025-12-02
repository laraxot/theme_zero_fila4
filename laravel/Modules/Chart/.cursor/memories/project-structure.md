# Struttura del Progetto

## Directory Principali
- `app/` - Codice applicativo principale
- `public_html/` - File pubblici
- `Themes/` - Temi dell'applicazione
- `Modules/` - Moduli dell'applicazione
- `docs/` - Documentazione generale
- `bashscripts/` - Script di automazione

## Struttura Moduli
Ogni modulo deve seguire questa struttura:
```
Module/
├── docs/
│   └── sections/
├── Http/
│   └── Livewire/
├── Actions/
└── resources/
    └── lang/
        └── {locale}/
```

## Struttura Temi
Ogni tema deve seguire questa struttura:
```
Theme/
├── docs/
│   └── sections/
├── resources/
│   ├── views/
│   │   └── pages/
│   └── lang/
│       └── {locale}/
└── vite.config.js
```

## Convenzioni di Naming
- Chiavi di traduzione: `modulo::risorsa.fields.campo.label`
- Namespace moduli: `Modules\{ModuleName}`
- Namespace temi: `Themes\{ThemeName}`

## File di Configurazione
- `.cursor/rules/` - Regole per Cursor
- `.windsurf/rules/` - Regole per Windsurf
- `.cursor/memories/` - Memorie del progetto 
