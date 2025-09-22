#!/bin/bash

# Script per avviare il server MCP MySQL personalizzato con le configurazioni dal file .env di Laravel

PROJECT_DIR="/var/www/_bases/base_quaeris_fila4_mono"
LOGS_DIR="$PROJECT_DIR/storage/logs/mcp"
CONNECTOR_SCRIPT="$PROJECT_DIR/bashscripts/mcp/mysql-db-connector.js"

# Crea la directory dei log se non esiste
mkdir -p "$LOGS_DIR"
chmod -R 0777 "$LOGS_DIR"

# Verifica se il connector script esiste
if [ ! -f "$CONNECTOR_SCRIPT" ]; then
    echo "❌ Script connector MySQL non trovato: $CONNECTOR_SCRIPT"
    exit 1
fi

# Verifica se il server è già in esecuzione
pid=$(ps aux | grep "mysql-db-connector.js" | grep -v grep | awk '{print $2}')
if [ -n "$pid" ]; then
    echo "⚠️ Il server MCP MySQL personalizzato è già in esecuzione con PID $pid"
    echo "   Arresto del server in corso..."
    kill -9 "$pid" 2>/dev/null
    sleep 2
fi

echo "🚀 Avvio del server MCP MySQL personalizzato..."

# Imposta dimensioni terminale per evitare warning in ambienti non interattivi
export COLUMNS=80
export LINES=24

# Avvia il connector
cd "$PROJECT_DIR" && node "$CONNECTOR_SCRIPT" > "$LOGS_DIR/mysql.log" 2>&1 &

# Attendi un attimo l'avvio
sleep 3

# Verifica stato
pid=$(ps aux | grep "mysql-db-connector.js" | grep -v grep | awk '{print $2}')
if [ -n "$pid" ]; then
    echo "✅ Server MCP MySQL personalizzato avviato con PID $pid"
    echo "   Log: $LOGS_DIR/mysql.log"
else
    echo "❌ Errore nell'avvio del server MCP MySQL personalizzato"
    echo "📋 Ultimi log:"
    tail -n 20 "$LOGS_DIR/mysql.log" || true
    exit 1
fi
