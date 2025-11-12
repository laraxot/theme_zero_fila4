---
trigger: manual
description:
globs:
---
# PSR-4 Autoloading Rules

## When
- Stai creando un nuovo file in un modulo Laravel
- Stai spostando o rinominando file esistenti
- Stai definendo namespace per classi
- Stai lavorando con factories o seeders

## Then
1. Assicurati che il namespace corrisponda esattamente al percorso del file
2. Posiziona i file nelle directory corrette in base al loro tipo:
   - Livewire components in `app/Http/Livewire/`
   - Actions in `app/Actions/`
   - Factories in `database/factories/` (lowercase)
   - Seeders in `database/seeders/` (lowercase)
3. Usa i case corretti:
   - PascalCase per nomi di classi e namespace
   - lowercase per directory standard (factories, seeders)
4. Rimuovi caratteri speciali o underscore dalle directory standard

## Because
- PSR-4 richiede una corrispondenza esatta tra namespace e struttura delle directory
- L'autoloading non funzionerà se i file sono nelle directory sbagliate
- La consistenza dei nomi delle directory è fondamentale per il corretto funzionamento dell'autoloader
- Laravel si aspetta determinate convenzioni per il corretto funzionamento del framework

## Examples

### Corretto
```php
// File: ./Modules/<nome progetto>/app/Http/Livewire/Calendar.php
namespace Modules\<nome progetto>\Http\Livewire;

// File: ./Modules/Tenant/database/factories/DomainFactory.php
namespace Modules\Tenant\Database\Factories;
```

### Errato
```php
// ERRATO: File nella directory sbagliata
// File: ./Modules/<nome progetto>/app/Actions/Calendar/Calendar.php
namespace Modules\<nome progetto>\Http\Livewire;

// ERRATO: Directory con underscore
// File: ./Modules/Tenant/database/Factories_/DomainFactory.php
namespace Modules\Tenant\Database\Factories;
```

## Common Pitfalls

- **Errore**: Posizionare file nella directory sbagliata
  **Soluzione**: Sposta il file nella directory corrispondente al suo namespace

- **Errore**: Usare underscore nelle directory standard
  **Soluzione**: Rimuovi gli underscore e usa il case corretto

- **Errore**: Namespace non corrispondente al percorso
  **Soluzione**: Allinea il namespace con il percorso del file

- **Errore**: Case errato nelle directory
  **Soluzione**: Usa lowercase per directories standard come factories e seeders
