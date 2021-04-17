<?php

class check_05 extends KataChecker {

  public $script = "kata_05";
  public $data = [
    [
      'expected' => 0,
      'params' => ["abcde"]
    ],
    [
      'expected' => 2,
      'params' => ["aabbcde"]
    ],
    [
      'expected' => 2,
      'params' => ["aabBcde"]
    ],
    [
      'expected' => 1,
      'params' => ["indivisibility"]
    ],
    [
      'expected' => 2,
      'params' => ["Indivisibilities"]
    ],
    [
      'expected' => 2,
      'params' => ["aA11"]
    ],
    [
      'expected' => 2,
      'params' => ["ABBA"]
    ],
  ];

}
