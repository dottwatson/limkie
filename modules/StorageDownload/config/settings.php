<?php

return [
    'ttl'   => 300,
    'route' =>'file:%s',
    'path'  =>path(getEnv('TMP_DIR'))
];