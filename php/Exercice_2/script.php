<?php

/**
 * Variables
 */
$twoPeoplePopcornRecipe = [
    'corn'   => 25,
    'butter' => 15,
    'sugar'  => 15,
    'oil'    => 1,
    'salt'   => 1,
];

$stock = [
    'corn'   => 0,
    'butter' => 0,
    'sugar'  => 0,
    'oil'    => 0,
    'salt'   => 0,
];

/**
 * - nous faisons du popcorn 4 fois par mois
 * - il y a 30 personnes sur le plateau
 *
 * @TODO
 *   - Mettre à jour la variable $stock avec ces nouvelles informations
 *   - La variable $twoPeoplePopcornRecipe correspond aux ingrédients nécessaires pour 2 personnes
 *   - Générer une réponse en JSON avec la liste des quantités mensuelles nécessaires de chaque ingrédient
 */


/**
 * Response
 */
print_r($json);