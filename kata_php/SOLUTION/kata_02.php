<?php

# L8

# You will be given an vector of string(s). You must sort it alphabetically (case-sensitive!!) and then return the first value.
# The returned value must be a string, and have "***" between each of its letters.
# You should not remove or add elements from/to the array.

function solution_kata_02($list) {
    sort($list);
    $first = $list[0];
    $len = strlen($first);
    $result = "";
    for ($i = 0; $i < $len-1; $i++) {
        $result .= $first[$i];
        $result .= '***';
    }
    $result .= $first[$len-1];
    return $result;
}

/*
function solution_kata_02($list) {
  sort($list);
  $first = $list[0];
  return implode('***', str_split($truc));
}
*/
