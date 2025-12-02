# Script fix_structure.sh

## Descrizione
Lo script `fix_structure.sh` è progettato per standardizzare la struttura delle directory del progetto il progetto, garantendo che tutti i moduli seguano le stesse convenzioni di naming e organizzazione delle cartelle.

## Funzionalità

Lo script esegue due operazioni principali:

1. **Spostamento di cartelle in app/**: Sposta cartelle specifiche all'interno della directory `app/` per conformarsi alla struttura standard di Laravel.
2. **Rinomina cartelle in minuscolo**: Rinomina cartelle con nomi in maiuscolo in minuscolo per rispettare le convenzioni di naming di Laravel.
3. **Gestione di cartelle duplicate**: Quando esistono sia versioni maiuscole che minuscole della stessa cartella, ne unisce i contenuti mantenendo la versione minuscola.

## Utilizzo

```bash
cd /path/to/project
./bashscripts/fix_structure.sh
```

## Dettagli Implementativi

### Array di cartelle da spostare

```bash
MOVE_TO_APP=("Actions" "Broadcasting" "Casts" "Console" "Emails" "Enums" "Events" 
"Exceptions" "Jobs" "Listeners" "Mail" "Models" "Notifications" "Observers" 
"Policies" "Providers" "Rules" "Services" "Traits" "Filesystem" "Http" "Jobs" 
"Listeners" "Mail" "Models" "Notifications" "Observers" "Policies" "Providers" 
"Rules" "Services" "Traits" "Interfaces" "Repositories" "Transformers")
```

Queste cartelle, se presenti nella radice del progetto, verranno spostate all'interno della directory `app/`.

### Array di cartelle da rinominare in minuscolo

```bash
RENAME_TO_LOWER=("Config" "Database" "Resources" "Routes" "Tests")
```

Queste cartelle, se presenti con nomi in maiuscolo, verranno rinominate in minuscolo.

### Funzione move_config

La funzione `move_config` gestisce il caso in cui esistono sia una versione maiuscola che minuscola della stessa cartella. In tal caso:

1. Copia il contenuto della cartella minuscola nella cartella maiuscola
2. Rinomina la cartella minuscola in `<nome>_old`
3. Rinomina la cartella maiuscola in minuscolo

Questo processo garantisce che non si perda alcun contenuto durante la standardizzazione.

## Scenari gestiti

### 1. Solo versione maiuscola

Se esiste solo una cartella con nome in maiuscolo (es. "Config"), viene semplicemente rinominata in minuscolo (es. "config").

### 2. Solo versione minuscola

Se esiste già solo la versione minuscola della cartella, nessuna azione viene eseguita.

### 3. Entrambe le versioni

Se esistono sia la versione maiuscola che minuscola della stessa cartella:
- I contenuti di entrambe vengono uniti
- La versione minuscola originale viene rinominata in `<nome>_old` 
- La versione maiuscola (contenente ora i contenuti di entrambe) viene rinominata in minuscolo

## Test

Lo script è testato attraverso il file `FixStructureTest.php` nel modulo Xot, che verifica:
- Il corretto spostamento delle cartelle in app/
- La corretta rinomina delle cartelle in minuscolo
- La corretta unione dei contenuti quando esistono entrambe le versioni

## Note sulla Sicurezza

- Lo script non elimina file, ma li sposta o rinomina
- Prima di eseguire lo script su un progetto di produzione, è consigliabile fare un backup
- In caso di errori, le cartelle originali in minuscolo possono essere recuperate dalla versione `<nome>_old`

## Compatibilità

Lo script è progettato per funzionare su:
- Linux
- macOS
- Windows con WSL (Windows Subsystem for Linux)

## Limitazioni

- Non gestisce il caso di file con lo stesso nome ma case diverso all'interno delle cartelle
- Non risolve conflitti di nomi di file o directory oltre a quelli specificati negli array
- Non gestisce permessi speciali sui file

## Manutenzione

In caso di modifiche alla struttura standard del progetto, gli array `MOVE_TO_APP` e `RENAME_TO_LOWER` dovrebbero essere aggiornati di conseguenza. 
