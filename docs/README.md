# Tema Zero

## Introduzione

Il tema Zero è un tema Laravel/Filament minimalista e pulito, progettato per essere utilizzato come base per applicazioni moderne. È caratterizzato da un design semplice, elegante e altamente personalizzabile.

## Caratteristiche

- **Design Minimalista**: Interfaccia pulita e moderna
- **Responsive**: Ottimizzato per tutti i dispositivi
- **Accessibile**: Segue le linee guida WCAG
- **Personalizzabile**: Facilmente adattabile alle esigenze del progetto
- **Performance**: Ottimizzato per velocità e efficienza
- **Indipendente**: Non dipende da Filament, ideale per frontend standalone

## Struttura del Tema

```
laravel/Themes/Zero/
├── app/
│   └── Providers/
├── docs/
│   ├── README.md
│   ├── components.md
│   ├── layouts.md
│   └── customization.md
├── public/
│   ├── css/
│   └── js/
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│       ├── components/
│       │   ├── layouts/
│       │   │   ├── app.blade.php
│       │   │   └── main.blade.php
│       │   ├── nav-link.blade.php
│       │   ├── navigation.blade.php
│       │   └── responsive-nav-link.blade.php
│       ├── layouts/
│       ├── pages/
│       └── welcome.blade.php
├── package.json
├── postcss.config.js
├── tailwind.config.js
├── theme.json
└── vite.config.js
```

## Componenti Layout

### Layout Principale (main.blade.php)

Il layout principale del tema Zero fornisce una struttura base per tutte le pagine dell'applicazione. Include:

- Header con navigazione
- Area contenuto principale
- Footer
- Supporto per meta tag e SEO
- Integrazione con Vite per gli asset

### Layout App (app.blade.php)

Layout semplificato per componenti e sezioni specifiche dell'applicazione.

## Pagine di Autenticazione

Il tema Zero supporta pagine di autenticazione complete seguendo le convenzioni del progetto:

### Struttura delle Pagine Auth

```
resources/views/pages/auth/
├── login.blade.php      # Pagina di login
├── register.blade.php   # Pagina di registrazione
├── logout.blade.php     # Pagina di logout
├── password/            # Gestione password
│   ├── reset.blade.php  # Richiesta reset
│   └── [token].blade.php # Reset password
└── verify.blade.php     # Verifica email
```

### Caratteristiche delle Pagine Auth

- **Design Responsive**: Ottimizzate per tutti i dispositivi
- **Accessibilità**: Seguono le linee guida WCAG
- **Validazione**: Validazione lato client e server
- **Sicurezza**: CSRF protection e best practices
- **UX Ottimizzata**: Feedback utente e gestione errori

## Installazione

1. **Installare le dipendenze**:
```bash
cd laravel/Themes/Zero
npm install
```

2. **Compilare gli asset**:
```bash
npm run build
```

3. **Configurare il tema**:
```bash
php artisan theme:install zero
```

## Configurazione Tailwind

Il tema Zero utilizza una configurazione Tailwind CSS personalizzata e indipendente da Filament. Questo lo rende ideale per:

- Applicazioni frontend standalone
- Progetti che non utilizzano Filament
- Sviluppo di temi personalizzati
- Prototipazione rapida

La configurazione include:
- Dark mode support
- Sistema di colori personalizzabile
- Font Nunito per tipografia moderna
- Plugin per forms e typography
- Supporto per Flowbite components

## Personalizzazione

### Colori

Il tema utilizza Tailwind CSS con una palette di colori personalizzabile. I colori principali sono definiti in `tailwind.config.js`.

### Tipografia

Utilizza il font Nunito per una migliore leggibilità e un aspetto moderno.

### Componenti

Tutti i componenti sono modulari e possono essere facilmente personalizzati o estesi.

## Sviluppo

### Comandi Utili

```bash
# Sviluppo con hot reload
npm run dev

# Build per produzione
npm run build

# Linting
npm run lint

# Test
npm run test
```

### Best Practices

1. **Componenti**: Utilizzare sempre componenti Blade per la riusabilità
2. **Styling**: Preferire classi Tailwind CSS
3. **Accessibilità**: Includere sempre attributi ARIA appropriati
4. **Performance**: Ottimizzare le immagini e minimizzare gli asset
5. **SEO**: Utilizzare meta tag appropriati

## Documentazione Correlata

- [Architettura del Progetto](../../../../docs/architecture.md)
- [Sviluppo](../../../../docs/development.md)
- [Configurazione](../../../../docs/configuration.md)
- [Tema One](../One/docs/README.md)
- [Architettura del Tema](./architecture.md)
- [Autenticazione](./authentication.md)
- [Esempi di Utilizzo](./examples.md)

## Supporto

Per supporto e domande:
- Consultare la documentazione del progetto principale
- Verificare i file di esempio nel tema
- Controllare la documentazione di Laravel e Filament

## Licenza

Questo tema è parte del progetto base_techplanner_fila3_mono e segue le stesse licenze del progetto principale. 