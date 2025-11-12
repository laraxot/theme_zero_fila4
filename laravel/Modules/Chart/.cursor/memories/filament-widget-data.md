# Memoria: Gestione Dati nei Widget Filament

## Lezione Appresa
L'errore `[wire:model="data.first_name"] property does not exist` si è verificato perché la proprietà `$data` non era definita nella classe base `XotBaseWidget`. Questo ha causato il fallimento del binding dei dati nei form dei widget.

## Soluzione Implementata
```php
class XotBaseWidget extends Widget implements HasForms
{
    public ?array $data = [];  // Aggiunta questa proprietà
}
```

## Perché è Importante
1. **Ereditarietà**:
   - Tutti i widget con form ereditano da XotBaseWidget
   - La proprietà $data deve essere nella classe base
   - Evita duplicazione del codice

2. **Binding Dati**:
   - Livewire cerca la proprietà "data"
   - Il binding usa il formato "data.field_name"
   - Necessario per i form Filament

3. **Inizializzazione**:
   - Mount inizializza il form
   - Fill popola i dati iniziali
   - StatePath configura il binding

## Impatto dell'Errore
1. **Form non Funzionanti**:
   - Binding dati fallito
   - Input non salvati
   - Validazione non funzionante

2. **Debugging Difficile**:
   - Errore non ovvio
   - Richiede analisi profonda
   - Impatta tutti i widget

## Come Prevenire
1. **Classe Base**:
   - Definire sempre $data
   - Implementare mount
   - Configurare statePath

2. **Widget Figli**:
   - Estendere XotBaseWidget
   - Non ridefinire $data
   - Chiamare parent::mount()

3. **Template**:
   - Usare "data." nel binding
   - Verificare nomi campi
   - Seguire convenzioni

## Checklist Verifica
- [ ] XotBaseWidget ha $data?
- [ ] Mount inizializza form?
- [ ] StatePath configurato?
- [ ] Binding usa "data."?

## Note per il Futuro
1. Sempre verificare la classe base
2. Documentare le proprietà richieste
3. Testare il binding dei dati
4. Mantenere consistenza 