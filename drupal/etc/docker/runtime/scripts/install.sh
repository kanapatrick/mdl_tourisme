#!/bin/bash

DOCROOT="/var/www/html"
SITENAME="Drupal TEST"
USERADMIN="admin"
ADMINPASS="admin"
DRUPAL_ROOT="$DOCROOT/web"
PRIVATEFILEDIRECTORY="$DOCROOT/private"
SYNC_DIRECTORY="$PRIVATEFILEDIRECTORY/config/sync"
DRUSH="$DOCROOT/vendor/bin/drush"

export PATH=$DOCROOT/vendor/bin:$PATH

echo "## mise à jour patch"
yum install diff-utils patch unzip -y
service httpd restart

cd $DOCROOT

echo ""
echo "/*****************************************/"
echo "/* Installation des packets via composer */"
echo "/*****************************************/"
echo ""
composer global require hirak/prestissimo
composer install

echo ""
echo "/****************************************/"
echo "/* Configuration des fichiers de Drupal */"
echo "/****************************************/"
echo ""
echo "configuration of default folder"
chmod -R 0755 $DRUPAL_ROOT/sites/default
LOCALSETTINGSFILE="$DRUPAL_ROOT/sites/default/settings.local.php"
if [ ! -f $LOCALSETTINGSFILE ]; then
    cp $DRUPAL_ROOT/sites/example.settings.local.php $LOCALSETTINGSFILE
    echo " - Ecriture des données de BDD dans le local.settings.php"
    echo "" >> $LOCALSETTINGSFILE
    echo "// Database" >> $LOCALSETTINGSFILE
    echo "\$databases['default']['default'] = array (
  'database' => 'db_drupal',
  'username' => 'db_drupal',
  'password' => 'db_drupal',
  'prefix' => '',
  'host' => '127.0.0.1',
  'port' => '',
  'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
  'driver' => 'mysql',
);" >> $LOCALSETTINGSFILE

    echo "" >> $LOCALSETTINGSFILE
    echo "// Activate config Split Dev" >> $LOCALSETTINGSFILE
    echo "\$config['config_split.config_split.dev']['status'] = TRUE;" >> $LOCALSETTINGSFILE
fi

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

