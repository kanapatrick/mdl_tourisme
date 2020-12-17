#!/bin/bash

DOCROOT="/var/www/html"
FILEDIRECTORY="/var/www/plv_public_files"
PRIVATEFILEDIRECTORY="/var/www/plv_private_files"
COMPOSER="composer"

DRUPAL_ROOT="$DOCROOT/docroot"
DRUSH="$DOCROOT/vendor/bin/drush"
export PATH=$DOCROOT/vendor/bin:$PATH

echo "install local packages"
yum install diff-utils patch unzip php72-imagick -y
service httpd restart

cd $DOCROOT
echo "mise à jour des packet via composer"
composer global require hirak/prestissimo
$COMPOSER install
chmod -R 0755 $DRUPAL_ROOT/sites/default
chmod -R 0644 $DRUPAL_ROOT/sites/default/settings.php

cd $DRUPAL_ROOT

echo ""
echo "Mise à jour des modules Drupal"
$DRUSH updb -y

# Disabled by 8.8
# $DRUSH entup -y

echo ""
echo "Vidage des caches"
$DRUSH cc drush
$DRUSH cr

echo ""
echo "Import global des config"
$DRUSH cim -y
echo "Import des config locales"
$DRUSH cim -y

echo ""
echo "Import traductions"
$DRUSH locale:check
$DRUSH locale:update

echo ""
echo "Vidage des caches"
$DRUSH cc drush
$DRUSH cr