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

Il progetto il progetto utilizza classi base personalizzate al posto delle classi standard di Laravel:

- Utilizziamo `XotBaseRouteServiceProvider` invece di `Illuminate\Foundation\Support\Providers\RouteServiceProvider`
- Utilizziamo `XotBaseResource` invece di `Filament\Resources\Resource`
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

## Wizard Steps

### Struttura del Codice

1. **Separazione delle Responsabilità**
   ```php
   /**
    * Get the privacy step for the wizard
    */
   protected static function getPrivacyStep(): Forms\Components\Wizard\Step
   {
       return Forms\Components\Wizard\Step::make('privacy')
           ->schema(self::getPrivacyStepSchema());
   }

   /**
    * Get the schema for the privacy step
    */
   protected static function getPrivacyStepSchema(): array
   {
       return [
           // schema components
       ];
   }
   ```

2. **Naming Conventions**
   - Metodi: `get{StepName}Step` e `get{StepName}StepSchema`
   - Chiavi di traduzione: senza suffissi `_step`
   - Nomi descrittivi e autoesplicativi

3. **Gestione delle Traduzioni**
   ```php
   return [
       'steps' => [
           'privacy' => [
               'label' => 'Privacy e Consensi',
               'help' => 'Leggi e accetta le condizioni di privacy',
           ],
       ],
       'fields' => [
           'privacy_acceptance' => [
               'label' => 'Accetto la Privacy Policy',
               'help' => 'Devi accettare la privacy policy per procedere',
           ],
       ],
   ];
   ```

### Best Practices

1. **Separazione delle Responsabilità**
   - Schema: definizione dei campi e validazioni
   - Step: configurazione dello step (icon, schema, etc.)
   - Traduzioni: gestione delle etichette e descrizioni

2. **Riutilizzo del Codice**
   - Creare componenti riutilizzabili
   - Utilizzare trait per funzionalità comuni
   - Evitare duplicazione di codice

3. **Validazione**
   - Definire le regole di validazione nello schema
   - Utilizzare custom validation rules quando necessario
   - Gestire gli errori in modo appropriato

4. **Performance**
   - Minimizzare le query al database
   - Utilizzare lazy loading quando appropriato
   - Ottimizzare le validazioni

## Errori Comuni

1. **Mixing di Responsabilità**
   - ❌ Definire lo schema direttamente nel metodo dello step
   - ✅ Separare la definizione dello schema in un metodo dedicato

2. **Naming Inconsistente**
   - ❌ Usare suffissi `_step` nelle chiavi di traduzione
   - ✅ Usare nomi descrittivi senza suffissi

3. **Documentazione Mancante**
   - ❌ Omettere la documentazione PHPDoc
   - ✅ Documentare sempre metodi e classi

4. **Hardcoding**
   - ❌ Hardcodare etichette e descrizioni
   - ✅ Utilizzare il sistema di traduzioni 