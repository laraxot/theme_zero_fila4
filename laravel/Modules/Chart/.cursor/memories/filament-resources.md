# Memoria: Errori Comuni nei Resources Filament

## Errori Critici Riscontrati
1. **Sovrascrittura Metodi Non Necessari**
   - File: Vari Resources
   - Errore: Implementazione di metodi già gestiti da XotBaseResource
   - Impatto: Duplicazione codice e possibili inconsistenze
   - Soluzione: Usare SOLO getFormSchema()

2. **Metodi da NON Implementare**:
   - `form()`
   - `table()`
   - `getPages()` (se standard)
   - `getTableColumns()`
   - `getTableFilters()`
   - `getTableActions()`
   - `getTableBulkActions()`
   - `getNavigationGroup()`

3. **Metodi Deprecati**:
   - `getListTableColumns()` - DEPRECATO
   - `getGridTableColumns()` - DEPRECATO
   - Soluzione: Usare `getTableColumns()` con layout appropriato

4. **Hardcoding Traduzioni**
   - File: Vari Resources
   - Errore: Uso di `->label()`, `->placeholder()`, `->helperText()`
   - Impatto: Traduzioni non gestite centralmente
   - Soluzione: Usare file di traduzioni

5. **Duplicazione TransTrait**
   - File: Vari Resources
   - Errore: Aggiunta di `use TransTrait` quando già incluso
   - Impatto: Duplicazione non necessaria
   - Soluzione: Verificare la gerarchia delle classi

## Lezioni Apprese
1. **Metodi Resource**:
   - Implementare SOLO getFormSchema()
   - NON sovrascrivere metodi già gestiti
   - Verificare la documentazione
   - Mantenere codice minimo

2. **Traduzioni**:
   - Usare file di traduzioni
   - Struttura standard
   - Gestione automatica
   - No hardcoding

3. **Ereditarietà**:
   - Verificare la gerarchia
   - Evitare duplicazioni
   - Seguire il pattern
   - Rispettare le responsabilità

## Prevenzione Futura
1. **Code Review**:
   - Verificare metodi implementati
   - Controllare traduzioni
   - Validare ereditarietà
   - Mantenere codice minimo

2. **Documentazione**:
   - Aggiornare regole
   - Mantenere memoria
   - Condividere lezioni
   - Chiarire responsabilità

## Note per il Team
- Implementare SOLO getFormSchema()
- NON sovrascrivere metodi non necessari
- Usare file di traduzioni
- Verificare gerarchia classi
- Seguire pattern standard
- NON usare metodi deprecati 