<?php

namespace Modules\StorageLink;

use Limkie\Module as CoreModule;
use Limkie\Storage;

/**
 *  Module StorageLink
 *  This module gives you the ability to create temporay links where to download storage resources.
 *  Created on 2020-06-18 10:21:37 using console
 */
class Module extends CoreModule{

    protected $storage;
    protected $ttl;

    /**
     * initialize the module, instantiate the links storage and other stuff
     */
    public function __construct(){
        parent::__construct();

        $this->registerConfig();
        $this->registerRoutes();

        $clsName = static::class;

        //register the garbage collector on startup
        app()->on('init',function() use ($clsName){
            $clsName::garbageCleaner();
        });

        $linksPath  = configModule(static::name(),'settings.path');
        $storage    = new Storage($linksPath);

        if(!$storage->isDir('links')){
            $storage->createDir('links');
        }

        $storage->moveTo('links');

        $this->storage  = $storage;
        $this->ttl      = configModule(static::name(),'settings.ttl');
    }


    /**
     * Generate the download url
     *
     * @param string $filePath the full quilified path
     * @param integer $duration if null, the default ttl is used
     * @param string $downloadName the download file name. If null the original file name will be used
     * @return string|false
     */
    public function getPublicLink(string $filePath,int $ttl=null,array $settings = []){
        if(is_file($filePath)){
            
            $code   = md5($filePath);
            $ttl    = (is_null($ttl))?$this->ttl:$ttl;
            $data   = [
                'file'      =>$filePath,
                'name'      =>isset($settings['name'])?(string)$settings['name']:null,
                'attemps'   =>isset($settings['attemps'])?(int)$settings['attemps']:null,
                'expire'    =>time()+$ttl
            ];

            $jsonName = md5($code);
            $this->storage->createFile("{$jsonName}.json",json_encode($data,JSON_PRETTY_PRINT)); 

            $routePath = configModule(static::name(),'settings.route');

            return get_url(sprintf($routePath,$jsonName));
        }
        
        return false;
    }

    /**
     * Return links storage
     *
     * @return Storage
     */
    public function getStorage(){
        return $this->storage;
    }

    /**
     * Remove exipred published files links
     *
     * @return void
     */
    public static function garbageCleaner(){
        $moduleInstance = app()->module('StorageLink');
        $storage        = $moduleInstance->getStorage();
        $links          = $storage->list();

        foreach($links as $link){
            $info = $moduleInstance->model('StorageLink',[$link]);
            if($info->isExpired()){
                $storage->deleteFile($link);
            }
        }
    }



}
    