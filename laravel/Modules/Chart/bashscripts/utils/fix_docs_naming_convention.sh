#!/bin/bash

# Script to fix docs naming convention
# CRITICAL RULE: In docs directories, only README.md can have uppercase letters
# All other files and folders must be lowercase

PROJECT_ROOT="/var/www/html/_bases/base_techplanner_fila3_mono"
RENAMED_COUNT=0
SKIPPED_COUNT=0
ERROR_COUNT=0

echo "🔍 CRITICAL RULE: Fixing docs naming convention..."
echo "   - Only README.md can have uppercase letters"
echo "   - All other files and folders must be lowercase"
echo ""

# Function to rename files and directories to lowercase
fix_naming_in_directory() {
    local docs_dir="$1"
    
    if [[ ! -d "$docs_dir" ]]; then
        echo "   ⚠️  Directory does not exist: $docs_dir"
        return
    fi
    
    echo "📁 Processing docs directory: $docs_dir"
    
    # Find all files and directories in the docs directory
    find "$docs_dir" -depth -type f -o -type d | while read -r item; do
        # Skip if it's the docs directory itself
        if [[ "$item" == "$docs_dir" ]]; then
            continue
        fi
        
        # Get the basename and dirname
        basename_item=$(basename "$item")
        dirname_item=$(dirname "$item")
        
        # Skip README.md (allowed to have uppercase)
        if [[ "$basename_item" == "README.md" ]]; then
            echo "   ✅ Skipping README.md (allowed uppercase)"
            ((SKIPPED_COUNT++))
            continue
        fi
        
        # Check if the name contains uppercase letters
        if [[ "$basename_item" =~ [A-Z] ]]; then
            # Convert to lowercase
            lowercase_name=$(echo "$basename_item" | tr '[:upper:]' '[:lower:]')
            new_path="$dirname_item/$lowercase_name"
            
            # Check if target already exists
            if [[ -e "$new_path" && "$new_path" != "$item" ]]; then
                echo "   ⚠️  Target already exists: $new_path"
                echo "      Cannot rename: $item"
                ((ERROR_COUNT++))
                continue
            fi
            
            echo "   🔄 Renaming: $basename_item → $lowercase_name"
            
            # Perform the rename
            if mv "$item" "$new_path" 2>/dev/null; then
                ((RENAMED_COUNT++))
            else
                echo "   ❌ Failed to rename: $item"
                ((ERROR_COUNT++))
            fi
        else
            echo "   ✅ Already lowercase: $basename_item"
            ((SKIPPED_COUNT++))
        fi
    done
}

# Find all docs directories and process them
echo "🔍 Finding all docs directories..."
find "$PROJECT_ROOT" -type d -name "docs" -not -path "*/vendor/*" -not -path "*/node_modules/*" | while read -r docs_dir; do
    fix_naming_in_directory "$docs_dir"
    echo ""
done

echo "📊 Summary:"
echo "   🔄 Renamed items: $RENAMED_COUNT"
echo "   ✅ Already correct: $SKIPPED_COUNT" 
echo "   ❌ Errors: $ERROR_COUNT"
echo ""
echo "✨ Docs naming convention fix completed!"
echo ""
echo "🔍 Verifying: Checking for any remaining uppercase names..."

# Verification: Check for any remaining uppercase names in docs directories
find "$PROJECT_ROOT" -path "*/docs/*" -not -path "*/vendor/*" -not -path "*/node_modules/*" \
    \( -type f -o -type d \) -name "*[A-Z]*" ! -name "README.md" | while read -r item; do
    echo "   ⚠️  Still has uppercase: $item"
done

echo "✅ Verification complete!"
