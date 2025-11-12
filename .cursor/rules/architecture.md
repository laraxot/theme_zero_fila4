# Regole Architetturali

## Frontend
- Utilizzare Folio + Volt + Livewire + Widget
- Template in `Themes/{Theme}/resources/views/pages/`
- Widget devono estendere `XotBaseWidget` con `HasForms`
- Non estendere direttamente classi Filament

## Componenti UI
- Utilizzare componenti nativi Filament:
  - `x-filament::icon`
  - `x-filament::button`
  - `x-filament::dropdown`
  - `x-filament::avatar`
- Separatori dropdown: `div class="border-t border-gray-200 dark:border-gray-700 my-1"`

## Volt e Folio
- Direttiva `@volt` deve essere prima nel file Folio
- Non utilizzare `@volt` nel markup HTML
- Layout corretti:
  - `<x-layouts.app>`
  - `<x-layouts.guest>`

## Localizzazione
- Utilizzare `mcamara/laravel-localization`
- URL con prefisso lingua: `/{locale}/{sezione}/{risorsa}`
- Convenzione chiavi: `modulo::risorsa.fields.campo.label`

## Business Logic
- Utilizzare `spatie/laravel-queueable-action`
- Componenti Livewire in `app/Http/Livewire` del modulo
- Namespace senza 'app'
- Actions nella directory corretta

## Struttura Directory
- Provider in `app/Providers/`
- Percorso pubblico in `public_html/`

## Best Practices
- Utilizzare `Modules\Xot\Contracts\UserContract`
- Ottenere classe User con `XotData::make()->getUserClass()`
- Documentare decisioni architetturali
- Enfatizzare il "perché"
- Aggiornare documentazione con modifiche
- Ottimizzare per:
  - Accessibilità
  - Sicurezza
  - Prestazioni 