<?php

class check_03 extends KataChecker {

  public $script = "kata_03";
  public $data = [
    [
      'expected' => "www.eurelis.com",
      'params' => ['www.eurelis.com#about']
    ],
    [
      'expected' => "www.eurelis.com?page=1",
      'params' => ['www.eurelis.com?page=1']
    ],
    [
      'expected' => "http://www.uol.com.br",
      'params' => ['http://www.uol.com.br#teste']
    ],
    [
      'expected' => "www.ig.com.br",
      'params' => ["www.ig.com.br"]
    ],
    [
      'expected' => "www.naoexiste.com",
      'params' => ['www.naoexiste.com#naoexiste']
    ],
    [
      'expected' => "abc",
      'params' => ['abc#d']
    ],
    [
      'expected' => "www.attser.com",
      'params' => ['www.attser.com']
    ],
    [
      'expected' => "www.indio.com",
      'params' => ['www.indio.com#flecha']
    ],
  ];

}

