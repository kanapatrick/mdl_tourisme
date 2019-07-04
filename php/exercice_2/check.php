<?php

include 'script.php';
include 'custom_assert.php';


// Check Lundi only
$stock_to_check = ex2(2020, 07); // Sans anniversaires (4)
$good_stock = json_decode('{"corn":50,"butter":20,"sugar":20,"oil":8,"salt":8}', true);
custom_assert($stock_to_check == $good_stock, 'Résultat uniquement Lundi');

// Check Lundi + anniversaire
$stock_to_check = ex2(2019, 01); // Avec 1 anniversaire (5)
$good_stock = json_decode('{"corn":37.5,"butter":12.5,"sugar":12.5,"oil":7.5,"salt":7.5}', true);
custom_assert($stock_to_check == $good_stock, 'Résultat Lundi + Anniversaires');

// Check anniversaire le même jour
$stock_to_check = ex2(2019, 06); // Avec 2 anniversaies le même jour (6)
$good_stock = json_decode('{"corn":25,"butter":5,"sugar":5,"oil":7,"salt":7}', true);
custom_assert($stock_to_check == $good_stock, 'Résultat Anniversaires le même jour');

// Check weekend
$stock_to_check = ex2(2021, 01); // Avec 1 anniversaire un weekend (4)
$good_stock = json_decode('{"corn":50,"butter":20,"sugar":20,"oil":8,"salt":8}', true);
custom_assert($stock_to_check == $good_stock, 'Résultat anniversaire en weekend');

// Check fin de stock
$stock_to_check = ex2(2021, 05); // Check stock
$good_stock = json_decode('{"corn":12.5,"butter":0,"sugar":0,"oil":6.5,"salt":6.5}', true);
custom_assert($stock_to_check == $good_stock, 'Résultat stock');

// Lundi + anniversaire + jour férié
$stock_to_check = ex2(2019, 11); // Anniversaire un jour férié (4)
$good_stock = json_decode('{"corn":50,"butter":20,"sugar":20,"oil":8,"salt":8}', true);
custom_assert($stock_to_check == $good_stock, 'Résultat jours fériés');

