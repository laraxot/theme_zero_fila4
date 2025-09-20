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
### 2. Push Script (`git_push_subtree.sh`)
```bash
# 1. Inizializzazione
git init
git checkout -b "$BRANCH"
# 2. Configurazione remoto
git remote add origin "$REMOTE_REPO"
git fetch --all
=======

### 2. Push Script (`git_push_subtree.sh`)

```bash

>>>>>>> e0c964a3 (first)
>>>>>>> 3c18aa7e (.)
>>>>>>> ec52a6b4 (.)
>>>>>>> 71ff9e32 (.)
>>>>>>> ec52a6b4 (.)
>>>>>>> e0c964a3 (first)
# 1. Inizializzazione
git init
git checkout -b "$BRANCH"

# 2. Configurazione remoto
git remote add origin "$REMOTE_REPO"
git fetch --all

>>>>>>> ef8dc24 (.)
# 3. Commit e push
git add -A
git commit -am "🔧 Aggiornamento subtree"
git merge origin/"$BRANCH" --allow-unrelated-histories"
git push -u origin "$BRANCH"
```
<<<<<<< HEAD
### 3. Pull Script (`git_pull_subtree.sh`)
# 1. Pull standard
git subtree pull -P "$LOCAL_PATH" "$REMOTE_REPO" "$BRANCH" --squash
# 2. Fallback 1
git subtree pull -P "$LOCAL_PATH" "$REMOTE_REPO" "$BRANCH"
# 3. Fallback 2
git fetch "$REMOTE_REPO" "$BRANCH" --depth=1
git merge -s subtree FETCH_HEAD --allow-unrelated-histories
Esegue una sequenza complessa di operazioni:
=======

### 3. Pull Script (`git_pull_subtree.sh`)
```bash

>>>>>>> e0c964a3 (first)
>>>>>>> 3c18aa7e (.)
>>>>>>> ec52a6b4 (.)
>>>>>>> 71ff9e32 (.)
>>>>>>> ec52a6b4 (.)
>>>>>>> e0c964a3 (first)
# 1. Pull standard
git subtree pull -P "$LOCAL_PATH" "$REMOTE_REPO" "$BRANCH" --squash

# 2. Fallback 1
git subtree pull -P "$LOCAL_PATH" "$REMOTE_REPO" "$BRANCH"

# 3. Fallback 2
git fetch "$REMOTE_REPO" "$BRANCH" --depth=1
git merge -s subtree FETCH_HEAD --allow-unrelated-histories
```

Esegue una sequenza complessa di operazioni:
```bash
>>>>>>> ef8dc24 (.)
1. git add -A && git commit -am "."
2. git push -u origin $REMOTE_BRANCH
3. git subtree push -P $LOCAL_PATH $REMOTE_REPO $REMOTE_BRANCH
4. git push -f $REMOTE_REPO $(git subtree split --prefix=$LOCAL_PATH):$REMOTE_BRANCH
5. git subtree split --prefix=$LOCAL_PATH -b $TEMP_BRANCH
6. git push -f $REMOTE_REPO $TEMP_BRANCH:$REMOTE_BRANCH
7. git branch -D $TEMP_BRANCH
8. git subtree push -P $LOCAL_PATH $REMOTE_REPO $REMOTE_BRANCH
9. git rebase --rebase-merges --strategy subtree $REMOTE_BRANCH
<<<<<<< HEAD
Esegue una sequenza con fallback:
=======
```

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
**Causa**: Divergenze tra repository locale e remoto
# Aggiorna repository locale
git fetch origin "$BRANCH"
=======
```

### 2. Errore: Push Rejected
```
! [rejected] dev -> dev (non-fast-forward)
```

**Causa**: Divergenze tra repository locale e remoto

**Soluzione**:
```bash

>>>>>>> e0c964a3 (first)
>>>>>>> 3c18aa7e (.)
>>>>>>> ec52a6b4 (.)
>>>>>>> 71ff9e32 (.)
>>>>>>> ec52a6b4 (.)
>>>>>>> e0c964a3 (first)
# Aggiorna repository locale
git fetch origin "$BRANCH"
git merge origin/"$BRANCH" --allow-unrelated-histories"

>>>>>>> ef8dc24 (.)
# Riprova push
if ! git push -u origin "$BRANCH"; then
    git pull --rebase origin "$BRANCH"
    git push -u origin "$BRANCH"
<<<<<<< HEAD
## 🛠️ Best Practices
=======
fi
```

## 🛠️ Best Practices

>>>>>>> ef8dc24 (.)
### 1. Prima dell'Esecuzione
- ✔️ Commit/stash delle modifiche pendenti
- ✔️ Verifica branch corrente
- ✔️ Controllo stato repository
<<<<<<< HEAD
=======

>>>>>>> ef8dc24 (.)
### 2. Durante l'Esecuzione
- 👀 Monitora l'output
- ⏳ Non interrompere gli script
- 📝 Controlla i log
<<<<<<< HEAD
=======

>>>>>>> ef8dc24 (.)
### 3. Dopo l'Esecuzione
- 🔍 Verifica stato subtree
- 📊 Controlla storia commit
- 🔄 Verifica sincronizzazione
<<<<<<< HEAD
## 📝 Note sulla Manutenzione
=======

## 📝 Note sulla Manutenzione

>>>>>>> ef8dc24 (.)
1. **Strategia Push**:
   - Utilizzo di `--force` push in casi specifici
   - Rebase per storia pulita
   - Meccanismi di fallback per pull
<<<<<<< HEAD
=======

>>>>>>> ef8dc24 (.)
2. **Gestione Errori**:
   - Logging dettagliato
   - Verifica permessi
   - Controlli pre-esecuzione
<<<<<<< HEAD
## 🔍 Suggerimenti per il Debugging
=======

## 🔍 Suggerimenti per il Debugging

>>>>>>> ef8dc24 (.)
1. **Debug Verbose**:
   ```bash
   set -x  # Attiva debug verbose
   ```
<<<<<<< HEAD
2. **Logging Dettagliato**:
   log() {
       echo "[$(date +'%Y-%m-%d %H:%M:%S')] $1"
   }
3. **Verifica Permessi**:
   chmod +x *.sh
## 📚 Documentazione Aggiuntiva
- [Git Subtree Documentation](https://git-scm.com/book/en/v2/Git-Tools-Advanced-Merging)
- [Git Subtree Tutorial](https://www.atlassian.com/git/tutorials/git-subtree)
- [Git Subtree vs Submodule](https://git-scm.com/book/en/v2/Git-Tools-Submodules)
---
=======

2. **Logging Dettagliato**:
   ```bash
   log() {
       echo "[$(date +'%Y-%m-%d %H:%M:%S')] $1"
   }
   ```

3. **Verifica Permessi**:
   ```bash
   chmod +x *.sh
   ```

## 📚 Documentazione Aggiuntiva

- [Git Subtree Documentation](https://git-scm.com/book/en/v2/Git-Tools-Advanced-Merging)
- [Git Subtree Tutorial](https://www.atlassian.com/git/tutorials/git-subtree)
- [Git Subtree vs Submodule](https://git-scm.com/book/en/v2/Git-Tools-Submodules)

---

>>>>>>> ef8dc24 (.)
<div align="center">
  <sub>Built with ❤️ by the development team</sub>
</div>
