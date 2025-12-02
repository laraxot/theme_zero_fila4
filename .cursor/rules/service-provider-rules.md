# Regole per i Service Provider in il progetto

## Requisiti Fondamentali per XotBaseServiceProvider

Tutti i service provider che estendono `XotBaseServiceProvider` **DEVONO** definire le seguenti proprietà:

1. `public string $name`: 
   - Nome esatto del modulo (case-sensitive)
   - DEVE corrispondere al nome della cartella del modulo
   - NON può essere vuota

2. `protected string $module_dir`:
   - Solitamente impostata a `__DIR__`
   - Utilizzata per il caricamento automatico delle risorse

3. `protected string $module_ns`:
   - Solitamente impostata a `__NAMESPACE__`
   - Utilizzata per la registrazione dei service provider

## Esempio Corretto

```php
<?php

namespace Modules\Patient\Providers;

use Modules\Xot\Providers\XotBaseServiceProvider;

class RouteServiceProvider extends XotBaseServiceProvider
{
    // OBBLIGATORIO - Deve corrispondere al nome del modulo
    public string $name = 'Patient';
    
    // Obbligatorio - Directory corrente
    protected string $module_dir = __DIR__;
    
    // Obbligatorio - Namespace corrente
    protected string $module_ns = __NAMESPACE__;
    
    // Altri metodi e proprietà...
}
```

## Errori Comuni

- Dimenticare di definire la proprietà `$name`
- Impostare un nome errato o non corrispondente al nome della cartella del modulo
- Utilizzare un namespace errato in `$module_ns`
- Definire `$name` come protected invece di public

## Conseguenze

La mancata o incorretta definizione di queste proprietà causa:

- Errori di esecuzione che bloccano l'avvio dell'applicazione
- Problemi di registrazione delle risorse del modulo
- Problemi di caricamento delle traduzioni, viste e configurazioni
- Potenziale esaurimento di memoria o timeout
