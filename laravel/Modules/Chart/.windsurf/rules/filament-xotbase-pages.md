---
trigger: manual
description:
globs:
---
# Regola: Estensione XotBaseListRecords per le pagine ListRecords

## Regola
- Tutte le classi che estendono `\Filament\Resources\Pages\ListRecords` devono ora estendere `\Modules\Xot\Filament\Resources\Pages\XotBaseListRecords`.
- Non estendere mai direttamente classi Filament nelle risorse dei moduli.

## Motivazione
- **Override centralizzato**: Tutta la logica custom (policy, logging, traduzioni, ecc.) viene gestita nella XotBase.
- **Compatibilità**: Aggiornare Filament richiede solo l'aggiornamento della XotBase, non di tutte le risorse.
- **DRY**: Nessuna duplicazione di logica tra moduli.
- **Manutenibilità**: Più facile gestire bugfix e nuove feature cross-modulo.

## Esempio
```php
// ERRATO
use Filament\Resources\Pages\ListRecords;
class ListDoctors extends ListRecords { ... }

// CORRETTO
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
class ListDoctors extends XotBaseListRecords { ... }
```

## Checklist
- [ ] Nessuna classe estende direttamente ListRecords di Filament
- [ ] Tutte le List* estendono XotBaseListRecords
- [ ] Doc locale e centrale aggiornata
- [ ] File .mdc aggiornato

## Errori comuni
- Dimenticare di aggiornare l'uso nelle import
- Non aggiornare la doc o i file .mdc
- Dimenticare override/metodi custom nella XotBase

## Link doc
- [README <nome progetto>](../../laravel/Modules/<nome progetto>/docs/README.md)
- [README Xot](../../laravel/Modules/Xot/docs/README.md)
