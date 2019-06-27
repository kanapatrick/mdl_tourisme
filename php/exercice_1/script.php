<?php

/**
 * Variables
 * DO NOT TOUCH
 */

$stock = [
    'corn'   => 0,
    'butter' => 0,
    'sugar'  => 0,
    'oil'    => 0,
    'salt'   => 0,
];

/**
 * @TODO :
 *   - Mettre à jour dynamiquement $stock en fonction du stock actuel disponible sur https://api.myjson.com/bins/x6l6h
 *   - Enregistrer $stock dans un fichier stock.json (au même niveau que script.php)
 */


/**
 * Response
 * DO NOT TOUCH
 */
print_r($stock);