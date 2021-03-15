# Initialisation du Test

## Dans un docker
### Démarrer docker

Depuis la racine du drupal

``docker-compose -f etc/docker/docker-compose.yml up -d``

### Installer le Drupal

Entrer dans le container

``docker exec -it lamp_kata_drupal /bin/bash``

Aller dans le repertoire "/var/www/html" et lancer l'installation

``/opt/script/install_indocker.sh``

### Accèder au contenaire

localhost:8080

## En local

Aller dans le repertoire "/home/test/Eurelis-CodeChallenge/drupal" et lancer l'installation

``./install.sh``
