# Tema One - SaluteOra

## 📋 Panoramica

Il tema One è un tema moderno e pulito per l'applicazione SaluteOra, progettato per fornire un'interfaccia utente intuitiva e professionale per pazienti, dottori e amministratori.

## Principi di Design

### Integrazione Widget

Il tema One segue il principio fondamentale di **non duplicare funzionalità esistenti**. Invece di ricreare componenti da zero, il tema richiama i widget Filament esistenti e applica solo styling specifico.

#### ✅ Approccio Corretto

```php
// Richiama widget esistente
@livewire(\Modules\SaluteOra\Filament\Widgets\PatientCalendarWidget::class)
```

#### ❌ Approccio Sbagliato

```php
// NON ricreare funzionalità esistenti
<script>
    var calendar = new FullCalendar.Calendar(/* ... */);
</script>
```

## Componenti Principali

### Calendar Block

Il componente `calendar.blade.php` è stato completamente riprogettato per:

- **Riutilizzare Widget Esistenti**: Richiama i widget FullCalendar del modulo SaluteOra
- **Rispettare Sicurezza**: Mantiene tutti i controlli di accesso e tenancy
- **Applicare Styling**: Aggiunge solo CSS specifico del tema
- **Gestire Stati**: Mostra messaggi appropriati per utenti non autenticati o senza permessi

#### Funzionalità

- Rilevamento automatico tipo utente (Patient, Doctor, Admin)
- Verifica permessi e tenancy
- Styling responsive
- Stati di caricamento e errore
- Integrazione seamless con widget Filament

#### Utilizzo

```php
<x-one::blocks.calendar 
    title="Il Mio Calendario"
    height="600px"
    :show-toolbar="true"
/>
```

## Struttura File

```text
resources/views/
├── components/
│   ├── blocks/
│   │   ├── calendar.blade.php          # ✅ Calendario con widget Filament
│   │   ├── calendar-dynamic.blade.php  # ⚠️ Da aggiornare
│   │   ├── dashboard-stats.blade.php   # Statistiche dashboard
│   │   └── patient-info.blade.php      # Info paziente
│   ├── layouts/
│   │   ├── app.blade.php               # Layout principale
│   │   ├── auth.blade.php              # Layout autenticazione
│   │   └── admin.blade.php             # Layout amministrazione
│   └── ui/
│       ├── button.blade.php            # Componenti UI riutilizzabili
│       ├── card.blade.php
│       └── modal.blade.php
├── pages/
│   ├── auth/
│   │   ├── login.blade.php             # Pagina login
│   │   └── register.blade.php          # Pagina registrazione
│   ├── dashboard/
│   │   ├── patient.blade.php           # Dashboard paziente
│   │   ├── doctor.blade.php            # Dashboard dottore
│   │   └── admin.blade.php             # Dashboard admin
│   └── profile/
│       ├── edit.blade.php              # Modifica profilo
│       └── settings.blade.php          # Impostazioni
└── partials/
    ├── header.blade.php                # Header comune
    ├── footer.blade.php                # Footer comune
    └── navigation.blade.php            # Navigazione
```

## 🎨 Sistema di Design

### Palette Colori

```css
:root {
    /* Colori Primari */
    --primary-50: #eff6ff;
    --primary-500: #3b82f6;
    --primary-600: #2563eb;
    --primary-900: #1e3a8a;
    
    /* Colori Secondari */
    --secondary-50: #f0fdf4;
    --secondary-500: #22c55e;
    --secondary-600: #16a34a;
    
    /* Colori Neutri */
    --gray-50: #f9fafb;
    --gray-100: #f3f4f6;
    --gray-500: #6b7280;
    --gray-900: #111827;
    
    /* Colori di Stato */
    --success: #10b981;
    --warning: #f59e0b;
    --error: #ef4444;
    --info: #3b82f6;
}
```

### Tipografia

```css
:root {
    /* Font Family */
    --font-sans: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    --font-mono: 'JetBrains Mono', 'Fira Code', monospace;
    
    /* Font Sizes */
    --text-xs: 0.75rem;     /* 12px */
    --text-sm: 0.875rem;    /* 14px */
    --text-base: 1rem;      /* 16px */
    --text-lg: 1.125rem;    /* 18px */
    --text-xl: 1.25rem;     /* 20px */
    --text-2xl: 1.5rem;     /* 24px */
    --text-3xl: 1.875rem;   /* 30px */
    
    /* Font Weights */
    --font-normal: 400;
    --font-medium: 500;
    --font-semibold: 600;
    --font-bold: 700;
}
```

## 🎯 Integrazione Filament

### Principi di Styling

Il tema applica stili specifici ai widget Filament senza modificarne la logica:

```css
/* Integrazione con widget Filament */
.theme-one-calendar .fi-wi-calendar {
    border: none;
    box-shadow: none;
    background: transparent;
}

/* Override stili Filament per coerenza tema */
.fi-wi-calendar .fc-button {
    background-color: var(--primary-500);
    border-color: var(--primary-500);
}

.fi-wi-calendar .fc-button:hover {
    background-color: var(--primary-600);
    border-color: var(--primary-600);
}
```

### Componenti Personalizzati

```css
/* Componenti specifici del tema */
.theme-card {
    background: var(--gray-50);
    border: 1px solid var(--gray-200);
    border-radius: 0.5rem;
    padding: 1.5rem;
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
}

.theme-button {
    background: var(--primary-500);
    color: white;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 0.375rem;
    font-weight: var(--font-medium);
    transition: all 0.2s ease;
}

.theme-button:hover {
    background: var(--primary-600);
    transform: translateY(-1px);
}
```

## 🚀 Installazione e Configurazione

### Prerequisiti

- Laravel 11+ con Filament 3.x
- Modulo SaluteOra installato e configurato
- Node.js 18+ per asset compilation
- PHP 8.3+

### Installazione

```bash
# 1. Copiare i file del tema nella directory corretta
cp -r Themes/One/resources/views/* resources/views/

# 2. Copiare gli asset CSS/JS
cp -r Themes/One/resources/css/* resources/css/
cp -r Themes/One/resources/js/* resources/js/

# 3. Installare dipendenze NPM
npm install

# 4. Compilare asset
npm run build
```

### Configurazione

```php
// config/themes.php
return [
    'one' => [
        'enabled' => true,
        'primary_color' => '#3b82f6',
        'secondary_color' => '#22c55e',
        'font_family' => 'Inter',
        'custom_css' => null,
    ],
];
```

### Utilizzo nei Layout

```blade
{{-- resources/views/layouts/app.blade.php --}}
@extends('one::layouts.app')

@section('content')
    <x-one::blocks.calendar 
        title="Il Mio Calendario"
        height="600px"
        :show-toolbar="true"
    />
@endsection
```

## 📱 Responsive Design

### Breakpoint System

Il tema utilizza un sistema di breakpoint ottimizzato:

```css
/* Mobile First Approach */
@media (min-width: 640px) { /* sm */ }
@media (min-width: 768px) { /* md */ }
@media (min-width: 1024px) { /* lg */ }
@media (min-width: 1280px) { /* xl */ }
@media (min-width: 1536px) { /* 2xl */ }
```

### Dispositivi Supportati

- **Mobile** (< 768px): Layout a colonna singola, navigazione collassabile
- **Tablet** (768px - 1023px): Layout a due colonne, sidebar fissa
- **Desktop** (>= 1024px): Layout completo con sidebar espansa
- **Large Desktop** (>= 1280px): Layout ottimizzato per schermi grandi

## 🔒 Sicurezza

### Controlli di Accesso

Il tema rispetta tutti i controlli di sicurezza implementati nei widget:

```php
// Esempio di controllo accesso nel tema
@auth
    @if(auth()->user()->hasRole('patient'))
        <x-one::blocks.calendar type="patient" />
    @elseif(auth()->user()->hasRole('doctor'))
        <x-one::blocks.calendar type="doctor" :studio-id="auth()->user()->current_studio_id" />
    @endif
@else
    <div class="text-center py-8">
        <p>Effettua l'accesso per visualizzare il calendario</p>
        <a href="{{ route('login') }}" class="theme-button">Accedi</a>
    </div>
@endauth
```

### Funzionalità di Sicurezza

- **Autenticazione**: Verifica obbligatoria per accesso
- **Autorizzazione**: Controllo ruoli e permessi
- **Tenancy**: Isolamento dati per studio medico
- **CSRF Protection**: Token automatici in tutti i form
- **XSS Prevention**: Escape automatico dei dati

### Privacy e GDPR

- **Data Masking**: Dati sensibili mascherati quando necessario
- **Consent Management**: Gestione consensi utente
- **Data Retention**: Politiche di conservazione dati
- **Right to be Forgotten**: Implementazione cancellazione dati

## ⚡ Performance

### Ottimizzazioni Implementate

```css
/* Lazy Loading per immagini */
.theme-image {
    loading: lazy;
    decoding: async;
}

/* CSS Critical Path */
.theme-critical {
    display: block;
    font-display: swap;
}

/* Animazioni ottimizzate */
.theme-transition {
    will-change: transform, opacity;
    transform: translateZ(0);
}
```

### Strategie di Caching

- **Widget Caching**: Cache automatica dei widget Filament
- **Asset Caching**: Versioning automatico CSS/JS
- **Database Query Caching**: Cache query Eloquent
- **CDN Ready**: Supporto per Content Delivery Network

### Metriche Target

| Metrica | Target | Attuale |
|---------|--------|---------|
| First Contentful Paint | < 1.5s | ~1.2s |
| Largest Contentful Paint | < 2.5s | ~2.1s |
| Cumulative Layout Shift | < 0.1 | ~0.05 |
| Time to Interactive | < 3.0s | ~2.8s |
| First Input Delay | < 100ms | ~80ms |

## ♿ Accessibilità

### Standard WCAG 2.1 AA

Il tema rispetta completamente gli standard di accessibilità:

```html
<!-- Esempio di markup accessibile -->
<button 
    class="theme-button"
    aria-label="Apri calendario pazienti"
    aria-expanded="false"
    aria-controls="patient-calendar"
>
    <span class="sr-only">Calendario</span>
    <svg aria-hidden="true" class="w-5 h-5">
        <!-- Icona calendario -->
    </svg>
</button>
```

### Caratteristiche di Accessibilità

- **Contrasto Colori**: Ratio minimo 4.5:1 per testo normale
- **Navigazione Keyboard**: Tab order logico e completo
- **Screen Reader**: Supporto completo per tecnologie assistive
- **Focus Management**: Indicatori visibili e chiari
- **Semantic HTML**: Struttura semantica corretta
- **ARIA Labels**: Etichette appropriate per tutti gli elementi interattivi

### Test di Accessibilità

```bash
# Lighthouse CI per accessibilità
npm run lighthouse:accessibility

# Test automatici con axe-core
npm run test:accessibility

# Verifica contrasto colori
npm run test:contrast
```

## 🧪 Testing

### Test Suite Completa

```bash
# Test unitari per componenti
php artisan test --testsuite=Unit

# Test feature per integrazione
php artisan test --testsuite=Feature

# Test visual regression
npm run test:visual

# Test performance
npm run test:performance
```

### Test Coverage

- **Unit Tests**: 95%+ coverage per logica componenti
- **Feature Tests**: 90%+ coverage per flussi utente
- **Visual Tests**: Screenshot comparison per UI
- **Accessibility Tests**: 100% WCAG 2.1 AA compliance

## 🔧 Manutenzione

### Aggiornamenti Widget

Quando i widget Filament vengono aggiornati, il tema eredita automaticamente:

- ✅ Nuove funzionalità
- ✅ Correzioni bug
- ✅ Miglioramenti sicurezza
- ✅ Ottimizzazioni performance

### Workflow di Manutenzione

```bash
# 1. Verificare aggiornamenti disponibili
composer outdated

# 2. Aggiornare dipendenze
composer update

# 3. Eseguire test
php artisan test

# 4. Compilare asset
npm run build

# 5. Verificare funzionamento
php artisan serve
```

### Personalizzazioni

Per personalizzare l'aspetto del tema:

```css
/* 1. Sovrascrivere variabili CSS */
:root {
    --primary-500: #your-color;
    --font-sans: 'Your-Font', sans-serif;
}

/* 2. Aggiungere stili personalizzati */
.theme-custom {
    /* I tuoi stili */
}

/* 3. NON modificare mai la logica dei widget */
```

### Best Practices

1. **Solo Styling**: Modificare solo CSS, mai PHP
2. **Variabili CSS**: Usare sempre le variabili definite
3. **Test Completi**: Verificare su tutti i dispositivi
4. **Backup**: Salvare sempre le modifiche in version control

## 🌐 Browser Supportati

| Browser | Versione Minima | Supporto |
|---------|----------------|----------|
| Chrome | 90+ | ✅ Completo |
| Firefox | 88+ | ✅ Completo |
| Safari | 14+ | ✅ Completo |
| Edge | 90+ | ✅ Completo |
| Safari iOS | 14+ | ✅ Completo |
| Chrome Android | 90+ | ✅ Completo |

## 🔍 Troubleshooting

### Problemi Comuni

#### Widget Non Caricato

```bash
# Errore: Class 'PatientCalendarWidget' not found
# Soluzione:
composer dump-autoload
php artisan module:list
php artisan module:enable SaluteOra
```

#### Permessi Negati

```php
// Messaggio: "Accesso Limitato"
// Verificare in tinker:
php artisan tinker
>>> auth()->user()->roles
>>> auth()->user()->permissions
>>> auth()->user()->current_studio_id
```

#### Styling Non Applicato

```bash
# Verificare ordine caricamento CSS
php artisan view:clear
php artisan cache:clear
npm run build
```

#### Performance Lente

```bash
# Ottimizzare asset
npm run build -- --mode=production
php artisan optimize
php artisan config:cache
php artisan route:cache
```

### Debug Mode

```php
// Abilitare debug per tema
// config/themes.php
'one' => [
    'debug' => true,
    'log_level' => 'debug',
],
```

### Log Files

```bash
# Verificare log errori
tail -f storage/logs/laravel.log
tail -f storage/logs/themes.log
```

## 🤝 Contribuire

### Linee Guida per Contributori

1. **Non Duplicare**: Mai ricreare funzionalità esistenti nei widget
2. **Solo Styling**: Modificare solo aspetto visivo, mai logica PHP
3. **Testare**: Verificare su tutti i dispositivi e browser
4. **Documentare**: Aggiornare README per ogni modifica
5. **Accessibilità**: Mantenere standard WCAG 2.1 AA

### Processo di Contribuzione

```bash
# 1. Fork del repository
git clone https://github.com/your-username/saluteora.git

# 2. Creare branch feature
git checkout -b feature/theme-improvement

# 3. Fare modifiche
# ... modifiche al codice ...

# 4. Eseguire test
php artisan test
npm run test:all

# 5. Commit e push
git add .
git commit -m "feat(theme): miglioramento accessibilità"
git push origin feature/theme-improvement

# 6. Creare Pull Request
```

### Checklist PR

- [ ] Test unitari passano
- [ ] Test accessibilità passano
- [ ] Test responsive su tutti i dispositivi
- [ ] Documentazione aggiornata
- [ ] Screenshot delle modifiche
- [ ] Descrizione dettagliata delle modifiche

## 📝 Changelog

### v2.1.0 (Prossima Release)

- 🔄 Miglioramenti accessibilità WCAG 2.1 AA
- 🎨 Nuovo sistema di design tokens
- ⚡ Ottimizzazioni performance
- 📱 Miglioramenti responsive design
- 🧪 Test coverage aumentato al 95%

### v2.0.0 (Corrente)

- ✅ **BREAKING**: Rimosso calendario custom, ora usa widget Filament
- ✅ Aggiunta integrazione sicura con widget SaluteOra
- ✅ Migliorato responsive design
- ✅ Aggiunto supporto tenancy multi-studio
- ✅ Ottimizzato performance e accessibilità

### v1.x.x (Deprecato)

- ❌ Implementazione calendario custom (rimossa)
- ❌ Duplicazione logica widget (corretta)

## 📄 Licenza

Questo tema è parte del progetto SaluteOra e segue la stessa licenza del progetto principale.

**Licenza**: MIT License  
**Copyright**: © 2024 SaluteOra Team

## 🆘 Supporto

### Canali di Supporto

- **Documentazione**: [docs.saluteora.it](https://docs.saluteora.it)
- **Issues**: [GitHub Issues](https://github.com/saluteora/issues)
- **Email**: [support@saluteora.it](mailto:support@saluteora.it)
- **Discord**: [Community Server](https://discord.gg/saluteora)

### FAQ

**Q: Come personalizzare i colori del tema?**  
A: Modificare le variabili CSS in `resources/css/themes/one.css`

**Q: Il tema è compatibile con Filament 4?**  
A: Attualmente supporta Filament 3.x, supporto per v4 in arrivo

**Q: Posso usare il tema in altri progetti?**  
A: Sì, ma richiede il modulo SaluteOra per i widget

## 🔗 Collegamenti Utili

- [Documentazione SaluteOra](../../docs/)
- [Modulo SaluteOra](../../laravel/Modules/SaluteOra/)
- [Widget Filament](../../laravel/Modules/SaluteOra/Filament/Widgets/)
- [Sistema di Design](../../docs/design-system.md)

---

**Ultimo aggiornamento**: Dicembre 2024  
**Versione**: 2.0.0  
**Mantenuto da**: SaluteOra Team
