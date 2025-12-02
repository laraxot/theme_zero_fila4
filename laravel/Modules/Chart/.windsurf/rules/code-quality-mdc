---
trigger: always_on
description: 
globs: 
---
# Regole per la Qualità del Codice

## PHPStan

Per mantenere alta la qualità del codice, utilizziamo PHPStan per l'analisi statica.

### Configurazione per Moduli

Ogni modulo Laravel deve avere un file `phpstan.neon.dist` configurato correttamente:

```neon
includes:
    - phpstan-baseline.neon

parameters:
    level: 3
    paths:
        - app

    excludePaths:
        - app/Filament/Pages (?)
        - build (?)
        - vendor (?)
        - Tests (?)
        - rector.php

    ignoreErrors:
        - '#Unsafe usage of new static#'
        - '#Access to an undefined property#'
        - '#Call to an undefined method#'
        - '#Call to an undefined static method#'
        - '#PHPDoc tag @mixin contains unknown class#'
        - '#should return .* but returns#'
```

### Classi Base Personalizzate

Il progetto utilizza classi base personalizzate al posto delle classi standard di Laravel:

- Utilizziamo `XotBaseRouteServiceProvider` invece di `Illuminate\Foundation\Support\Providers\RouteServiceProvider`
- Utilizziamo `XotBaseResource` invece di `Filament\Resources\Resource`
- Utilizziamo `BaseModel` di ciascun modulo (`Modules\\<Module>\\Models\\BaseModel`) invece di `Illuminate\\Database\\Eloquent\\Model` per tutti i modelli del modulo, centralizzando comportamenti comuni e configurazioni specifiche.
- Queste personalizzazioni possono causare problemi con gli strumenti di analisi statica

### Baseline

Per progetti esistenti, generare un file baseline:

```bash
./vendor/bin/phpstan analyse --generate-baseline
```

### Livelli

- **Livello 3**: Per codice esistente
- **Livello 5**: Per nuovi moduli
- **Livello 8**: Per nuovi progetti

## Safe

Per rendere il codice più sicuro, utilizzare la libreria Safe che fornisce funzioni PHP che lanciano eccezioni anziché restituire `false`.

### Import

```php
use function Safe\file_get_contents;
use function Safe\json_decode;
```

### Esempio

```php
// Invece di
$content = file_get_contents('file.txt');
if ($content === false) {
    throw new Exception('Errore di lettura');
}

// Usare
$content = Safe\file_get_contents('file.txt');
```

## Convenzioni di Codice

### Regole Generali

1. **Tipi PHP**: Usare sempre type hints e return types
2. **Nullability**: Usare tipi nullable (`?string`) quando appropriato
3. **Nomi Variabili**: camelCase per variabili e metodi, PascalCase per classi
4. **Metodi**: Nome verbo + sostantivo che descrive l'azione
5. **Commenti**: PHPDoc per tutti i metodi pubblici

### Lunghezza

1. **Metodi**: Max 20 linee
2. **Classi**: Max 200 linee
3. **File**: Max 500 linee
4. **Linee**: Max 80 caratteri

### Organizzazione del Codice

1. **Single Responsibility**: Ogni classe ha una sola responsabilità
2. **Dependency Injection**: Usare DI anziché creare istanze direttamente
3. **Final**: Dichiarare le classi `final` quando non devono essere estese

### ServiceProvider `$name` Property

Nelle classi che estendono `XotBaseServiceProvider`:
- Dichiarare `public string $name = '<ModuleName>';` immediatamente dopo la dichiarazione della classe.
- Non usare docblock sopra questa proprietà.
- Mantenere visibilità `public` per compatibilità con la classe base.