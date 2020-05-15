<?php 
use Limkie\App;

define('__APP_PATH__',realpath(__DIR__));
define('__APP_LIB_PATH__',__APP_PATH__.'/lib');
define('__APP_CONFIG_PATH__',__APP_PATH__.'/config');

include __APP_PATH__.'/vendor/autoload.php';

//start session
session_start();

/* Prevent XSS input */
$_GET       = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
$_POST      = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
$_REQUEST   = (array)$_POST + (array)$_GET + (array)$_REQUEST;


$app = new App;


