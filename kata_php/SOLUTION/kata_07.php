<?php

# L5

# Write a function that, when given a string, will return an uppercase string with each letter shifted forward in the alphabet by however many spots the cipher was initialized to.
#
# If something in the string is not in the alphabet (e.g. punctuation, spaces), simply leave it as is.
# The shift will always be in range of [1, 26].
#
# For example:
# solution_kata_07(5, 'WAFFLES'); // returns 'BFKKQJX'


function solution_kata_07($shift, $string) {

  $out = [];
    $letters = str_split($string, 1);
    foreach($letters as $letter){
      $out[] = letter_shift($shift, $letter);
    }

    return strtoupper(implode('', $out));
}

function letter_shift($shift, $letter) {

  $ord = ord($letter);
  $relative = $ord - 65; // 65 is the ord of A
  $new_relative = ($relative + $shift)%26;
  $new_letter = chr($new_relative +65);
  return $new_letter;
}