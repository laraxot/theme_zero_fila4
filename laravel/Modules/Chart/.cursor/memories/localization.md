# Memoria: Errori di Localizzazione

## Errori Critici Riscontrati

### 1. UnsupportedLocaleException
- **File**: `CmsServiceProvider.php`
- **Errore**: Lingua predefinita non in `supportedLocales`
- **Impatto**: Crash dell'applicazione
- **Soluzione**: Sincronizzare configurazioni

### 2. MissingTranslationException
- **File**: Vari file di vista
- **Errore**: Chiavi di traduzione mancanti
- **Impatto**: Testi non tradotti
- **Soluzione**: Aggiungere traduzioni

### 3. InvalidLocaleException
- **File**: Route e middleware
- **Errore**: Lingua non valida in URL
- **Impatto**: Redirect non funzionanti
- **Soluzione**: Validare lingue

## Lezioni Apprese

### 1. Configurazione
- Verificare sempre la coerenza
- Mantenere sincronizzate le configurazioni
- Gestire correttamente i fallback
- Testare tutte le lingue

### 2. ServiceProvider
- Verificare configurazioni all'avvio
- Gestire errori di configurazione
- Loggare problemi di localizzazione
- Non assumere configurazioni corrette

### 3. Middleware
- Usare middleware di localizzazione
- Gestire redirect delle lingue
- Mantenere coerenza URL
- Validare lingue in input

## Prevenzione

### 1. Setup Iniziale
- Verificare file di configurazione
- Sincronizzare lingue supportate
- Definire lingua di fallback
- Testare configurazione

### 2. Sviluppo
- Usare file di traduzione
- Seguire struttura standard
- Non hardcodare stringhe
- Gestire tutti i casi

### 3. Testing
- Testare tutte le lingue
- Verificare redirect
- Controllare traduzioni
- Validare configurazioni

## Note per il Team

### 1. Configurazione
```php
// config/app.php
'locale' => 'it',
'fallback_locale' => 'it',
'available_locales' => ['it', 'en'],

// config/laravellocalization.php
'supportedLocales' => [
    'it' => [
        'name' => 'Italiano',
        'script' => 'Latn',
        'native' => 'Italiano',
        'regional' => 'it_IT',
    ],
    'en' => [
        'name' => 'English',
        'script' => 'Latn',
        'native' => 'English',
        'regional' => 'en_GB',
    ],
],
```

### 2. ServiceProvider
```php
public function boot()
{
    $defaultLocale = config('app.locale');
    $supportedLocales = config('laravellocalization.supportedLocales');

    if (!isset($supportedLocales[$defaultLocale])) {
        throw new UnsupportedLocaleException(
            "La lingua predefinita '$defaultLocale' non è supportata"
        );
    }
}
```

### 3. Route
```php
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect'],
], function () {
    // Route localizzate
});
```

## Checklist di Verifica
1. [ ] File di configurazione sincronizzati
2. [ ] Lingue supportate definite
3. [ ] Lingua di fallback configurata
4. [ ] Middleware installati
5. [ ] Route localizzate
6. [ ] Traduzioni complete
7. [ ] Test eseguiti
8. [ ] Errori gestiti 