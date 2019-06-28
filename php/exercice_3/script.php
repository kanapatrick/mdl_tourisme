<?php

/**
 * Variables
 * DO NOT TOUCH
 */

// La possibilité de base de départ d'un employé est de 9%
// La formule de calcule par ancienneté est la suivate :
// f($seniority) = $base_leaving_assumption + (log($seniority) * $base_leaving_assumption)
$base_leaving_assumption = 0.09 ;

// Le taux de croissance est 22%  par an
$growth_rate = 0.22 ;

// Les ingrédients nécessaires pour 2 personnes
$twoPeoplePopcornRecipe = [
    'corn'   => 25,
    'butter' => 15,
    'sugar'  => 15,
    'oil'    => 1,
    'salt'   => 1,
];

// Prénom => Date d'arrivée chez Eurelis
$population = [
    'Antoine'   => '2008-01-10',
    'Antonin'   => '2018-03-10',
    'Bader'     => '2018-05-17',
    'Celine'    => '2019-04-07',
    'Charles'   => '2019-02-17',
    'Cyril'     => '2011-11-27',
    'Kathleen'  => '2018-02-07',
    'Eglantine' => '2013-04-17',
    'Florian'   => '2012-06-17',
    'Guillaume' => '2017-08-07',
    'Jean'      => '2016-10-27',
    'Jerome'    => '2009-12-17',
    'Julien'    => '2014-01-27',
    'Melanie'   => '2019-05-01',
    'Philippe'  => '2002-06-07',
    'Sandrine'  => '2009-09-17',
    'Sylvain'   => '2013-12-27',
    'Vincent'   => '2003-02-17',
    'Yassine'   => '2018-05-07',
    'Yousri'    => '2018-10-17',
    'Zehuan'    => '2018-08-20'
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
 * - Nous faisons du popcorn uniquement tous les lundis
 * - Calculez le $stock nécessaire pour une fournée de popcorn pour le mois d'Avril 2032 en prenant en compte le turnover (arrivées / départs).
 * - Mettez à jour $population pour avril 2032
 */


/**
 * Response
 * DO NOT TOUCH
 */
print_r($stock);
print_r($population);