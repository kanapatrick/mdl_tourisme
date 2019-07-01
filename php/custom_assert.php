<?php

function custom_assert($bool, $message) {
    print("$message :" . ' ' . ($bool ? 'OK' : 'KO') . '
');
}