<?php
/*----------------------------------------------
Adapters Gives you ability to override basic core classes as View, Response, etc..

in same case, this feature gives you ability to override also external packages classes

The framework, for semplicity comes with some dafult override preset to customize.

-----------------------------------------------*/

return [
    /*----------------------------------------------

    The model, is not intended as Database Model, but a simple collector class
    that implements some useful methods
    The model adaper is used inside model(name,[array of data]) function only
    Internally the system uses ever the Limkie\Model, so feel free to change this

    The new App\Model class will be available

    -----------------------------------------------*/
    'model'         => App\Adapter\Model::class,

    /*----------------------------------------------

    the view will sent to this adapter

    Remenber: the adapter MUST implement the method render, that will be called from application
    with viewPathFile ad array of args 
    myAdapter::render(file,[...args])

    The new App\View class will be available

    -----------------------------------------------*/
    'view'          => App\Adapter\View::class,

    /*----------------------------------------------

    The storage adaper is used inside controller(...) function only
    Internally the system uses ever the Limkie\Http\Controller, so feel free to change this

    The new App\Http\Controller class will be available

    -----------------------------------------------*/
    'controller'    => App\Adapter\Http\Controller::class,
 
    /*----------------------------------------------

    The response Adapter is used as a response.
    Internally the system uses ever the Limkie\Http\Response, so feel free to change this

    The new App\Http\Response class will be available

    -----------------------------------------------*/
    'response'      =>  App\Adapter\Http\Response::class,

    /*----------------------------------------------

    The storage adaper is used inside storage(...) function only
    Internally the system uses ever the Limkie\Storage, so feel free to change this

    The new App\Storage class will be available

    -----------------------------------------------*/
    'storage'       => App\Adapter\Storage::class,

    'database'  => [
        /*----------------------------------------------

        create your own database adpter and link them to the respective type

            E.g: 
            'couchBase' => App\Adapter\DataBase\couchBaseClassName::class

            Then declare your database connection in config/database.php as

            [
                'adapter'=>'couchBase',
                'bar'=>'foo',
                ...
            ]
        
        -----------------------------------------------*/
        'mysql'     =>App\Adapter\Database\Mysql::class,

        'postgre'   =>App\Adapter\Database\PostgreSql::class,
        
        'sqlite'    =>App\Adapter\Database\SqLite::class,

    ],
];

