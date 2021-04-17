<?php

class check_01 extends KataChecker {

  public $script = "kata_01";
  public $data = [
    [
      'expected' => "dlrow",
      'params' => ["world"]
    ],
    [
      'expected' => "olleh",
      'params' => ["hello"]
    ],
    [
      'expected' => "",
      'params' => [""]
    ],
    [
      'expected' => "h",
      'params' => ["h"]
    ],
  ];

}
