<?php
include __DIR__.'/../loader.php';
include __DIR__.'/../app/bootstrap.php';

use Limkie\Route;

//finally call the init
$app->init();

Route::dispatch();
