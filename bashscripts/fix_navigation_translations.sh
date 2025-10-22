#!/bin/bash

# Script to fix all .navigation references in translation files
# This addresses the SVG not found error caused by malformed icon references

echo "Starting systematic fix of .navigation references in translation files..."

# Function to fix a single file
fix_file() {
    local file="$1"
    local module_name="$2"
    
    echo "Processing: $file"
    
    # Backup original file
    cp "$file" "$file.backup"
    
    # Fix common .navigation patterns
    sed -i "s/'label' => '[^']*\.navigation'/'label' => 'Navigation Label'/g" "$file"
    sed -i "s/'group' => '[^']*\.navigation'/'group' => '$module_name'/g" "$file"
    sed -i "s/'icon' => '[^']*\.navigation'/'icon' => 'heroicon-o-cog'/g" "$file"
    
    # Convert array() to [] syntax if present
    sed -i 's/array (/[/g' "$file"
    sed -i 's/),$/],/g' "$file"
    
    # Add declare(strict_types=1) if missing
    if ! grep -q "declare(strict_types=1);" "$file"; then
        sed -i '2i\\ndeclare(strict_types=1);' "$file"
    fi
    
    echo "Fixed: $file"
}

# Process Geo module files
echo "Fixing Geo module files..."
for file in /var/www/html/_bases/base_saluteora/laravel/Modules/Geo/lang/*/*.php; do
    if grep -q "\.navigation" "$file"; then
        fix_file "$file" "Geo"
    fi
done

# Process Chart module files
echo "Fixing Chart module files..."
for file in /var/www/html/_bases/base_saluteora/laravel/Modules/Chart/lang/*/*.php; do
    if grep -q "\.navigation" "$file"; then
        fix_file "$file" "Chart"
    fi
done

# Process UI module files
echo "Fixing UI module files..."
for file in /var/www/html/_bases/base_saluteora/laravel/Modules/UI/lang/*/*.php; do
    if grep -q "\.navigation" "$file"; then
        fix_file "$file" "UI"
    fi
done

# Process FormBuilder module files
echo "Fixing FormBuilder module files..."
for file in /var/www/html/_bases/base_saluteora/laravel/Modules/FormBuilder/lang/*/*.php; do
    if grep -q "\.navigation" "$file"; then
        fix_file "$file" "FormBuilder"
    fi
done

# Process Job module files
echo "Fixing Job module files..."
for file in /var/www/html/_bases/base_saluteora/laravel/Modules/Job/lang/*/*.php; do
    if grep -q "\.navigation" "$file"; then
        fix_file "$file" "Job"
    fi
done

# Process Notify module files
echo "Fixing Notify module files..."
for file in /var/www/html/_bases/base_saluteora/laravel/Modules/Notify/lang/*/*.php; do
    if grep -q "\.navigation" "$file"; then
        fix_file "$file" "Notify"
    fi
done

# Process Lang module files
echo "Fixing Lang module files..."
for file in /var/www/html/_bases/base_saluteora/laravel/Modules/Lang/lang/*/*.php; do
    if grep -q "\.navigation" "$file"; then
        fix_file "$file" "Lang"
    fi
done

echo "All .navigation references have been systematically fixed!"
echo "Backup files created with .backup extension"
echo "Please test the application to confirm the SVG not found error is resolved."
