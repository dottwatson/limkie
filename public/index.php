<?php
include __DIR__.'/../loader.php';
include __DIR__.'/../app/bootstrap.php';

use Limkie\Route;

//finally call the init
$app->init();

Route::dispatch();


// use App\Model\TestModel;

// $x = new TestModel;

// var_dump($x->pippo);


// $storage = storage('var');

// var_dump($storage);

//var_dump($storage);

// var_dump($storage->isFile('tmp/test.txt'));

// $storage->moveTo('tmp');

// OK
// $storage->createDir('ciccio/palla/destory');

// OK
// $storage->createFile('ciccione/pallone/destorione/babele.txt','Ma come sei messo!!!!');

// $storage->deleteFile('ciccione/pallone/destorione/babele.txt');



//OK
//(new Response)->json(['bar'=>'foo']);

//OK
//(new Response)->download('Modifiche sito.docx','ciccio.docx');

//OK
//echo '<pre>';
//var_dump(Request::url());