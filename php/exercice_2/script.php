<?php
/**
 * Base function
 * DO NO TOUCH
 *
 * @param $year
 * @param $month
 * @return array
 */
function ex2($year, $month)
{
    /**
     * Variables
     * DO NOT TOUCH
     */
    $twoPeoplePopcornRecipe = [
        'corn' => 25,
        'butter' => 15,
        'sugar' => 15,
        'oil' => 1,
        'salt' => 1,
    ];

    $stock = [
        'corn' => 100,
        'butter' => 50,
        'sugar' => 50,
        'oil' => 10,
        'salt' => 10,
    ];

    /**
     * @TODO
     *   - Nous faisons du popcorn tous les lundis
     *   - Nous faisons du popcorn pour chaque anniversaire ( birthdays.json )
     *   - Il y a 30 personnes sur le plateau
     *   - La variable $twoPeoplePopcornRecipe correspond aux ingrédients nécessaires pour 2 personnes
     *   - Mettre à jour la variable $stock pour la fin du mois $month de l'année $year
     */


    /**
     * Response
     * DO NOT TOUCH
     */
    return $stock;
}