# Memoria: Gestione Proprietà nei Widget Filament

## Problema Riscontrato
- Widget con proprietà `$data` non nullable
- Widget con proprietà singole per campi form
- Widget senza proprietà `$data`

## Impatto
1. **Errori di Tipo**:
   - Nullable type mismatch
   - Inizializzazione non corretta
   - Problemi di binding

2. **Duplicazione**:
   - Proprietà ridondanti
   - Codice non DRY
   - Difficile manutenzione

## Soluzione Implementata
1. **Standardizzazione**:
   - `public ?array $data = []` in tutti i widget
   - Rimozione proprietà singole
   - Binding attraverso `data.field_name`

2. **Documentazione**:
   - Nuova regola widget-properties.rule
   - Aggiornamento docs/modules/xot/widgets.md
   - Checklist di verifica

## Lezioni Apprese
1. **Consistenza**:
   - Pattern uniforme per tutti i widget
   - Meno errori di implementazione
   - Codice più mantenibile

2. **Type Safety**:
   - Nullable array per gestione stati
   - Prevenzione errori runtime
   - Migliore type checking

3. **Best Practices**:
   - Single source of truth per dati form
   - Binding centralizzato
   - Meno codice boilerplate

## Prevenzione Futura
1. **Review Checklist**:
   - Verifica proprietà `$data`
   - Controllo proprietà singole
   - Validazione binding

2. **Automazione**:
   - PHPStan rules
   - Code sniffer
   - CI/CD checks

## Note per il Team
- Importanza della standardizzazione
- Benefici del type safety
- Valore della documentazione 