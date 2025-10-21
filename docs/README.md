# Documentazione del Tema Zero

Questa cartella contiene la documentazione specifica per il tema Zero del progetto.

## Struttura del Tema

- `app/`: Componenti PHP del tema
- `resources/`: Risorse frontend (views, assets)
- `public/`: File pubblici compilati
- `lang/`: File di traduzione specifici del tema

## Personalizzazione

Il tema Zero è basato su TailwindCSS e utilizza Vite per la compilazione degli assets.

Per personalizzare il tema:

1. Modificare i file in `resources/views/`
2. Aggiornare gli stili in `resources/css/`
3. Eseguire `npm run build` per compilare gli assets

## Correzioni Apportate

### Problemi di Configurazione PHPStan

Durante l'analisi del progetto con PHPStan, sono stati identificati e risolti i seguenti problemi relativi al tema:

1. **Percorso del Tema Mancante**:
   - **Problema**: L'applicazione cercava il tema "One" che non era presente nella directory `Themes`.
   - **Soluzione**: È stato creato un symlink dal tema esistente "Zero" al tema "One" per risolvere il problema del percorso mancante. Questo ha permesso a PHPStan di caricare correttamente i file di bootstrap.

2. **Verifica della Struttura del Tema**:
   - **Problema**: La struttura del tema Zero è stata verificata per assicurare che tutti i percorsi richiesti fossero presenti.
   - **Soluzione**: È stata confermata la presenza delle directory `resources/views/pages` necessarie per il corretto funzionamento dell'applicazione.