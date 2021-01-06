<?php

class check_06 extends KataChecker {

  public $script = "kata_06";
  public $data = [
    [
      'expected' => 12,
      'params' => [[5, 3, 4], 1]
    ],
    [
      'expected' => 10,
      'params' => [[10, 2, 3, 3], 2]
    ],
    [
      'expected' => 12,
      'params' => [[2, 3, 10], 2]
    ],
    [
      'expected' => 0,
      'params' => [[], 1]
    ],
    [
      'expected' => 10,
      'params' => [[1, 2, 3, 4], 1]
    ],
    [
      'expected' => 9,
      'params' => [[2, 2, 3, 3, 4, 4], 2]
    ],
    [
      'expected' => 5,
      'params' => [[1, 2, 3, 4, 5], 100]
    ],
  ];

}
