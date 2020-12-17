#!/bin/bash

DOCROOT="/var/www/html"
DRUPAL_ROOT="$DOCROOT/docroot"
PRIVATEFILEDIRECTORY="$DOCROOT/private"
DRUSH="$DOCROOT/vendor/bin/drush"

echo "reset DB"
$DRUSH sql-drop -y

echo "Inject new DB from $1"
$DRUSH sql-cli < $1

echo "Run Update"
/opt/scripts/update.sh
