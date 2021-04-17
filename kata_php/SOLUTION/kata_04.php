<?php

# L7

# Your task is to make a function that can take any non-negative integer as a argument and return it with its digits in descending order.
# Essentially, rearrange the digits to create the highest possible number.
#
# Examples:
# Input: 21445 Output: 54421
#
# Input: 145263 Output: 654321
#
# Input: 123456789 Output: 987654321

function solution_kata_04($number) {
    $str = strval($number);
    $arr = str_split($str, 1);
    rsort($arr);
    $imp = implode('', $arr);
    return intval($imp);
}
