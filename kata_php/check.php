<?php
use PHPUnit\Framework\TestCase;

include 'kata_01.php';
include 'kata_02.php';
include 'kata_03.php';
include 'kata_04.php';
include 'kata_05.php';
include 'kata_06.php';


function custom_assert($expected, $result) {
    $bool = ($expected == $result);
    if($bool) {
        $message = "\e[0;30;42m OK \e[0m" . " - Result [" . $result . "]";
    } else {
        $message = "\e[1;37;41m KO \e[0m" . " - Expected [" . $expected . "] but got [" . $result . "]";
    }
    echo $message . PHP_EOL;
}

custom_assert("dlrow", solution_kata_01("world"));
custom_assert("olleh", solution_kata_01("hello"));
custom_assert("", solution_kata_01(""));
custom_assert('h', solution_kata_01("h"));

custom_assert('b***i***t***c***o***i***n', solution_kata_02(["bitcoin", "take", "over", "the", "world", "maybe", "who", "knows", "perhaps"]));
custom_assert('a***r***e', solution_kata_02(["turns", "out", "random", "test", "cases", "are", "easier", "than", "writing", "out", "basic", "ones"])); 
custom_assert('a***b***o***u***t', solution_kata_02(["lets", "talk", "about", "javascript", "the", "best", "language"])); 
custom_assert('c***o***d***e', solution_kata_02(["i", "want", "to", "travel", "the", "world", "writing", "code", "one", "day"])); 
custom_assert('L***e***t***s', solution_kata_02(["Lets", "all", "go", "on", "holiday", "somewhere", "very", "cold"])); 

custom_assert('www.eurelis.com', solution_kata_03('www.eurelis.com#about'));
custom_assert('www.eurelis.com?page=1', solution_kata_03('www.eurelis.com?page=1'));
custom_assert("http://www.uol.com.br", solution_kata_03("http://www.uol.com.br#teste"));
custom_assert("www.ig.com.br",solution_kata_03("www.ig.com.br"));
custom_assert("www.naoexiste.com",solution_kata_03("www.naoexiste.com#naoexiste"));
custom_assert("abc",solution_kata_03("abc#d"));
custom_assert("www.attser.com",solution_kata_03("www.attser.com"));
custom_assert("www.indio.com",solution_kata_03("www.indio.com#flecha"));

custom_assert(0, solution_kata_04(0));
custom_assert(1, solution_kata_04(1));
custom_assert(51, solution_kata_04(15));
custom_assert(2110, solution_kata_04(1021));
custom_assert(987654321, solution_kata_04(123456789));

custom_assert(0, solution_kata_05("abcde"));
custom_assert(2, solution_kata_05("aabbcde"));
custom_assert(2, solution_kata_05("aabBcde"));
custom_assert(1, solution_kata_05("indivisibility"));
custom_assert(2, solution_kata_05("Indivisibilities"));
custom_assert(2, solution_kata_05("aA11"));
custom_assert(2, solution_kata_05("ABBA"));

custom_assert(12, solution_kata_06([5, 3, 4], 1));
custom_assert(10, solution_kata_06([10, 2, 3, 3], 2));
custom_assert(12, solution_kata_06([2, 3, 10], 2));
custom_assert(0, solution_kata_06([], 1));
custom_assert(10, solution_kata_06([1, 2, 3, 4], 1));
custom_assert(9, solution_kata_06([2, 2, 3, 3, 4, 4], 2));
custom_assert(5, solution_kata_06([1, 2, 3, 4, 5], 100));

