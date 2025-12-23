# Regole del Progetto il progetto

## Service Providers

### XotBaseServiceProvider
- **REGOLA FONDAMENTALE**: Tutti i ServiceProvider dei moduli **DEVONO ESTENDERE XotBaseServiceProvider** e MAI estendere direttamente Illuminate\Support\ServiceProvider
- Definire sempre le proprietà: `$name`, `$module_dir` e `$module_ns`
- Chiamare sempre `parent::boot()` nel metodo boot()
- Non reimplementare metodi già presenti in XotBaseServiceProvider

Esempio corretto:
```php
namespace Modules\ModuleName\Providers;

use Modules\Xot\Providers\XotBaseServiceProvider;

class ModuleServiceProvider extends XotBaseServiceProvider
{
    public string $name = 'ModuleName';
    protected string $module_dir = __DIR__;
    protected string $module_ns = __NAMESPACE__;
    
    public function boot(): void
    {
        parent::boot();
        // Operazioni aggiuntive specifiche del modulo
    }
}
```

### XotBaseRouteServiceProvider
- **REGOLA FONDAMENTALE**: Tutti i RouteServiceProvider dei moduli **DEVONO ESTENDERE XotBaseRouteServiceProvider** e MAI estendere direttamente Illuminate\Foundation\Support\Providers\RouteServiceProvider
- Definire sempre le proprietà: `$name`, `$module_dir` e `$module_ns`
- Definire `$moduleNamespace` con il namespace completo dei controller

Esempio corretto:
```php
namespace Modules\ModuleName\Providers;

use Modules\Xot\Providers\XotBaseRouteServiceProvider;

class RouteServiceProvider extends XotBaseRouteServiceProvider
{
    public string $name = 'ModuleName';
    protected string $module_dir = __DIR__;
    protected string $module_ns = __NAMESPACE__;
    protected string $moduleNamespace = 'Modules\\ModuleName\\Http\\Controllers';
}
```

## Filament Resources

### XotBaseResource
- Utilizzare `getFormSchema(): array` invece di `form(Form $form): Form`
- Restituire un array associativo con chiavi stringhe
- Le chiavi devono corrispondere ai nomi dei campi
- Non utilizzare il builder di Filament (`$form->schema()`)
- Seguire l'esempio nella documentazione per la struttura corretta
- Non definire `navigationIcon` se la classe estende `XotBaseResource`
- Rimuovere `getRelations()` se restituisce array vuoto
- Rimuovere `getPages()` se contiene solo route standard

### Convenzioni Generali
- PSR-12 per lo stile del codice
- Type hints obbligatori
- Return types obbligatori
- Docblocks per tutti i metodi pubblici
- Enum per stati e tipi
- Utilizzare strict_types=1 in tutti i file PHP

### Struttura del Progetto
- Core: Gestione base del sistema
- Patient: Gestione pazienti e ISEE
- Dental: Gestione visite e trattamenti
- Reporting: Reportistica e statistiche
- UI: Componenti interfaccia utente
- User: Gestione utenti e permessi
- Tenant: Gestione multi-tenant

### Tecnologie
- Laravel 11.x / 12.x
- Filament 3.x
- Spatie Laravel-permission
- Nwidart Modules
- Laraxot Modules