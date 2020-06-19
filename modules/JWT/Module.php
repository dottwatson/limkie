<?php

    namespace Modules\JWT;
    
    use Limkie\Module as CoreModule;

    /**
     *  Module JWT
     *  Created on 2020-06-19 11:53:37 using console
     */
    class Module extends CoreModule{
    
        public function __construct(){
            parent::__construct();

            $this->importConfig();
            $this->importGates();
            //other stuff
        }

        //code here
    }
    