<?php

include('data.php');

$ingredients = getIngredients();
$birthdays   = getBirthdays();
$json        = nbIngredientPerMonth($ingredients, $birthdays);

echo $json;


function nbIngredientPerMonth($ingredients, $birthdays): string
{
    $results = array();

    // your script here

    return json_encode($results);
}