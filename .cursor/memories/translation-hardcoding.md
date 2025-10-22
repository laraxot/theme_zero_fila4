# Memoria: Errori Comuni nella Gestione delle Traduzioni

## Errori Critici Riscontrati
1. **Rimozione $data da XotBaseWidget**
   - File: `XotBaseWidget.php`
   - Errore: Rimozione `public ?array $data = []`
   - Impatto: Livewire non funziona più
   - Soluzione: NON rimuovere MAI questa proprietà

2. **Duplicazione TransTrait**
   - File: `MailTemplateResource.php`
   - Errore: Aggiunta di `use TransTrait` quando già incluso
   - Impatto: Duplicazione non necessaria
   - Soluzione: Verificare la gerarchia delle classi

3. **Uso di Metodi di Traduzione**
   - File: `MailTemplateResource.php`
   - Errore: Uso di `->label()`, `->placeholder()`, `->helperText()`
   - Impatto: Traduzioni hardcoded
   - Soluzione: Lasciare che LangServiceProvider gestisca le traduzioni

## Lezioni Apprese
1. **Importanza $data**:
   - È ESSENZIALE per Livewire
   - Gestisce il binding dei dati
   - NON deve essere rimossa

2. **Ereditarietà**:
   - Verificare la gerarchia delle classi
   - Evitare duplicazioni di trait
   - Seguire il pattern di ereditarietà

3. **Traduzioni**:
   - Lasciare che LangServiceProvider gestisca
   - Definire nei file di lingua
   - Non hardcodare nel codice

## Prevenzione Futura
1. **Code Review**:
   - Verificare presenza $data
   - Controllare duplicazioni trait
   - Validare gestione traduzioni

2. **Documentazione**:
   - Aggiornare regole
   - Mantenere memoria
   - Condividere lezioni

## Note per il Team
- $data è CRITICA per Livewire
- NON duplicare TransTrait
- Lasciare che LangServiceProvider gestisca le traduzioni 