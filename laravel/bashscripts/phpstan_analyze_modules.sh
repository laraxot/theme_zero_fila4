#!/bin/bash

# Colori per il terminale
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[0;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# Directory dei moduli
MODULES_DIR="Modules"
DOCS_MAIN_DIR="docs"

# Verifica presenza di jq (necessario per elaborazione JSON)
if ! command -v jq &> /dev/null; then
    echo -e "${RED}Errore: jq non è installato. È necessario per elaborare i file JSON.${NC}"
    echo -e "${YELLOW}Installa jq con: apt-get install jq${NC}"
    exit 1
fi

# Controlla se la directory dei moduli esiste
if [ ! -d "$MODULES_DIR" ]; then
    echo -e "${RED}Errore: La directory $MODULES_DIR non esiste${NC}"
    exit 1
fi

# Crea directory principale per la documentazione se non esiste
mkdir -p "$DOCS_MAIN_DIR/phpstan"

# Trova tutti i moduli
MODULES=$(find "$MODULES_DIR" -maxdepth 1 -type d -not -path "$MODULES_DIR" -exec basename {} \;)

if [ -z "$MODULES" ]; then
    echo -e "${RED}Errore: Nessun modulo trovato in $MODULES_DIR${NC}"
    exit 1
fi

echo -e "${BLUE}Iniziando l'analisi PHPStan per tutti i moduli${NC}"
echo -e "${YELLOW}Moduli trovati: ${NC}$MODULES"
echo ""

# Crea il file index per la documentazione principale
MAIN_INDEX="$DOCS_MAIN_DIR/phpstan/index.md"
echo "# Analisi PHPStan del progetto" > "$MAIN_INDEX"
echo "" >> "$MAIN_INDEX"
echo "Eseguito il $(date)" >> "$MAIN_INDEX"
echo "" >> "$MAIN_INDEX"
echo "## Moduli analizzati" >> "$MAIN_INDEX"
echo "" >> "$MAIN_INDEX"

# Per ogni modulo, esegui PHPStan per i livelli da 1 a 10
for MODULE in $MODULES; do
    echo -e "${BLUE}========== Analisi del modulo $MODULE ==========${NC}"

    # Crea directory per i report se non esiste
    DOCS_DIR="$MODULES_DIR/$MODULE/docs/phpstan"
    mkdir -p "$DOCS_DIR"

    # Aggiungi il modulo all'indice principale
    echo "- [$MODULE](./$MODULE.md)" >> "$MAIN_INDEX"

    # Crea file indice del modulo nella documentazione principale
    MODULE_INDEX="$DOCS_MAIN_DIR/phpstan/$MODULE.md"
    echo "# Analisi PHPStan del modulo $MODULE" > "$MODULE_INDEX"
    echo "" >> "$MODULE_INDEX"
    echo "Eseguito il $(date)" >> "$MODULE_INDEX"
    echo "" >> "$MODULE_INDEX"
    echo "## Livelli analizzati" >> "$MODULE_INDEX"
    echo "" >> "$MODULE_INDEX"

    # Crea file indice locale del modulo
    LOCAL_INDEX="$DOCS_DIR/index.md"
    echo "# Analisi PHPStan del modulo $MODULE" > "$LOCAL_INDEX"
    echo "" >> "$LOCAL_INDEX"
    echo "Eseguito il $(date)" >> "$LOCAL_INDEX"
    echo "" >> "$LOCAL_INDEX"
    echo "[Torna all'indice principale](../../../../docs/phpstan/index.md)" >> "$LOCAL_INDEX"
    echo "" >> "$LOCAL_INDEX"
    echo "## Livelli analizzati" >> "$LOCAL_INDEX"
    echo "" >> "$LOCAL_INDEX"

    # Analizza la configurazione del modulo
    if [ -f "$MODULES_DIR/$MODULE/composer.json" ]; then
        echo -e "${YELLOW}Analisi della configurazione del modulo $MODULE${NC}"
        echo "## Configurazione del modulo" >> "$MODULE_INDEX"
        echo "" >> "$MODULE_INDEX"

        # Estrai namespace e altre informazioni rilevanti
        if command -v jq &> /dev/null; then
            NAMESPACE=$(jq -r '.autoload."psr-4" | keys[0]' "$MODULES_DIR/$MODULE/composer.json" 2>/dev/null | sed 's/\\\\$//')
            echo "- Namespace: \`$NAMESPACE\`" >> "$MODULE_INDEX"

            DEPENDENCIES=$(jq -r '.require | keys | join(", ")' "$MODULES_DIR/$MODULE/composer.json" 2>/dev/null)
            echo "- Dipendenze: $DEPENDENCIES" >> "$MODULE_INDEX"

            echo "" >> "$MODULE_INDEX"
        else
            echo "Impossibile analizzare composer.json senza jq installato." >> "$MODULE_INDEX"
            echo "" >> "$MODULE_INDEX"
        fi
    fi

    # Per ogni livello da 1 a 10
    for LEVEL in {1..10}; do
        echo -e "${YELLOW}Esecuzione di PHPStan sul modulo $MODULE al livello $LEVEL${NC}"

        # Percorso del file JSON
        JSON_FILE="$DOCS_DIR/level_${LEVEL}.json"

        # Percorso del file Markdown
        MD_FILE="$DOCS_DIR/level_${LEVEL}.md"

        # Aggiungi link al livello negli indici
        echo "- [Livello $LEVEL](level_${LEVEL}.md)" >> "$LOCAL_INDEX"
        echo "- [Livello $LEVEL](../../$MODULES_DIR/$MODULE/docs/phpstan/level_${LEVEL}.md)" >> "$MODULE_INDEX"

        # Esegui PHPStan e salva output in JSON
        ./vendor/bin/phpstan analyse "$MODULES_DIR/$MODULE" -l"$LEVEL" --error-format=json > "$JSON_FILE" || true

        # Crea file Markdown
        echo "# Analisi PHPStan del modulo $MODULE - Livello $LEVEL" > "$MD_FILE"
        echo "" >> "$MD_FILE"
        echo "Eseguito il $(date)" >> "$MD_FILE"
        echo "" >> "$MD_FILE"
        echo "[Torna all'indice del modulo](./index.md) | [Torna all'indice principale](../../../../docs/phpstan/index.md)" >> "$MD_FILE"
        echo "" >> "$MD_FILE"

        # Controlla se ci sono errori nel file JSON
        if [ -s "$JSON_FILE" ] && grep -q "errors" "$JSON_FILE"; then
            echo -e "${YELLOW}Trovati errori per il modulo $MODULE al livello $LEVEL${NC}"
            echo "## Errori rilevati" >> "$MD_FILE"
            echo "" >> "$MD_FILE"
            echo "```" >> "$MD_FILE"
            jq -r '.files | to_entries[] | .key + ":\n" + (.value | map("- Linea " + (.line|tostring) + ": " + .message) | join("\n"))' "$JSON_FILE" >> "$MD_FILE" 2>/dev/null || echo "Errore durante il parsing del JSON" >> "$MD_FILE"
            echo "```" >> "$MD_FILE"

            # Aggiungi una sezione per ogni file con errori
            echo "" >> "$MD_FILE"
            echo "## Analisi e soluzioni proposte" >> "$MD_FILE"
            echo "" >> "$MD_FILE"

            # Estrai i file con errori
            FILES_WITH_ERRORS=$(jq -r '.files | keys[]' "$JSON_FILE" 2>/dev/null)
            for FILE in $FILES_WITH_ERRORS; do
                echo "### File: $FILE" >> "$MD_FILE"
                echo "" >> "$MD_FILE"
                echo "#### Errori:" >> "$MD_FILE"
                echo "" >> "$MD_FILE"
                jq -r ".files[\"$FILE\"] | map(\"- Linea \" + (.line|tostring) + \": \" + .message) | join(\"\n\")" "$JSON_FILE" >> "$MD_FILE" 2>/dev/null
                echo "" >> "$MD_FILE"
                echo "#### Soluzione proposta:" >> "$MD_FILE"
                echo "" >> "$MD_FILE"
                echo "<!-- Inserire qui la soluzione proposta per questo file -->" >> "$MD_FILE"
                echo "" >> "$MD_FILE"
            done
        else
            echo -e "${GREEN}Nessun errore trovato per il modulo $MODULE al livello $LEVEL${NC}"
            echo "## Errori rilevati" >> "$MD_FILE"
            echo "" >> "$MD_FILE"
            echo "Nessun errore rilevato in questo livello." >> "$MD_FILE"
        fi

        echo "" >> "$MD_FILE"
        echo "## Errori risolti" >> "$MD_FILE"
        echo "" >> "$MD_FILE"
        echo "<!-- Inserire qui gli errori risolti con le relative soluzioni -->" >> "$MD_FILE"
        echo "" >> "$MD_FILE"
        echo "## Impatto architetturale" >> "$MD_FILE"
        echo "" >> "$MD_FILE"
        echo "<!-- Descrivere l'impatto architetturale delle soluzioni proposte -->" >> "$MD_FILE"

        echo -e "${GREEN}Report per il livello $LEVEL del modulo $MODULE completato${NC}"
    done

    echo -e "${GREEN}Analisi completata per il modulo $MODULE${NC}"
    echo ""
done

echo -e "${GREEN}Analisi PHPStan completata per tutti i moduli!${NC}"
echo -e "${BLUE}I report sono disponibili nelle rispettive cartelle docs/phpstan di ogni modulo${NC}"
echo -e "${BLUE}L'indice principale dei report è disponibile in $DOCS_MAIN_DIR/phpstan/index.md${NC}"