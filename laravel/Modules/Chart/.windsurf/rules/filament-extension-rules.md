# Regole di Estensione delle Classi Filament

## Regola Fondamentale

**MAI** estendere direttamente classi di Filament. Utilizzare **SEMPRE** le classi wrapper con prefisso `XotBase` fornite dal modulo `Xot`.

## Mappatura Classi Corretta

| ❌ Classe Filament (NON USARE) | ✅ Classe XotBase (DA USARE) |
|-------------------------------|----------------------------|
| `\Filament\Pages\Page` | `\Modules\Xot\Filament\Pages\XotBasePage` |
| `\Filament\Resources\Resource` | `\Modules\Xot\Filament\Resources\XotBaseResource` |
| `\Filament\Resources\Pages\CreateRecord` | `\Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord` |
| `\Filament\Resources\Pages\EditRecord` | `\Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord` |
| `\Filament\Resources\Pages\ListRecords` | `\Modules\Xot\Filament\Resources\Pages\XotBaseListRecords` |
| `\Filament\Widgets\Widget` | `\Modules\Xot\Filament\Widgets\XotBaseWidget` |

## Esempi

### ❌ Errato
```php
use Filament\Pages\Page;

class SendSMSPage extends Page
{
    // ...
}
```

### ✅ Corretto
```php
use Modules\Xot\Filament\Pages\XotBasePage;

class SendSMSPage extends XotBasePage
{
    // ...
}
```

## Riferimenti
- [Modules/Notify/docs/FILAMENT_EXTENSION_RULES.md](file:///var/www/html//laravel/Modules/Notify/docs/FILAMENT_EXTENSION_RULES.md)
