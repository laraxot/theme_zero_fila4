---
trigger: manual
description:
globs:
---
# Regole per i Componenti UI

> **Nota**: Per una documentazione completa, vedere:
> - [/docs/implementazione/standard_ui_components.md](../../docs/implementazione/standard_ui_components.md)
> - [/laravel/Modules/Cms/docs/standard_ui_components.md](../../laravel/Modules/Cms/docs/standard_ui_components.md)

## Standard Filament

### Componenti da Utilizzare
- Utilizzare sempre i componenti Filament quando disponibili
- Evitare componenti personalizzati quando esiste un equivalente Filament

### Esempi di Componenti
```blade
# ✅ Corretto
<x-filament::button size="sm" href="{{ route('example') }}" tag="a">
    Testo
</x-filament::button>

# ❌ Non Corretto
<a href="{{ route('example') }}">
    <x-ui.button>Testo</x-ui.button>
</a>
```

### Motivi per Usare Filament
1. Coerenza nell'interfaccia utente
2. Accessibilità integrata
3. Supporto per temi
4. Manutenibilità del codice
5. Documentazione ufficiale

## Riferimenti
- [Documentazione Filament](https://filamentphp.com/docs/3.x/support/blade-components/overview)
- [Memoria UI in Cursor](../memories/ui-components.mdc)
