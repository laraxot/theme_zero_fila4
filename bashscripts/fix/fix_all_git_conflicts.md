# Script di Risoluzione Automatica dei Conflitti Git

## Descrizione
Questo script automatizza la risoluzione dei conflitti Git mantenendo automaticamente la versione (corrente) dei file in conflitto.

## Caratteristiche
- Rileva automaticamente tutti i file con conflitti Git nel repository
- Crea backup automatici dei file prima della modifica
- Esclude automaticamente le directory vendor/ e node_modules/
- Supporta la conferma interattiva prima di procedere
- Fornisce feedback colorato e dettagliato durante l'esecuzione
- Mantiene automaticamente la versione dei file

## Utilizzo
```bash
./fix_all_git_conflicts.sh
```

## Come Funziona
1. Lo script cerca tutti i file che contengono marcatori di conflitto Git 
2. Per ogni file trovato:
   - Crea un backup con timestamp
   - Conta il numero di conflitti nel file
   - Rimuove la versione non-HEAD del conflitto
   - Rimuove i marcatori di conflitto
   - Pulisce le righe vuote multiple

## Sicurezza
- Crea backup automatici con timestamp per ogni file modificato
- Richiede conferma esplicita prima di procedere
- Non modifica file nelle directory vendor/ e node_modules/

## Output
Lo script fornisce feedback colorato per:
- Numero totale di file con conflitti
- Progresso per ogni file elaborato
- Numero di conflitti per file
- Conferma di completamento
- Posizione dei file di backup

## Note Importanti
- Si consiglia di verificare i file modificati prima di committare
- I backup vengono creati con l'estensione `.backup-YYYYMMDD-HHMMSS`
- Lo script mantiene sempre la versione dei conflitti

## Requisiti
- Bash shell
- Comandi standard Unix (find, sed, grep)

## Limitazioni
- Non gestisce conflitti complessi che potrebbero richiedere merge manuale
- Mantiene sempre la versione HEAD, che potrebbe non essere sempre la scelta desiderata

## Revisione Manuale
File aggiornato per chiarezza, eliminata duplicazione. Vedi anche [README globale](/docs/README.md) e [scripts_conflict_resolution.md](scripts_conflict_resolution.md).

[Backlink: Documentazione Globale](/docs/README.md)
[Backlink: scripts_conflict_resolution.md](scripts_conflict_resolution.md)
[Backlink: git_conflicts_resolution.md](git_conflicts_resolution.md)

>>>>>>> e0c964a3 (first)
>>>>>>> 3c18aa7e (.)
>>>>>>> ec52a6b4 (.)
>>>>>>> 71ff9e32 (.)
>>>>>>> ec52a6b4 (.)
>>>>>>> e0c964a3 (first)
## Casi d'Uso Avanzati

### 1. Risoluzione Selettiva
È possibile modificare lo script per risolvere selettivamente solo determinati tipi di file:

>>>>>>> ec52a6b4 (.)
>>>>>>> 71ff9e32 (.)
>>>>>>> ec52a6b4 (.)
>>>>>>> e0c964a3 (first)
### 2. Integrazione con Git Hooks
Lo script può essere integrato con Git hooks per verificare automaticamente la presenza di conflitti prima del commit:

```bash
>>>>>>> e0c964a3 (first)

>>>>>>> 9c02579 (.)
>>>>>>> 1420e3b683 (.)
>>>>>>> 574afe9e (.)
>>>>>>> ec52a6b4 (.)
>>>>>>> 71ff9e32 (.)
>>>>>>> ec52a6b4 (.)
>>>>>>> e0c964a3 (first)
# .git/hooks/pre-commit
#!/bin/bash
```

### 3. Verifica Post-Risoluzione
Dopo l'esecuzione dello script, è consigliabile verificare che tutti i conflitti siano stati risolti correttamente:


## Best Practices

1. **Sempre Ispezionare**: Anche se lo script automatizza la risoluzione, è fondamentale ispezionare manualmente i file modificati.

2. **Utilizzare con Cautela**: Lo script è adatto per progetti personali o per risoluzioni rapide, ma per codice critico è preferibile la risoluzione manuale.

3. **Backup Aggiuntivi**: Prima di eseguire lo script su larga scala, considerare un backup completo del repository.

4. **Conflitti in File Markdown**: Per i file di documentazione (.md), spesso è preferibile mantenere entrambe le versioni invece di scegliere automaticamente la versione HEAD.

5. **Test Post-Risoluzione**: Dopo la risoluzione automatica, eseguire test per verificare che il codice funzioni ancora correttamente.

## Collegamenti Bidirezionali
- [Gestione Conflitti Git](/var/www/html/_bases/base_ptvx_fila3_mono/bashscripts/docs/git_conflicts_resolution.md)
- [Script di Automazione](/var/www/html/_bases/base_ptvx_fila3_mono/bashscripts/docs/scripts.md)
- [Conflitti nei File di Configurazione](/var/www/html/_bases/base_ptvx_fila3_mono/bashscripts/docs/config_file_conflicts.md)
- [Risoluzione Conflitti nei Moduli](/var/www/html/_bases/base_ptvx_fila3_mono/laravel/Modules/Xot/docs/conflitti_merge_risolti.md)
