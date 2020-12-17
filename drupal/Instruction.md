# Test Drupal

## Créer un Type de contenu "Voyage"

Le type de contenu "Voyage" contient les champs : 
- un titre
- un champ wysiwyg (body)
- un champ image
- un champ Ville => référence à un terme de taxonomy du vocabulaire "ville"

## Créer un vocabulaire de taxonomie "ville"
- Le nom de la ville
- le code Insee

### Liste de villes

| Ville | code Insee |
|------|------|
| Rennes | 35238 |


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
- un blog avec la prévision météo à 5 jours sous la forme d'un tableau

exemple : 
| Jour | Tmin | Tmax | Cummul pluie |
|------|------|------|-------------|
| mardi | 12°C | 21°C | 0mm |
| mercredi | 13°C | 20°C | 5mm | 
...

## Exporter la configuration 