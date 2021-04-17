<?php
use PHPUnit\Framework\TestCase;

// Load all clases.
$all_tests = [];
include 'check/init.inc';

// Get test Id.
if($argc == 1) {
  $test_id = NULL;
}
else {
  $test_id = $argv[1];
};

// Hello message.
print "**********************************".PHP_EOL;
if($test_id == NULL) {
  $message = '* Controle de tous les exercices *';
  print $message . PHP_EOL;
}
else {
  $message = '* Controle de l\'exercice kata_' . $test_id . ' *';
  print $message . PHP_EOL;
}
print "**********************************".PHP_EOL;

// Run tests.
if($test_id != NULL) {
  $class_name = 'check_'.$test_id;
  $test = new $class_name();
  $test->check();
}
else {
  foreach($all_tests as $class_name) {
    $test = new $class_name();
    $test->check();
  }
}

// End message
print "*******".PHP_EOL;
print "* FIN *" . PHP_EOL;
print "*******".PHP_EOL;
exit;

