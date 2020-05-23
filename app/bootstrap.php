<?php 
//put boostrap code here

app()->on('init',function(){
    Limkie\Route::gate('pippo',function($args){
        var_dump($args);
        return response('called pippo');
    });
});



?>