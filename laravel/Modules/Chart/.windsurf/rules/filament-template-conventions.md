# Convenzioni per Template Blade di Filament in 

## Struttura Standard dei Template di Pagina

Ogni template di pagina Filament in  **DEVE** seguire questa struttura standardizzata per garantire coerenza nell'interfaccia utente.

## Elementi Obbligatori

Ogni template di pagina Filament deve includere:

1. **Tag radice**: `<x-filament-panels::page>`
2. **Sezione principale**: `<x-filament::section>`
3. **Tre slot** all'interno della sezione:
   - `heading`: Titolo della pagina
   - `description`: Breve descrizione della funzionalità
   - `footer`: Pulsanti di azione o altre funzionalità

## Esempio Base

```blade
<x-filament-panels::page>
    <x-filament::section>
        <x-slot name="heading">
            Test Invio [Tipo]
        </x-slot>

        <x-slot name="description">
            Utilizza questo form per testare l'invio...
        </x-slot>

        {{ $this->nomeForm }}

        <x-slot name="footer">
            <div class="flex items-center justify-end gap-x-3">
                <x-filament::button wire:click="methodName" type="submit">
                    Invia [Tipo]
                </x-filament::button>
            </div>
        </x-slot>
    </x-filament::section>
</x-filament-panels::page>
```

## Verifiche

- Assicurarsi che ogni template includa i tre slot obbligatori
- Verificare la coerenza stilistica tra le pagine
- Includere pulsanti di azione nel footer per ogni form

## Riferimenti
- [Documentazione completa](/var/www/html//laravel/Modules/Notify/docs/FILAMENT_TEMPLATE_CONVENTIONS.md)
