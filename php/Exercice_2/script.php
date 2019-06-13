<?php

/**
 * Variables
 */
$fourPeoplePopcornRecipe = [
    'corn'   => 50,
    'butter' => 30,
    'sugar'  => 30,
    'oil'    => 2,
    'salt'   => 2,
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
 *   - La variable $fourPeoplePopcornRecipe correspond aux ingrédients nécessaires pour 4 personnes
 *   - Générer une réponse en JSON avec la liste des quantités mensuelles nécessaires de chaque ingrédient
 */


/**
 * Response
 */
print_r($json);