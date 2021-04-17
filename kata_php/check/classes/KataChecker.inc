<?php
class KataChecker {
  public $script;
  public $data;

  public function check() {

    print "*************************".PHP_EOL;
    print "* Validation du " .$this->script. " *" . PHP_EOL;
    print "*************************".PHP_EOL;

    include_once './'.$this->script.'.php';
    $error = FALSE;
    foreach($this->data as $key => $test) {

      print "Test N°" . ($key+1) . ' : ';

      $result = call_user_func_array("solution_".$this->script, $test['params']);
      $bool = ($test['expected'] == $result);

      if($bool) {
        $message = "\e[0;30;42m OK \e[0m" . " - Result [" . $result . "]";
      } else {
        $message = "\e[1;37;41m KO \e[0m" . " - Expected [" . $test['expected'] . "] but got [" . $result . "]";
        $error = TRUE;
      }
      print $message . PHP_EOL;
      if($error == TRUE) {
        break;
      }
    }

    if($error === TRUE) {
      print "************************".PHP_EOL;
      print "* "."\e[1;37;41m ".$this->script." Non Validé \e[0m" ." *" . PHP_EOL;
      print "************************".PHP_EOL;
    }
    else {
      print "********************".PHP_EOL;
      print "* "."\e[0;30;42m ".$this->script." Validé \e[0m" ." *" . PHP_EOL;
      print "********************".PHP_EOL;
    }



  }
}