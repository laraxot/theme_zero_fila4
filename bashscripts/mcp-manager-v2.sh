#!/bin/bash

# Script di gestione dei server MCP per base_predict_fila3_mono
# Versione 2.0 - Supporto per server MySQL personalizzato
# Autore: Cascade AI Assistant
# Data: 2025-05-13

PROJECT_DIR="/var/www/html/_bases/base_predict_fila3_mono"
LOGS_DIR="$PROJECT_DIR/storage/logs/mcp"
MYSQL_CONNECTOR="$PROJECT_DIR/scripts/mysql-db-connector.js"

# Crea la directory dei log se non esiste
mkdir -p "$LOGS_DIR"
chmod -R 777 "$LOGS_DIR"

# Funzione per mostrare l'aiuto
show_help() {
    echo "Utilizzo: /var/www/html/_bases/base_predict_fila3_mono/bashscripts/mcp/mcp-manager-v2.sh [comando] [server]"
    echo ""
    echo "Comandi disponibili:"
    echo "  start [server]    - Avvia uno o tutti i server MCP"
    echo "  stop [server]     - Ferma uno o tutti i server MCP"
    echo "  status [server]   - Mostra lo stato di uno o tutti i server MCP"
    echo "  restart [server]  - Riavvia uno o tutti i server MCP"
    echo "  logs [server]     - Mostra i log di uno o tutti i server MCP"
    echo "  install [server]  - Installa uno o tutti i server MCP"
    echo ""
    echo "Server disponibili:"
    echo "  sequential-thinking - Server per il pensiero sequenziale"
    echo "  memory             - Server per la memorizzazione di informazioni"
    echo "  fetch              - Server per le richieste HTTP"
    echo "  filesystem         - Server per le operazioni sul filesystem"
    echo "  postgres           - Server per database PostgreSQL"
    echo "  redis              - Server per Redis"
    echo "  puppeteer          - Server per l'automazione del browser"
    echo "  mysql              - Server personalizzato per MySQL (usa .env di Laravel)"
    echo "  all                - Tutti i server (default se non specificato)"
    echo ""
    echo "Esempi:"
    echo "  /var/www/html/_bases/base_predict_fila3_mono/bashscripts/mcp/mcp-manager-v2.sh start mysql    - Avvia il server MCP MySQL"
    echo "  /var/www/html/_bases/base_predict_fila3_mono/bashscripts/mcp/mcp-manager-v2.sh start          - Avvia tutti i server MCP"
    echo "  /var/www/html/_bases/base_predict_fila3_mono/bashscripts/mcp/mcp-manager-v2.sh status         - Mostra lo stato di tutti i server MCP"
}

# Funzione per ottenere il PID di un server MCP
get_pid() {
    local server_name=$1
    
    if [ "$server_name" = "mysql" ]; then
        ps aux | grep "MYSQL_DB_CONNECTOR_PID_MARKER" | grep -v grep | awk '{print $2}'
    else
        ps aux | grep "@modelcontextprotocol/server-$server_name" | grep -v grep | awk '{print $2}'
    fi
}

# Funzione per installare un server MCP
install_server() {
    local server_name=$1
    
    if [ "$server_name" = "mysql" ]; then
        echo "📦 Installazione delle dipendenze per il server MySQL personalizzato..."
        cd "$PROJECT_DIR" && npm install --save mysql2 dotenv
        
        if [ $? -eq 0 ]; then
            echo "✅ Dipendenze per il server MySQL personalizzato installate con successo"
            return 0
        else
            echo "❌ Errore nell'installazione delle dipendenze per il server MySQL personalizzato"
            return 1
        fi
    else
        echo "📦 Installazione del server MCP $server_name..."
        
        # Verifica se il server è già installato
        if npm list -g | grep -q "@modelcontextprotocol/server-$server_name"; then
            echo "✅ Server MCP $server_name è già installato globalmente"
        else
            echo "🔄 Installazione globale di @modelcontextprotocol/server-$server_name..."
            npm install -g @modelcontextprotocol/server-$server_name
            
            if [ $? -eq 0 ]; then
                echo "✅ Server MCP $server_name installato globalmente con successo"
            else
                echo "❌ Errore nell'installazione globale del server MCP $server_name"
                
                # Prova con installazione locale
                echo "🔄 Tentativo di installazione locale di @modelcontextprotocol/server-$server_name..."
                cd "$PROJECT_DIR" && npm install @modelcontextprotocol/server-$server_name
                
                if [ $? -eq 0 ]; then
                    echo "✅ Server MCP $server_name installato localmente con successo"
                else
                    echo "❌ Errore nell'installazione locale del server MCP $server_name"
                    return 1
                fi
            fi
        fi
    fi
    
    return 0
}

# Funzione per avviare un server MCP
start_server() {
    local server_name=$1
    local pid=$(get_pid "$server_name")
    
    if [ -n "$pid" ]; then
        echo "⚠️ Il server MCP $server_name è già in esecuzione con PID $pid"
        return 0
    fi
    
    # Gestione speciale per il server MySQL personalizzato
    if [ "$server_name" = "mysql" ]; then
        if [ ! -f "$MYSQL_CONNECTOR" ]; then
            echo "❌ Script connector MySQL non trovato: $MYSQL_CONNECTOR"
            return 1
        fi
        
        echo "🚀 Avvio del server MCP MySQL personalizzato..."
        cd "$PROJECT_DIR" && node "$MYSQL_CONNECTOR" > "$LOGS_DIR/mysql.log" 2>&1 &
    else
        # Verifica se il server è installato
        if ! npm list -g | grep -q "@modelcontextprotocol/server-$server_name" && ! npm list | grep -q "@modelcontextprotocol/server-$server_name"; then
            echo "⚠️ Server MCP $server_name non è installato. Installazione in corso..."
            install_server "$server_name"
        fi
        
        echo "🚀 Avvio del server MCP $server_name..."
        cd "$PROJECT_DIR" && npx -y @modelcontextprotocol/server-$server_name > "$LOGS_DIR/$server_name.log" 2>&1 &
    fi
    
    # Attendi che il server si avvii
    sleep 3
    
    pid=$(get_pid "$server_name")
    if [ -n "$pid" ]; then
        echo "✅ Server MCP $server_name avviato con PID $pid"
        return 0
    else
        echo "❌ Errore nell'avvio del server MCP $server_name"
        if [ "$server_name" = "mysql" ]; then
            echo "📋 Ultimi log:"
            tail -n 10 "$LOGS_DIR/mysql.log"
        else
            echo "📋 Ultimi log:"
            tail -n 10 "$LOGS_DIR/$server_name.log"
        fi
        return 1
    fi
}

# Funzione per fermare un server MCP
stop_server() {
    local server_name=$1
    local pid=$(get_pid "$server_name")
    
    if [ -z "$pid" ]; then
        echo "⚠️ Il server MCP $server_name non è in esecuzione"
        return 0
    fi
    
    echo "🛑 Arresto del server MCP $server_name con PID $pid..."
    kill -9 "$pid" 2>/dev/null
    sleep 2
    
    pid=$(get_pid "$server_name")
    if [ -z "$pid" ]; then
        echo "✅ Server MCP $server_name arrestato"
        return 0
    else
        echo "❌ Errore nell'arresto del server MCP $server_name"
        echo "⚠️ Tentativo di arresto forzato..."
        kill -9 "$pid" 2>/dev/null
        sleep 1
        
        pid=$(get_pid "$server_name")
        if [ -z "$pid" ]; then
            echo "✅ Server MCP $server_name arrestato forzatamente"
            return 0
        else
            echo "❌ Impossibile arrestare il server MCP $server_name"
            return 1
        fi
    fi
}

# Funzione per mostrare lo stato di un server MCP
status_server() {
    local server_name=$1
    local pid=$(get_pid "$server_name")
    
    if [ -n "$pid" ]; then
        echo "✅ Server MCP $server_name è in esecuzione con PID $pid"
        return 0
    else
        echo "❌ Server MCP $server_name non è in esecuzione"
        return 1
    fi
}

# Funzione per riavviare un server MCP
restart_server() {
    local server_name=$1
    echo "🔄 Riavvio del server MCP $server_name..."
    stop_server "$server_name"
    start_server "$server_name"
}

# Funzione per mostrare i log di un server MCP
logs_server() {
    local server_name=$1
    local log_file="$LOGS_DIR/$server_name.log"
    
    if [ -f "$log_file" ]; then
        echo "📋 Log del server MCP $server_name:"
        tail -n 50 "$log_file"
    else
        echo "❌ File di log per il server MCP $server_name non trovato"
        return 1
    fi
}

# Array di tutti i server MCP disponibili
ALL_SERVERS=("sequential-thinking" "memory" "fetch" "filesystem" "postgres" "redis" "puppeteer" "mysql")

# Funzione per eseguire un comando su tutti i server
all_servers() {
    local command=$1
    local success=0
    local total=0
    
    for server in "${ALL_SERVERS[@]}"; do
        ((total++))
        case "$command" in
            start)
                start_server "$server" && ((success++))
                ;;
            stop)
                stop_server "$server" && ((success++))
                ;;
            status)
                status_server "$server" && ((success++))
                ;;
            restart)
                restart_server "$server" && ((success++))
                ;;
            logs)
                logs_server "$server" && ((success++))
                ;;
            install)
                install_server "$server" && ((success++))
                ;;
        esac
    done
    
    echo ""
    echo "📊 Riepilogo: $success/$total server MCP gestiti con successo"
}

# Controllo dei parametri
if [ $# -eq 0 ]; then
    show_help
    exit 0
fi

COMMAND=$1
SERVER=${2:-"all"}

case "$COMMAND" in
    start)
        if [ "$SERVER" = "all" ]; then
            echo "🚀 Avvio di tutti i server MCP..."
            all_servers "start"
        else
            start_server "$SERVER"
        fi
        ;;
    stop)
        if [ "$SERVER" = "all" ]; then
            echo "🛑 Arresto di tutti i server MCP..."
            all_servers "stop"
        else
            stop_server "$SERVER"
        fi
        ;;
    status)
        if [ "$SERVER" = "all" ]; then
            echo "📊 Stato di tutti i server MCP..."
            all_servers "status"
        else
            status_server "$SERVER"
        fi
        ;;
    restart)
        if [ "$SERVER" = "all" ]; then
            echo "🔄 Riavvio di tutti i server MCP..."
            all_servers "restart"
        else
            restart_server "$SERVER"
        fi
        ;;
    logs)
        if [ "$SERVER" = "all" ]; then
            echo "📋 Log di tutti i server MCP..."
            all_servers "logs"
        else
            logs_server "$SERVER"
        fi
        ;;
    install)
        if [ "$SERVER" = "all" ]; then
            echo "📦 Installazione di tutti i server MCP..."
            all_servers "install"
        else
            install_server "$SERVER"
        fi
        ;;
    help)
        show_help
        ;;
    *)
        echo "❌ Comando non riconosciuto: $COMMAND"
        show_help
        exit 1
        ;;
esac

exit 0
