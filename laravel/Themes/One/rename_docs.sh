#!/bin/bash

# Navigate to the docs directory
cd "$(dirname "$0")/docs"

# Function to rename files and directories to lowercase
rename_to_lowercase() {
    # First, process directories
    find . -type d -not -path '.' -not -path './.git*' | while read -r dir; do
        # Get the lowercase version of the directory name
        newdir=$(dirname "$dir")/$(basename "$dir" | tr '[:upper:]' '[:lower:]')
        
        # Only rename if the new name is different and not the same as an existing directory
        if [ "$dir" != "$newdir" ] && [ ! -e "$newdir" ]; then
            echo "Renaming directory: $dir -> $newdir"
            mv "$dir" "$newdir"
        fi
    done
    
    # Then, process files (except README.md)
    find . -type f -not -path './.git*' -not -name 'README.md' | while read -r file; do
        # Get the directory and filename components
        dir=$(dirname "$file")
        filename=$(basename "$file")
        
        # Skip README.md files
        if [ "$filename" = "README.md" ]; then
            continue
        fi
        
        # Get the lowercase version of the filename
        newfilename=$(echo "$filename" | tr '[:upper:]' '[:lower:]')
        
        # Only rename if the new name is different
        if [ "$filename" != "$newfilename" ]; then
            newfile="$dir/$newfilename"
            
            # Skip if a file with the new name already exists
            if [ -e "$newfile" ] && [ "$file" != "$newfile" ]; then
                echo "Warning: Skipping $file - $newfile already exists"
                continue
            fi
            
            echo "Renaming file: $file -> $newfile"
            mv "$file" "$newfile"
        fi
    done
}

# Run the renaming function
rename_to_lowercase

echo "All files and folders have been renamed to lowercase (except README.md)"
