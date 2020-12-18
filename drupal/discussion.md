# Discution / Question / Critique de la réalisation

NOTE : Fichier à supprimer lors de la réalisation du test ! 

## En terme de Back-office

### Sur le Type de contenu "Tourisme" (coté BO)

-> Quel widget choisi pour le champ ville :
- Liste déroulante 
- autocompletion
- autre chose (le candidat est-il aller cherche un autre module, genre select2 ? )

-> le champ ville est-il obligatoire ? 

### Sur le vocabulaire "ville"

-> Le champ code Insee doit être un champs texte, et pas un numérique

-> choix du champ code postal :
- champ texte simple avec valeurs séparés par une virgule
- champ multiple (texte/numerique)

### Sur le service de récupération des prévisions

C'est pas demandé, mais si le dev à du temps et a envie de "faire bien propre" : 
- Présence d'une page de configuration pour le token ?

### Intégration du bloc météo sur la page "Tournisme"

- Bloc positionné depuis le BO ? 
- Condition d'affichage

## En terme de Front

### Affichage de la page Tournisme 

- Sur une page Tourisme SANS VILLE, quel est le comportement du bloc météo ?

### Affichage de la page Météo

-> Quel widget choisi pour le champ ville :
- Liste déroulante
- autocompletion
- autre chose (le candidat est-il aller cherche un autre module, genre select2 ? )

-> Affichage du tableau dans la page

## Réalisation technique

### Sur le service de récupération des prévisions

- Création d'un module séparé du module principal ?
- Mise en place d'un système de cache ?
- Création d'un hook_thème / template spécifique à l'affichage des résultat ?
- Si variabilisation du token : 
  - Stockage ? config / state

### Bloc Meteo

- si le service dans un module indépendant du module principal, où est ce block ?
- Comment est récupéré le code Insee depuis la page ? 

### Page Météo

- si le service dans un module indépendant du module principal, où est ce block ?
- Réalisation ? 
  - Formulaire seul VS controller + formulaire
