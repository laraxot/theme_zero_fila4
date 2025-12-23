# Memoria per i Wizard Steps

## Principi Fondamentali

1. **Single Responsibility Principle**
   - Ogni step deve avere una singola responsabilità
   - Separare la definizione dello schema dalla creazione dello step
   - Utilizzare metodi dedicati per ogni step

2. **Naming Conventions**
   - Nomi dei metodi: `get{StepName}Step` per la creazione dello step
   - Nomi dei metodi: `get{StepName}StepSchema` per lo schema dello step
   - Nomi delle chiavi: senza suffisso `_step` nelle traduzioni

3. **Struttura del Codice**
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

4. **Gestione delle Traduzioni**
   - Utilizzare il sistema di traduzioni di Filament
   - Non usare direttamente `->label()` o `->description()`
   - Mantenere le traduzioni in file dedicati

5. **Documentazione**
   - Documentare ogni step con PHPDoc
   - Spiegare lo scopo e le dipendenze
   - Indicare eventuali validazioni o logiche speciali

## Best Practices

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

## Esempi di Implementazione

### Corretto
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
        Forms\Components\View::make('patient::privacy-policy')
            ->columnSpanFull(),
        Forms\Components\Checkbox::make('privacy_acceptance')
            ->required()
            ->columnSpanFull(),
        Forms\Components\Checkbox::make('newsletter')
            ->columnSpanFull(),
    ];
}
```

### Non Corretto
```php
protected static function getPrivacyStep(): Forms\Components\Wizard\Step
{
    return Forms\Components\Wizard\Step::make('privacy_step')
        ->schema([
            Forms\Components\View::make('patient::privacy-policy')
                ->columnSpanFull(),
            Forms\Components\Checkbox::make('privacy_acceptance')
                ->required()
                ->columnSpanFull(),
            Forms\Components\Checkbox::make('newsletter')
                ->columnSpanFull(),
        ]);
}
```

## Errori Comuni da Evitare

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