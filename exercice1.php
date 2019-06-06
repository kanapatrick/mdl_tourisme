<?php

include('data.php');

$ingredients  = getIngredients();
$shoppingList = createShoppingList($ingredients);
$text         = file_get_contents($shoppingList);

echo $text;

function createShoppingList($ingredients): string
{
    // your script here

    return $filename;
}