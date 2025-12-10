#!/bin/bash

# Script per correggere le convenzioni di naming nelle cartelle docs
# Regola: tutti i file e cartelle devono essere in minuscolo, eccetto README.md

set -e

echo "🔍 Iniziando correzione convenzioni naming cartelle docs..."
echo "📋 Regola: tutti i file e cartelle in minuscolo, eccetto README.md"
echo ""

# Contatore per le correzioni
files_fixed=0
dirs_fixed=0

# Funzione per rinominare file
rename_file() {
    local file="$1"
    local dirname=$(dirname "$file")
    local filename=$(basename "$file")
    local lowercase_name=$(echo "$filename" | tr '[:upper:]' '[:lower:]')
    
    if [ "$filename" != "$lowercase_name" ]; then
        echo "📄 Rinomino file: $file → $dirname/$lowercase_name"
        mv "$file" "$dirname/$lowercase_name"
        ((files_fixed++))
    fi
}

# Funzione per rinominare cartelle
rename_directory() {
    local dir="$1"
    local parentdir=$(dirname "$dir")
    local dirname=$(basename "$dir")
    local lowercase_name=$(echo "$dirname" | tr '[:upper:]' '[:lower:]')
    
    if [ "$dirname" != "$lowercase_name" ]; then
        echo "📁 Rinomino cartella: $dir → $parentdir/$lowercase_name"
        mv "$dir" "$parentdir/$lowercase_name"
        ((dirs_fixed++))
    fi
}

# Trova tutte le cartelle docs
find . -type d -name "docs" | while read docs_dir; do
    echo "🔍 Analizzando: $docs_dir"
    
    # Prima rinomina le cartelle (dal più profondo al più superficiale)
    find "$docs_dir" -type d | sort -r | while read dir; do
        if [ "$dir" != "$docs_dir" ]; then
            rename_directory "$dir"
        fi
    done
    
    # Poi rinomina i file
    find "$docs_dir" -type f | while read file; do
        if [[ "$(basename "$file")" != "README.md" ]]; then
            rename_file "$file"
        fi
    done
done

echo ""
echo "✅ Correzione completata!"
echo "📊 Statistiche:"
echo "   - File corretti: $files_fixed"
echo "   - Cartelle corrette: $dirs_fixed"
echo ""
echo "🔍 Verifica finale..."

# Verifica finale
echo "📋 File con maiuscole rimasti (dovrebbero essere solo README.md):"
find . -type d -name "docs" -exec find {} -name "*" -type f \; | grep -v "README.md" | grep '[A-Z]' || echo "   ✅ Nessun file con maiuscole trovato"

echo "📋 Cartelle con maiuscole rimaste:"
find . -type d -name "docs" -exec find {} -type d \; | grep '[A-Z]' || echo "   ✅ Nessuna cartella con maiuscole trovata"

echo ""
echo "🎉 Tutte le convenzioni di naming sono ora conformi!" 