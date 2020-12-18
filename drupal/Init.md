# Initialisation du Test

## Démarer docker

Depuis la racine du drupal

``docker-compose -f etc/docker/docker-compose.yml up -d``

## Installer le Drupal

Entrer dans le container

``docker exec -it lamp_kata_drupal /bin/bash``

Aller dans le repertoire "/var/www/html" et lancer l'installation

``/opt/script/install.sh``

