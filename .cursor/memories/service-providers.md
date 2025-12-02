# Memoria per Service Providers

## Esempi Pratici

### ❌ NON FARE
```php
public function boot(): void
{
    parent::boot();
    
    // ❌ NON registrare manualmente i componenti Blade
    Blade::componentNamespace('Modules\User\View\Components', 'user');
    Blade::component('user-profile-dropdown', \Modules\User\View\Components\Profile\Dropdown::class);
    Blade::component('user-profile-dropdown-link', \Modules\User\View\Components\Profile\DropdownLink::class);
}
```

### ✅ FARE
```php
public function boot(): void
{
    parent::boot();
    
    // ✅ Solo inizializzazioni specifiche del modulo
    $this->registerConfig();
    $this->registerCustomServices();
}
```

## Casi d'Uso Comuni

### 1. Registrazione Configurazioni
```php
protected function registerConfig(): void
{
    $this->publishes([
        __DIR__.'/../config/config.php' => config_path('module-name.php'),
    ], 'config');
    
    $this->mergeConfigFrom(
        __DIR__.'/../config/config.php', 'module-name'
    );
}
```

### 2. Registrazione Servizi Custom
```php
public function register(): void
{
    parent::register();
    
    $this->app->singleton('custom-service', function ($app) {
        return new CustomService();
    });
}
```

### 3. Registrazione Comandi
```php
public function registerCommands(): void
{
    parent::registerCommands();
    
    $this->commands([
        CustomCommand::class,
    ]);
}
```

## Best Practices

1. **Struttura**
   - Mantenere la struttura standard
   - Seguire le convenzioni di naming
   - Documentare le personalizzazioni

2. **Registrazione**
   - Lasciare che XotBaseServiceProvider gestisca le registrazioni standard
   - Aggiungere solo logica specifica del modulo
   - Evitare duplicazioni

3. **Manutenzione**
   - Mantenere aggiornata la documentazione
   - Verificare la compatibilità con le versioni
   - Testare le personalizzazioni 