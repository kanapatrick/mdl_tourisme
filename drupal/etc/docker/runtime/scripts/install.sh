#!/bin/bash

DOCROOT="/var/www/html"
SITENAME="Polylogis Immo"
USERADMIN="admin"
ADMINPASS="admin"
DRUPAL_ROOT="$DOCROOT/docroot"
PRIVATEFILEDIRECTORY="$DOCROOT/private"
SYNC_DIRECTORY="../private/config/sync"
DRUSH="$DOCROOT/vendor/bin/drush"

export PATH=$DOCROOT/vendor/bin:$PATH

echo "## mise à jour patch"
yum install diff-utils patch unzip php72-imagick -y
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
  'database' => 'db_plv',
  'username' => 'db_plv',
  'password' => 'db_plv',
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
$DRUSH cset system.site uuid 9d4d5365-eba5-048a-287a-106529e9a043 -y

echo "Premier Import des config en silencieux"
drush cim -y
echo "Second import des config"
drush cim -y

echo "Import traductions"
drush locale:check
drush locale:update

echo ""
echo "Vidage des caches"
$DRUSH cr --cache-clear all

$DRUSH status

echo "/******************************/"
echo "/** Configuration Checkstyle **/"
echo "/******************************/"
echo ""
$DOCROOT/vendor/bin/phpcs --config-set installed_paths $DOCROOT/vendor/drupal/coder/coder_sniffer

echo ""
echo "/***********/"
echo "/* Terminé */"
echo "/***********/"
echo ""

echo ""
echo "Inject Default content"
$DRUSH en default_content
$DRUSH pmu default_content
