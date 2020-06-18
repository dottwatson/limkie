<?php

return [
    
    //used in production
    'PRODUCTION'=>[
        'debug'=>[
            'enabled'   => true, //enable debugging
            'bar'       => false, //shoip the info bar on each view
            'maxDepth'  => 3, //the max depth of an array is dumped
            'maxLength' => 150, // max lenght of a text when dumped
            'error' => [
                'level' => E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED, //Php error level alerted
            ],
            'log' =>[
                'severity' => E_NOTICE | E_WARNING, // severity of erros will be logged
            ],
            'notify' => 'developer@localhost', //if error occours, notify to this email
        ],

        'view' =>[
            'cache' => true, //enable caching 
        ],
        'routes'=>['web','api'], // routes loaded in app/Http/Route
        'modules'=>['StorageDownload'], // witch modules are loaded in this environment

        //other stuff here

    ],

    // used in beta or customer preview
    'STAGING'=>[
        'debug'=>[
            'enabled'   => true, //enable debugging
            'bar'       => false, //shoip the info bar on each view
            'maxDepth'  => 3, //the max depth of an array is dumped
            'maxLength' => 150, // max lenght of a text when dumped
            'error' => [
                'level' => E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED, //Php error level alerted
            ],
            'log' =>[
                'severity' => E_NOTICE | E_WARNING, // severity of erros will be logged
            ],
            'notify' => 'developer@localhost', //if error occours, notify to this email
        ],

        'view' =>[
            'cache' => true, //enable caching 
        ],
        'routes'=>['web','api'], // routes loaded in app/Http/Route
        'modules'=>['StorageDownload'], // witch modules are loaded in this environment

        //other stuff here
    ],

    //used during development
    'DEVELOPMENT'=>[
        'debug'=>[
            'enabled'   => true,
            'bar'       => true,
            'maxDepth'  => 10,
            'maxLength' => 150,
            'error' => [
                'level' => E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED,
            ],
            'log' =>[
                'severity' => E_NOTICE | E_WARNING,
            ],
            'notify' => null,
        ],

        'view' =>[
            'cache' => false,
        ],

        'modules'=>['StorageDownload'], // witch modules are loaded in this environment
        'routes'=>['web','api','test'],
    
        //other stuff here
    ],
    

];