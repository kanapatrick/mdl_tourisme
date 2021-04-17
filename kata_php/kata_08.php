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
    //
    // Your code here
    //
    return;
}
