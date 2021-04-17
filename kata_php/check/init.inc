<?php

// Autoloader + reference all tests
$all_tests = [];
$scan = scandir('check/classes');
foreach ($scan as $class) {
  if (strpos($class, '.inc') !== false) {
    include_once('check/classes/' . $class);

    if($class != 'KataChecker.inc') {
      $all_tests[] = str_replace('.inc','',$class);
    }
  }
}
