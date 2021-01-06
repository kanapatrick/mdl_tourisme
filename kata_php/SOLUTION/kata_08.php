<?php

# L5

# Write a function that, when given a list of elements, will return the "last survivor".
#
# Basically you have to assume that n people are put into a circle and that they are eliminated in steps of k elements, like this:
# solution_kata_08(7,3) => means 7 people in a circle;
# one every 3 (step) is eliminated until one remains
# [1,2,3,4,5,6,7] - initial sequence (list)
# [1,2,4,5,6,7] => 3 is counted out
# [1,2,4,5,7] => 6 is counted out
# [1,4,5,7] => 2 is counted out
# [1,4,5] => 7 is counted out
# [1,4] => 5 is counted out
# [4] => 1 counted out, 4 is the last element - the survivor!

# Another example:
# solution_kata_08(5,2) => means 5 people in a circle;
# one every 2 (step) is eliminated until one remains
# [1,2,3,4,5] - initial sequence (list)
# [1,3,4,5] => 2 is counted out
# [1,3,5] => 4 is counted out
# [3,5] => 1 is counted out
# [3] => 5 counted out, 3 is the last element - the survivor!

function solution_kata_08($list, $step) {

  $items = range(1,$list, 1);

    while(TRUE){
      if(count($items) <= 1) {
        return array_pop($items);
      }

      if(count($items) < $step) {

        $new_list = array_merge($items,$items);
        while(count($new_list) < $step) {
          $new_list = array_merge($new_list,$items);
        }

        $out = $new_list[$step - 1];
        $key = array_search($out, $items);
        $items = reform_chain($items, $key+1);
      }
      else {
        $items = reform_chain($items, $step);
      }
    }
}

function reform_chain($list, $step) {

  $new_starting = array_slice($list, $step);
  $new_end = array_slice($list, 0, $step - 1);
  $items = array_merge($new_starting, $new_end);
  return $items;
}
