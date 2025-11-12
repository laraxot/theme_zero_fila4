#!/bin/bash

source ./bashscripts/lib/custom.sh
# Includi lo script di parsing
source ./bashscripts/lib/parse_gitmodules_ini.sh

# Validate input
#if [ $# -ne 1 ]; then
#    echo "Usage: $0 <org>"
    #echo "Esempio: $0 laraxot"
    #exit 1
#fi

# Chiama la funzione
parse_gitmodules gitmodules.ini

me=$( readlink -f -- "$0")
script_dir=$(dirname "$me")
ORG="$1"
curr_dir=$(pwd)

# Esegui backup se richiesto
backup_disk

# Configurazione git
git_config_setup

total=${submodules_array["total"]}
for ((i=0; i<total; i++)); do
    path=${submodules_array["path_${i}"]}
    url=${submodules_array["url_${i}"]}
    origin="origin"
    if [ -n "$ORG" ]; then
        url=$(rewrite_url "$url" "$ORG")
        origin="$ORG"
    fi
    # Verifica se l'URL è già presente come remote
    #if ! git remote -v | grep -q "$url"; then
    #    echo "Aggiungendo remote per $path..."
    #    git remote add "$ORG" "$url"
    #fi
    echo "Submodule $i: 📂 path: $path 🌐 URL: $url 🔑 ORG: $origin"
    cd "$path"
    
    # Controllo se .git è un file e non una directory
    if [ -f ".git" ]; then
        echo "Trovato .git come file in $path, lo elimino..."
        rm -f .git
    fi
    
    # Verifica se .git esiste prima di inizializzare
    if [ ! -d ".git" ]; then
        echo "Inizializzazione repository Git in $path..."
        git init
    else
        echo "Repository Git già inizializzato in $path"
    fi
    echo "🌐 URL: $url"
    git config --global --add safe.directory "$curr_dir/$path"
    git checkout "$BRANCH" -- || git checkout -b "$BRANCH"
    git remote add "$origin" "$url"
    git_config_setup
    #git stash || echo "🔄 Non ci sono modifiche da salvare"
    dummy_push "$origin" "$BRANCH" "."
    
    git fetch --unshallow
    git fetch "$origin" "$BRANCH" --depth=1
    git pull "$origin" "$BRANCH" --autostash  --depth=1
    git merge "$origin/$BRANCH" --allow-unrelated-histories

    # Loop per gestire eventuali conflitti
    while ! git rebase --continue 2>/dev/null; do
        if git diff --name-only --diff-filter=U | grep .; then
            echo "⚠️  Conflitti trovati. Li sistemiamo in automatico (accettando i tuoi cambiamenti)..."
        else
            echo "✅ Nessun conflitto o già risolto"
            break
        fi
        dummy_push "$origin" "$BRANCH" "."
    done
    #git stash apply || echo "🔄 Non ci sono modifiche da ripristinare"
    # Push finale
    dummy_push "$origin" "$BRANCH" "."

    cd "$curr_dir"
done
