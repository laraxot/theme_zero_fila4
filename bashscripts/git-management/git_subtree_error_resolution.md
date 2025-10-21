# 🚀 Gestione Errori Git Subtree

## 📋 Struttura del Sistema
<<<<<<< HEAD
Il sistema di gestione dei subtree è composto da tre componenti principali:
1. `git_sync_subtree.sh` - Script principale di sincronizzazione
2. `git_push_subtree.sh` - Gestore delle operazioni di push
3. `git_pull_subtree.sh` - Gestore delle operazioni di pull
## 🔄 Flusso Operativo
=======

Il sistema di gestione dei subtree è composto da tre componenti principali:

1. `git_sync_subtree.sh` - Script principale di sincronizzazione
2. `git_push_subtree.sh` - Gestore delle operazioni di push
3. `git_pull_subtree.sh` - Gestore delle operazioni di pull

## 🔄 Flusso Operativo

>>>>>>> ef8dc24 (.)
### 1. Script Principale (`git_sync_subtree.sh`)
- **Input**: `<path>` e `<remote_repo>`
- **Preparazione**:
  - Normalizzazione CRLF
  - Impostazione permessi
- **Sequenza**:
  1. Push subtree
  2. Pull subtree
<<<<<<< HEAD
=======

>>>>>>> ef8dc24 (.)
### 2. Push Script (`git_push_subtree.sh`)
Esegue una sequenza complessa di operazioni:
```bash
1. git add -A && git commit -am "."
2. git push -u origin $REMOTE_BRANCH
3. git subtree push -P $LOCAL_PATH $REMOTE_REPO $REMOTE_BRANCH
4. git push -f $REMOTE_REPO $(git subtree split --prefix=$LOCAL_PATH):$REMOTE_BRANCH
5. git subtree split --prefix=$LOCAL_PATH -b $TEMP_BRANCH
6. git push -f $REMOTE_REPO $TEMP_BRANCH:$REMOTE_BRANCH
7. git branch -D $TEMP_BRANCH
8. git subtree push -P $LOCAL_PATH $REMOTE_REPO $REMOTE_BRANCH
9. git rebase --rebase-merges --strategy subtree $REMOTE_BRANCH
```
<<<<<<< HEAD
### 3. Pull Script (`git_pull_subtree.sh`)
Esegue una sequenza con fallback:
=======

### 3. Pull Script (`git_pull_subtree.sh`)
Esegue una sequenza con fallback:
```bash
>>>>>>> ef8dc24 (.)
1. git subtree pull -P $LOCAL_PATH $REMOTE_REPO $REMOTE_BRANCH --squash
2. Se fallisce, prova: git subtree pull -P $LOCAL_PATH $REMOTE_REPO $REMOTE_BRANCH
3. Se fallisce ancora:
   - git fetch $REMOTE_REPO $REMOTE_BRANCH --depth=1
   - git merge -s subtree FETCH_HEAD --allow-unrelated-histories
4. git rebase --rebase-merges --strategy subtree $REMOTE_BRANCH
<<<<<<< HEAD
## 🚨 Analisi Errori Comuni
### 1. Errore: Prefix Mancante
fatal: you must provide the --prefix option
**Causa**: Variabili `LOCAL_PATH` o `REMOTE_REPO` non definite
**Soluzione**:
=======
```

## 🚨 Analisi Errori Comuni

### 1. Errore: Prefix Mancante
```
fatal: you must provide the --prefix option
```

**Causa**: Variabili `LOCAL_PATH` o `REMOTE_REPO` non definite

**Soluzione**:
```bash

>>>>>>> e0c964a3 (first)
>>>>>>> 3c18aa7e (.)
>>>>>>> ec52a6b4 (.)
>>>>>>> 71ff9e32 (.)
>>>>>>> ec52a6b4 (.)
>>>>>>> e0c964a3 (first)
>>>>>>> ef8dc24 (.)
# Verifica variabili
if [ -z "$LOCAL_PATH" ] || [ -z "$REMOTE_REPO" ]; then
    echo "❌ Error: Missing required variables"
    exit 1
fi
<<<<<<< HEAD
### 2. Errore: Push Rejected
! [rejected] dev -> dev (non-fast-forward)
**Causa**: Questo errore si verifica nella sequenza di push quando ci sono divergenze tra il repository locale e remoto.
1. Prima del push, assicurarsi che il repository locale sia aggiornato:
git fetch origin $REMOTE_BRANCH
git merge origin/$REMOTE_BRANCH --allow-unrelated-histories
2. Modificare la sequenza di push per gestire meglio i conflitti:
if ! git push -u origin "$REMOTE_BRANCH"; then
    git pull --rebase origin "$REMOTE_BRANCH"
    git push -u origin "$REMOTE_BRANCH"
## Best Practices per l'Uso
=======
```

### 2. Errore: Push Rejected
```
! [rejected] dev -> dev (non-fast-forward)
```

**Causa**: Questo errore si verifica nella sequenza di push quando ci sono divergenze tra il repository locale e remoto.

**Soluzione**:
1. Prima del push, assicurarsi che il repository locale sia aggiornato:
```bash
git fetch origin $REMOTE_BRANCH
git merge origin/$REMOTE_BRANCH --allow-unrelated-histories
```

2. Modificare la sequenza di push per gestire meglio i conflitti:
```bash
if ! git push -u origin "$REMOTE_BRANCH"; then
    git pull --rebase origin "$REMOTE_BRANCH"
    git push -u origin "$REMOTE_BRANCH"
fi
```

## Best Practices per l'Uso

>>>>>>> ef8dc24 (.)
1. **Prima dell'Esecuzione**:
   - Committare o stashare modifiche pendenti
   - Assicurarsi di essere sul branch corretto
   - Verificare lo stato del repository remoto
<<<<<<< HEAD
2. **Durante l'Esecuzione**:
   - Monitorare l'output per errori specifici
   - Non interrompere gli script durante l'esecuzione
=======

2. **Durante l'Esecuzione**:
   - Monitorare l'output per errori specifici
   - Non interrompere gli script durante l'esecuzione

>>>>>>> ef8dc24 (.)
3. **Dopo l'Esecuzione**:
   - Verificare lo stato del subtree
   - Controllare la storia dei commit
   - Verificare la sincronizzazione con il remote
<<<<<<< HEAD
## Note sulla Manutenzione
=======

## Note sulla Manutenzione

>>>>>>> ef8dc24 (.)
1. Gli script utilizzano una strategia aggressiva con `--force` push in alcuni casi
2. Il rebase viene utilizzato per mantenere una storia pulita
3. Sono implementati meccanismi di fallback per il pull
4. La gestione degli errori potrebbe essere migliorata con più logging
<<<<<<< HEAD
## Suggerimenti per il Debugging
=======

## Suggerimenti per il Debugging

>>>>>>> ef8dc24 (.)
1. Aggiungere `set -x` all'inizio degli script per debug verbose
2. Implementare logging più dettagliato
3. Verificare i permessi degli script
