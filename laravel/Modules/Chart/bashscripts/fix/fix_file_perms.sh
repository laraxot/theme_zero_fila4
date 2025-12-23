#!/bin/bash
git config core.filemode false
sudo chown -R www-data:www-data .
sudo find . -type f -exec chmod 644 {} \;
sudo find . -type d -exec chmod 755 {} \;
sudo chmod -R u+w .git
# Fix the permissions on your SSH config file
chmod 600 ~/.ssh/config
# If you have a public key, set its permissions too
chmod 644 ~/.ssh/id_rsa.pub
# Also ensure your .ssh directory has correct permissions
chmod 700 ~/.ssh