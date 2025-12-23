#!/bin/bash

# Fix file permissions
sudo chown -R $USER:$USER /var/www/html/base_saluteora/laravel/Modules/SaluteOra/lang/

# Fix navigation in translation files
find /var/www/html/base_saluteora/laravel/Modules/SaluteOra/lang -type f -name "*.php" -exec sed -i \
    -e "s/'label' => '.*\.navigation',/'label' => 'Temporary Label',/g" \
    -e "s/'group' => '.*\.navigation',/'group' => 'Temporary Group',/g" \
    -e "s/'icon' => '.*\.navigation',/'icon' => 'heroicon-o-document',/g" \
    {} \;

echo "File permissions and basic navigation fixes applied. Please review and update the temporary values."
