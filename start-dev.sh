#!/bin/bash

PROJECT_DIR="/Users/ralph/Documents/Development/wyw"
PORT=8000

# Kill any existing PHP server on port 8000
pkill -f "php -S localhost:$PORT" 2>/dev/null
sleep 0.3

# Function to start the server
start_server() {
    cd "$PROJECT_DIR"
    php -S localhost:$PORT &
    SERVER_PID=$!
    echo "[$(date +%H:%M:%S)] Server started (PID: $SERVER_PID) on http://localhost:$PORT"
}

# Start the server initially
start_server

# Watch for changes and restart server
echo "[$(date +%H:%M:%S)] Watching for file changes..."
fswatch -r -o "$PROJECT_DIR" --exclude='.*\.(log|tmp|swp|git)$' --exclude='node_modules' --exclude='_db_backups' | while read num; do
    echo "[$(date +%H:%M:%S)] File change detected (event count: $num), restarting server..."
    pkill -f "php -S localhost:$PORT" 2>/dev/null
    sleep 0.3
    start_server
done

