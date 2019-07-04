<?php

function custom_assert($bool, $message) {
    $message = " $message : ";
    $message .= $bool ?"\e[0;30;42m OK \e[0m\n":"\e[1;37;41m KO \e[0m\n";
    echo $message;
}