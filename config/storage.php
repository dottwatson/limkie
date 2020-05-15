<?php


return [
    'app'       =>path('storage/app'),
    'public'    =>path('public'),
    'modules'   =>path(getEnv('MODULES_DIR')),
    'var'       =>path('var'),
    'tmp'       =>path(getEnv('TMP_DIR')),
    'logs'      =>path(getEnv('LOGS_DIR')),
    'cache'     =>path(getEnv('CACHE_DIR')),
];