# Projet Voyage

## Créer un Type de contenu "Tourisme"

Le type de contenu "Tourisme" contient les champs : 
- un titre
- un champ wysiwyg (body)
- un champ image
- un champ Ville => référence à un terme de taxonomy du vocabulaire "ville"

## Créer un vocabulaire de taxonomie "ville"
Chaque Terme est composé de :
- Le nom de la ville
- le code Insee
- le code postale

### Liste de villes

| Code Insee | Code Postal | Ville |
| --- | --- | --- |
| 92002 | 92160 | Antony |
| 21231 | 21000 | Dijon |
| 54395 | 54000 | Nancy |
| 44109 | 44000, 44100, 44200, 44300 | Nantes |
| 75115 | 75000 | Paris-15em |
| 2A247 | 20137 | Porto-vecchio |
| 17299 | 17300 | Rochefort |
| 78646 | 78000 | Versailles |

## Créer un service de récupération des prévisions météo

Le service prend en entrée la ville et renvoi les prévisions météo à 5 jours ( I.E. : aujourd'hui + les 5 prochains jours).
Les informations attendu en sorties sont : 
- Température minimale
- Température maximale
- Cumul de pluie sur la journée en mm

### Référence Information de l'API meteo

Ref : https://api.meteo-concept.com/documentation#forecast-city-day

Token : 5f84ff6e3faadf5d55aa52af0e427e79854779ca7198f5142de2adc54bf8598d


## Affichage attendu 

Lors de l'affichage d'un contenu : 

Afficher dans la zone principale : 
- Titre
- Ville
- Image
- Body

Afficher en colonne de gauche (Sidebar first)
- un bloc avec la prévision météo à 5 jours sous la forme d'un tableau

Exemple :

| Jour | Tmin | Tmax | Cummul pluie |
| --- | --- | --- | --- |
| mardi | 12°C | 21°C | 0mm |
| mercredi | 13°C | 20°C | 5mm | 
| ... | ... | ... | ... |

## Page méteo

Créer une page "Voir la météo" proposant un champ de recherche de ville.
Une fois la ville selectionnée, les prévisions météo à 5 jours ( I.E. : aujourd'hui + les 5 prochains jours) s'affichent en pleine page sous la forme d'un tableau

Exemple :

| Jour | Tmin | Tmax | Cummul pluie |
| --- | --- | --- | --- |
| mardi | 12°C | 21°C | 0mm |
| mercredi | 13°C | 20°C | 5mm | 
| ... | ... | ... | ... |

## Export conf

Le projet est basé sur la CMI, si possible merci d'exporter l'ensemble des configurations créer afin de les partager avec les autres developpeurs du projets.

### Notes 

Accès au Drupal :
- URL : localhost:8080
- authentification BO : admin/admin

Le thème à utiliser est "voyages" déjà présent dans les sources.

Outils disponible en shell : 
- composer 
- drush
- drupal console
