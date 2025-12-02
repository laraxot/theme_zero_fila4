# Memoria Service Provider

## Errori Comuni

### 1. Duplicazione della Logica Base
- ❌ Registrare manualmente i componenti Blade
- ❌ Registrare manualmente le viste
- ❌ Registrare manualmente le traduzioni
- ❌ Registrare manualmente le configurazioni

### 2. Visibilità dei Metodi
- ❌ Modificare la visibilità dei metodi ereditati
- ❌ Non chiamare i metodi parent

### 3. Proprietà Obbligatorie
- ❌ Non definire `$name` come public
- ❌ Non definire `$module_dir`
- ❌ Non definire `$module_ns`

## Best Practices

### 1. Struttura Base
```php
class ModuleNameServiceProvider extends XotBaseServiceProvider
{
    public string $name = 'ModuleName';
    public string $nameLower = 'modulename';
    protected string $module_dir = __DIR__;
    protected string $module_ns = __NAMESPACE__;

    public function boot(): void
    {
        parent::boot();
        // Solo inizializzazioni specifiche
    }
}
```

### 2. Registrazione Componenti
- ✅ Lasciare che XotBaseServiceProvider gestisca la registrazione base
- ✅ Registrare solo componenti specifici del modulo
- ✅ Documentare le personalizzazioni

### 3. Documentazione
- ✅ Studiare sempre XotBaseServiceProvider prima di estenderlo
- ✅ Consultare la documentazione del modulo
- ✅ Aggiornare la documentazione quando necessario 