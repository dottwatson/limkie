<?php
namespace Modules\StorageLink\Model;

use limkie\Model;


/**
 * The StorageLink
 */
class StorageLink extends Model{
    protected $code;
    protected $filename;
    protected $storage;

    /**
     * Instantiane model based on the file
     *
     * @param string $filename
     */
    public function __construct(string $filename){
        $this->code = basename($filename,'.json');
        $data       = json_decode(file_get_contents($filename),true);

        parent::__construct($data);

        $this->filename = $filename;

        $this->storage = module('StorageLink')->getStorage();
    }


    /**
     * Return the link Url
     *
     * @return string
     */
    public function getUrl(){
        $routePath = configModule('StorageLink','settings.route');

        return get_url(sprintf($routePath,$this->code));
    }

    /**
     * return the code
     *
     * @return string
     */
    public function getCode(){
        return $this->code;
    }

    /**
     * Check if expired based on attemps ad ttl
     *
     * @return boolean
     */
    public function isExpired(){
        $ttlExpired         = ($this->get('expire',0) < time());
        $attempsExpired     = (!is_null($this->get('attemps')))
            ?$this->get('attemps') < 1
            :false;
        
        return ($ttlExpired || $attempsExpired)?true:false;
    }

    /**
     * remove attemps from file
     *
     * @param integer $num
     * @return self
     */
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