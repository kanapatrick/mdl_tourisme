<?php

include 'script.php';
include 'custom_assert.php';

$stock_to_check = ex1();

$good_stock = json_decode('{"corn":4000,"butter":500,"sugar":1000,"oil":1000,"salt":550}', true);

// Check le résultat
custom_assert($stock_to_check == $good_stock, 'Résultat');

// Check la présence du fichier
custom_assert(file_exists('exercice_1/stock.json') , 'Présence fichier');

// Check le contenu du fichier
$stock_to_check = json_decode(file_get_contents('exercice_1/stock.json'),true);
custom_assert($stock_to_check == $good_stock, 'Fichier valide');
