<?php

return [
    'PRODUCTION'=>[
        'debug'=>[
            'enabled'   => true,
            'bar'       => false,
            'maxDepth'  => 3,
            'maxLength' => 150,
            'error' => [
                'level' => E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED,
            ],
            'log' =>[
                'severity' => E_NOTICE | E_WARNING,
            ],
            'notify' => 'developer@localhost',
        ],

        'view' =>[
            'cache' => true,
        ],
        'routes'=>['web','api'],
    ],

    'DEVELOPMENT'=>[
        'debug'=>[
            'enabled'   => true,
            'bar'       => true,
            'maxDepth'  => 3,
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

        'modules'=>['example'],
        'routes'=>['web','api','test'],
    ],

];