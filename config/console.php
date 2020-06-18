<?php

return [

    'commands'=>[
        'create:model'          =>Limkie\Console\Command\Create\Model::class,      // create a new generic model
        'create:controller'     =>Limkie\Console\Command\Create\Controller::class, //create a controller
        'create:response'       =>Limkie\Console\Command\Create\Response::class, // create a new response type
        'create:module'         =>Limkie\Console\Command\Create\Module::class, // create a new response type
        'create:command'        =>Limkie\Console\Command\Create\Command::class, // create a new command
        'maintenance:on'        =>Limkie\Console\Command\Maintenance\On::class,       //turn on the maintenance mode
        'maintenance:off'       =>Limkie\Console\Command\Maintenance\Off::class,       //turn off the maintenance mode
        'vendor:publish'        =>Limkie\Console\Command\Vendor\Publish::class,
        'helloworld'            =>app\Command\HelloWorld::class
    ]
];