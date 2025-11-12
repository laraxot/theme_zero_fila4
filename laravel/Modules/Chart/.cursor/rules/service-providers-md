# Regole per i Service Provider in Laraxot

## Namespace e Classi Base

### Event Service Provider
- Namespace corretto: `Modules\Xot\Providers\XotBaseEventServiceProvider`
- Estensione: `extends XotBaseEventServiceProvider`
- Proprietà richieste:
  ```php
  protected $listen = [];
  protected static $shouldDiscoverEvents = true;
  ```

### Route Service Provider
- Namespace corretto: `Modules\Xot\Providers\XotBaseRouteServiceProvider`
- Estensione: `extends XotBaseRouteServiceProvider`
- Proprietà richieste:
  ```php
  protected string $moduleNamespace;
  protected string $module_dir = __DIR__;
  protected string $module_ns = __NAMESPACE__;
  ```

### Service Provider Principale
- Namespace corretto: `Modules\Xot\Providers\XotBaseServiceProvider`
- Estensione: `extends XotBaseServiceProvider`
- Proprietà richieste:
  ```php
  protected string $moduleName;
  protected string $moduleNameLower;
  ```

## Best Practices

1. **Boot Method**
   - Chiamare sempre `parent::boot()` all'inizio
   - Implementare la logica specifica dopo

2. **Register Method**
   - Registrare i provider necessari
   - Configurare i servizi del modulo

3. **Proprietà**
   - Dichiarare sempre le proprietà richieste
   - Utilizzare i tipi corretti
   - Documentare con PHPDoc

4. **Namespace**
   - Seguire la struttura corretta
   - Utilizzare le classi base appropriate
   - Evitare import diretti di Laravel

## Errori Comuni

1. **Namespace Errato**
   ```php
   // ❌ ERRATO
   use Modules\Xot\Providers\BaseEventServiceProvider;
   
   // ✅ CORRETTO
   use Modules\Xot\Providers\XotBaseEventServiceProvider;
   ```

2. **Mancanza parent::boot()**
   ```php
   // ❌ ERRATO
   public function boot(): void
   {
       // Logica senza parent::boot()
   }
   
   // ✅ CORRETTO
   public function boot(): void
   {
       parent::boot();
       // Logica specifica
   }
   ```

3. **Proprietà Mancanti**
   ```php
   // ❌ ERRATO
   class EventServiceProvider extends XotBaseEventServiceProvider
   {
       // Manca $listen
   }
   
   // ✅ CORRETTO
   class EventServiceProvider extends XotBaseEventServiceProvider
   {
       protected $listen = [];
   }
   ``` 