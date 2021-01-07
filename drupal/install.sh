#!/bin/bash

DOCROOT="/home/test/Eurelis-CodeChallenge/drupal/drupal"
SITENAME="Drupal TEST"
USERADMIN="admin"
ADMINPASS="admin"
DRUPAL_ROOT="$DOCROOT/web"
PRIVATEFILEDIRECTORY="$DOCROOT/private"
SYNC_DIRECTORY="$PRIVATEFILEDIRECTORY/config/sync"
DRUSH="$DOCROOT/vendor/bin/drush"
COMPOSER="/home/test/composer"
export PATH=$DOCROOT/vendor/bin:$PATH

cd $DOCROOT

echo ""
echo "/*****************************************/"
echo "/* Installation des packets via composer */"
echo "/*****************************************/"
echo ""
$COMPOSER install

echo ""
echo "/****************************************/"
echo "/* Configuration des fichiers de Drupal */"
echo "/****************************************/"
echo ""
echo "configuration of default folder"
chmod -R 0755 $DRUPAL_ROOT/sites/default
chmod -R 777 $DRUPAL_ROOT/sites/default/files
chmod -R 0755 $DRUPAL_ROOT/sites/default/settings.local.php
mkdir -p $DRUPAL_ROOT/sites/default/files/translations

echo ""
echo "/**************************/"
echo "/* Installation de Drupal */"
echo "/**************************/"
echo ""
echo "## Installation du drupal"
$DRUSH site-install minimal --site-name="$SITENAME" --root=$DRUPAL_ROOT \
 --account-name="$USERADMIN" --account-pass="$ADMINPASS" -y

echo ""
echo "/************************************/"
echo "/* Mise à niveau des configurations */"
echo "/************************************/"
echo ""

echo "## Forçage de l'UUID"
$DRUSH cset system.site uuid 64ef9f2b-9c94-4c04-b294-e1efc5043a38 -y

echo "Premier Import des config"
drush cim -y
echo "Second import des config"
drush cim -y

echo ""
echo "Vidage des caches"
$DRUSH cr --cache-clear all

$DRUSH status

echo ""
echo "/***********/"
echo "/* Terminé */"
echo "/***********/"
echo ""

