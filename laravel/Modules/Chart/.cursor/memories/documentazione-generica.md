# Regole per la Documentazione Generica nei Moduli

## Principio di Neutralità del Progetto

MAI utilizzare il nome specifico del progetto nella documentazione dei moduli. I moduli sono progettati per essere riutilizzabili in diversi progetti, quindi la documentazione deve essere neutrale rispetto al contesto di utilizzo.

### Termini Corretti da Utilizzare
- "il sistema"
- "l'applicazione"
- "la piattaforma"
- "questo modulo"

### Termini da Evitare
- Nomi specifici di progetti (es. "<nome progetto>", "ProjectX", ecc.)
- Riferimenti a domini specifici associati a un singolo progetto
- Nomi di organizzazioni specifiche

## Motivazione
Mantenere la documentazione dei moduli generica consente di:
1. Massimizzare la riusabilità dei moduli
2. Prevenire accoppiamenti inappropriati
3. Facilitare la manutenzione e l'aggiornamento
4. Mantenere una chiara separazione delle responsabilità

## Esempi

### ❌ Errato
"Il modulo Notify gestisce tutte le notifiche e le comunicazioni via email del sistema <nome progetto>."

### ✅ Corretto
"Il modulo Notify gestisce tutte le notifiche e le comunicazioni via email del sistema."

## Procedura di Verifica
Prima di committare qualsiasi modifica alla documentazione nei moduli:
1. Verificare l'assenza di nomi di progetto specifici
2. Sostituire eventuali riferimenti con termini generici
3. Assicurarsi che il modulo rimanga concettualmente indipendente
