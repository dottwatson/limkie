<?php
namespace Modules\StorageDownload\Model;

use limkie\Model;

class Download extends Model{
    protected $code;
    protected $filename;
    protected $storage;

    public function __construct($filename){
        $this->code = basename($filename,'.json');
        $data       = json_decode(file_get_contents($filename),true);

        parent::__construct($data);

        $this->filename = $filename;

        $this->storage = module('StorageDownload')->getStorage();
    }


    public function getUrl(){
        $routePath = configModule('StorageDownload','settings.route');

        return get_url(sprintf($routePath,$this->code));
    }

    public function getCode(){
        return $this->code;
    }

    public function isExpired(){
        $ttlExpired         = ($this->get('expire',0) < time());
        $attempsExpired     = (!is_null($this->get('attemps')))
            ?$this->get('attemps') < 1
            :false;
        
        // dumpe($ttlExpired,$attempsExpired);

        return ($ttlExpired || $attempsExpired)?true:false;
    }

    public function discardAttemps(int $num=1){
        $attemps = $this->get('attemps');
        
        if(!is_null($attemps)){
            $data               = $this->all();
            $data['attemps']   -= $num;
            $data               = json_encode($data,JSON_PRETTY_PRINT);

            file_put_contents($this->filename,$data,LOCK_EX);

            $this->__construct($this->filename);
        }


        return $this;
    }

    /**
     * Returns if is possible to serve file
     *
     * @return boolean
     */
    public function isValidFile(){
        $file = $this->get('file');

        return (is_file($file) && is_readable($file));
    }

}