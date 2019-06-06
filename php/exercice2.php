<?php

include('data.php');

$ingredients = getIngredients();
$json        = nbIngredientPerMonth($ingredients);

echo $json;


function nbIngredientPerMonth($ingredients): string
{
    $results = array();

    // your script here

    return json_encode($results);
}