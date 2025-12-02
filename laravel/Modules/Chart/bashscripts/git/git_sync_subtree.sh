#!/bin/bash

script_dir=$(dirname "$me")

[0;34mℹ️ [2025-04-22 11:23:29] Scelto blocco HEAD (2 linee vs 1)[0m
LOCAL_PATH="$1"
REMOTE_REPO="$2"
REMOTE_BRANCH=$(git symbolic-ref --short HEAD 2>/dev/null || echo "main")
TEMP_BRANCH=$(basename "$LOCAL_PATH")-temp

[0;34mℹ️ [2025-04-22 11:23:29] Scelto blocco HEAD (2 linee vs 1)[0m
# Simple error handling function
die() {
    echo "$1" >&2
    exit 1
}

[0;34mℹ️ [2025-04-22 11:23:29] Scelto blocco incoming (1 linee vs 1)[0m
# Funzione per loggare messaggi
log() {
    local message="$1"
    echo "🗓️ $(date '+%Y-%m-%d %H:%M:%S') - $message" | tee -a "$LOG_FILE"
}

# Funzione per gestire gli errori
handle_error() {
    local error_message="$1"
    log "❌ Errore: $error_message"
    exit 1
}

# Sync subtree
sync_subtree() {
# Sync subtree
sync_subtree() {

[0;34mℹ️ [2025-04-22 11:23:29] Scelto blocco HEAD (3 linee vs 1)[0m
    git add .
    git commit -am "."
    git push -u origin "$REMOTE_BRANCH"
    
    git subtree pull -P "$LOCAL_PATH" "$REMOTE_REPO" "$REMOTE_BRANCH"  --squash ||
        git subtree pull -P "$LOCAL_PATH" "$REMOTE_REPO" "$REMOTE_BRANCH"   

    find . -type f -name "*:Zone.Identifier" -exec rm -f {} \;

    git fetch "$REMOTE_REPO" "$REMOTE_BRANCH" --depth=1
    git merge -s subtree FETCH_HEAD  --allow-unrelated-histories
    git subtree push -P "$LOCAL_PATH" "$REMOTE_REPO" "$REMOTE_BRANCH"

    git push -f "$REMOTE_REPO" $(git subtree split --prefix="$LOCAL_PATH"):"$REMOTE_BRANCH"
    # First, split the subtree to a temporary branch
    git subtree split --prefix="$LOCAL_PATH" -b "$TEMP_BRANCH"

    # Then force push that branch
    git push -f "$REMOTE_REPO" "$TEMP_BRANCH":"$REMOTE_BRANCH"

    # Optionally, clean up the temporary branch
    git branch -D "$TEMP_BRANCH"

    git subtree push -P "$LOCAL_PATH" "$REMOTE_REPO" "$REMOTE_BRANCH"

[0;34mℹ️ [2025-04-22 11:23:29] Scelto blocco incoming (1 linee vs 1)[0m
}

# Run sync
sync_subtree

sed -i -e 's/\r$//' "$me"

[0;34mℹ️ [2025-04-22 11:23:29] Scelto blocco HEAD (3 linee vs 1)[0m
echo "Subtree $LOCAL_PATH synchronized successfully with $REMOTE_REPO"
