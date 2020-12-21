<?php

# L7

# Complete the function/method so that it returns the url with anything after the anchor (#) removed.
#
# solution_kata_03('www.eurelis.com#about')
# returns 'www.eurelis.com'
# 
# solution_kata_03('www.eurelis.com?page=1') 
# returns 'www.eurelis.com?page=1' 

function solution_kata_03($str) {
    $pos = strpos($str, '#');
    if($pos !== false)
        return substr($str, 0, $pos);
    return $str;
}
