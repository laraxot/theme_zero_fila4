# Regole per la Documentazione dei Moduli

## Regola Fondamentale: Indipendenza dal Progetto

La documentazione all'interno dei moduli **non deve mai** contenere riferimenti a nomi di progetti specifici. I moduli sono progettati per essere riutilizzabili tra progetti diversi, pertanto la loro documentazione deve essere completamente indipendente dal contesto di implementazione.

### Motivazione
- I moduli devono essere completamente riutilizzabili
- La documentazione è parte integrante del modulo stesso
- I riferimenti specifici al progetto creano accoppiamenti indesiderati
- Una documentazione generica facilita il riuso dei moduli

### Utilizzo Corretto
- Utilizzare termini generici come "il sistema", "l'applicazione", "la piattaforma"
- Parlare di funzionalità e implementazioni in modo indipendente dal contesto
- Descrivere le relazioni tra moduli senza riferimenti a progetti specifici

### Esempi

#### ❌ Non Corretto
```markdown
Il modulo Notify gestisce l'invio di email in  utilizzando template personalizzabili.
```

#### ✅ Corretto
```markdown
Il modulo Notify gestisce l'invio di email nel sistema utilizzando template personalizzabili.
```

### Procedura di Revisione
1. Controllare tutta la documentazione alla ricerca di riferimenti a progetti specifici
2. Sostituire questi riferimenti con termini generici appropriati
3. Verificare che il modulo rimanga concettualmente autosufficiente

## Applicazione
Questa regola si applica a:
- README.md nei moduli
- Documentazione tecnica nei moduli
- Commenti nel codice
- Esempi di utilizzo
- Diagrammi e schemi

## Procedura in Caso di Violazione
Se viene rilevata una violazione:
1. Correggere immediatamente tutti i riferimenti specifici al progetto
2. Verificare eventuali altri file di documentazione nello stesso modulo
3. Aggiornare regole e memorie per prevenire errori futuri
