<?php

/**
 * Variables
 * DO NOT TOUCH
 */

$avg_duration = 5 ; // years

$avg_new = 12 ; // employee

$twoPeoplePopcornRecipe = [
    'corn'   => 25,
    'butter' => 15,
    'sugar'  => 15,
    'oil'    => 1,
    'salt'   => 1,
];

$population = [
    'Antoine',
    'Antonin',
    'Bader',
    'Celine',
    'Charles',
    'Cyril',
    'Kathleen',
    'Eglantine',
    'Florian',
    'Guillaume',
    'Jean',
    'Jerome',
    'Julien',
    'Melanie',
    'Philippe',
    'Sandrine',
    'Sylvain',
    'Vincent',
    'Yassine',
    'Yousri',
    'Zehuan'
];

$stock = [
    'corn'   => 0,
    'butter' => 0,
    'sugar'  => 0,
    'oil'    => 0,
    'salt'   => 0,
];

/**
 * @TODO
 * - Nous faisons du popcorn uniquement tout les lundis
 * - Un employé reste en moyenne 5 ans chez Eurelis (variable $avg_duration)
 * - En moyenne nous recrutons 12 nouvelles personnes par an (variable $avg_new)
 * - La variable $twoPeoplePopcornRecipe correspond aux ingrédients nécessaires pour 2 personnes
 * - Calculez le $stock necessaire pour une fournée de popcorn pour le mois d'Avril 2032 en prenant en compte le turnover (arrivées / départs).
 * - Mettez à jour $population pour Avril 2032
 */


/**
 * Response
 */
print_r($stock);
print_r($population);