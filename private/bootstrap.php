<?php

define("PROJECT_NAME","Battery Tracker");
define("PRIVATE_PATH",dirname(__FILE__).'/');
define("PUBLIC_PATH",getcwd()."/");
define("INCLUDES",PRIVATE_PATH.'includes/');
define("PAGES",INCLUDES.'pages/');


// require_once('functions.php');
require_once('db_credentials.php');
require_once('db_functions.php');

function my_autoloader($class) {
  $filename = PRIVATE_PATH.'classes/' . $class . '.class.php';
  if(file_exists($filename)) {
    require($filename);
  }
}
spl_autoload_register('my_autoloader');

$database = db_connect();
Battery::set_database($database);
