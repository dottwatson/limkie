<?php

use Limkie\Route;
use Limkie\Http\Request;
use Limkie\Http\Response;



$routePath = sprintf(configModule('StorageDownload','settings.route'),'{code}');

Limkie\Route::get(sprintf($routePath,'{code}'),function($code){
    
    $moduleInstance = app()->module('StorageDownload');
    $storage        = $moduleInstance->getStorage();
    $response       = new Response();

    if($storage->isFile($code.'.json')){
        $info = $moduleInstance->model('StorageLink',$storage->getFullPath($code.'.json'));

        if($info->isValidFile() && !$info->isExpired()){
            $filePath = $info->get('file');
            $fileName = $info->get('name',basename($filePath));

            $info->discardAttemps(1);
            return $response->download($filePath,$fileName);
        }

        return $response->setStatus(404);
    }
});
