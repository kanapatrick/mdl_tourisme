<?php

include 'script.php';
include 'custom_assert.php';


$stock_to_check = ex2(2020, 07);
$good_stock = json_decode('{"corn":50,"butter":20,"sugar":20,"oil":8,"salt":8}', true);
custom_assert($stock_to_check == $good_stock, 'Test 1');

$stock_to_check = ex2(2019, 01);
$good_stock = json_decode('{"corn":37.5,"butter":12.5,"sugar":12.5,"oil":7.5,"salt":7.5}', true);
custom_assert($stock_to_check == $good_stock, 'Test 2');

$stock_to_check = ex2(2019, 06);
$good_stock = json_decode('{"corn":25,"butter":5,"sugar":5,"oil":7,"salt":7}', true);
custom_assert($stock_to_check == $good_stock, 'Test 3');

$stock_to_check = ex2(2021, 01);
$good_stock = json_decode('{"corn":50,"butter":20,"sugar":20,"oil":8,"salt":8}', true);
custom_assert($stock_to_check == $good_stock, 'Test 4');

$stock_to_check = ex2(2021, 05);
$good_stock = json_decode('{"corn":12.5,"butter":0,"sugar":0,"oil":6.5,"salt":6.5}', true);
custom_assert($stock_to_check == $good_stock, 'Test 5');

$stock_to_check = ex2(2019, 11);
$good_stock = json_decode('{"corn":50,"butter":20,"sugar":20,"oil":8,"salt":8}', true);
custom_assert($stock_to_check == $good_stock, 'Test 6');

