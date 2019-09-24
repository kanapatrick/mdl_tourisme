<?php

/**
 * Functions
 */

function update_stock($amount_people, $stock, $twoPeoplePopcornRecipe){
    // $value / 2 because recipe is for 2
    foreach ($twoPeoplePopcornRecipe as $ing => $value){
         $stock[$ing] -= $value/2 * $amount_people;

         if($stock[$ing] < 0) $stock[$ing] = 0 ;
    }

    return $stock;
}

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

    $month = sprintf("%02d", $month);
    $date = DateTime::createFromFormat('Y-m-d H:i:s',"$year-$month-01 00:00:00");
    $thisMonth = $date->format('m');
    $days = [];
    /**
     * Get all monday of current month
     */

    while ($date->format('m') === $thisMonth) {

        //check if current date is monday, just to be sure
        if((int)$date->format('w') === 1){
            //use timestamp for make to sure have uniq entry for this date
            $days[$date->getTimestamp()] = $date->format('Y-m-d');
        }
        $date = $date->modify('next Monday');
    }

    /**
     * Get birthdays
     */
     $birthdays = json_decode(file_get_contents('birthdays.json'),true);

     foreach ($birthdays as $name => $string_date){
         $birthdate = DateTime::createFromFormat('Y-m-d H:i:s', "$string_date 00:00:00");

         // Check if the person is born in the current month
         if($birthdate->format('m') === $thisMonth) {

             //set date to current year
             $birthdate->setDate($year, $birthdate->format('m'), $birthdate->format('d'));

             // check if the day of the birthdate is a weekday (0 sunday , 6 saturday)
             if((int)$birthdate->format('w') > 0 && (int)$birthdate->format('w') < 6) {

                 //use timestamp for make to sure have uniq entry for this date
                 $days[$birthdate->getTimestamp()] = $birthdate->format('Y-m-d');
             }

         }
     }

    /**
     * @TODO : jours fériés
     */

    /**
     * Update stock
     */
    $stock = update_stock(count($days),$stock, $twoPeoplePopcornRecipe) ;

    /**
     * Response
     * DO NOT TOUCH
     */
    return $stock;
}

