<?php

class check_02 extends KataChecker {

  public $script = "kata_02";
  public $data = [
    [
      'expected' => "b***i***t***c***o***i***n",
      'params' => [
        ["bitcoin", "take", "over", "the", "world", "maybe", "who", "knows", "perhaps"]
      ]
    ],
    [
      'expected' => "a***r***e",
      'params' => [
        ["turns", "out", "random", "test", "cases", "are", "easier", "than", "writing", "out", "basic", "ones"]
      ]
    ],
    [
      'expected' => "a***b***o***u***t",
      'params' => [
        ["lets", "talk", "about", "javascript", "the", "best", "language"]
      ]
    ],
    [
      'expected' => "c***o***d***e",
      'params' => [
        ["i", "want", "to", "travel", "the", "world", "writing", "code", "one", "day"]
      ]
    ],
    [
      'expected' => "L***e***t***s",
      'params' => [
        ["Lets", "all", "go", "on", "holiday", "somewhere", "very", "cold"]
      ]
    ],
  ];

}
