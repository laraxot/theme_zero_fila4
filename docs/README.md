# Documentazione del Tema Zero

Questa cartella contiene documentazione interna per il tema Zero.

## Correzioni Apportate

### Problemi di Configurazione PHPStan

Durante l'analisi del progetto con PHPStan, sono stati identificati e risolti i seguenti problemi relativi al tema Zero:

1. **Configurazione del Database**:
   - **Problema**: Il database `quaeris_data` non esisteva, causando errori durante l'esecuzione delle migrazioni.
   - **Soluzione**: È stato creato il database `quaeris_data` per consentire il corretto funzionamento dell'applicazione.

2. **Aggiornamento del File .env**:
   - **Problema**: Il file `.env` conteneva configurazioni obsolete o mancanti.
   - **Soluzione**: Il file `.env` è stato aggiornato con le configurazioni corrette per il database e altri parametri necessari.

3. **Abilitazione dei Moduli Necessari**:
   - **Problema**: Alcuni moduli richiesti per il corretto funzionamento dell'applicazione erano disabilitati.
   - **Soluzione**: Sono stati abilitati i moduli `Cms` e `Geo` per garantire il corretto caricamento delle dipendenze.