<?php

namespace Modules\JWT\Http\Response;

use app\Adapter\Http\Response;
use \Firebase\JWT\JWT;

class JWTResponse extends Response{


    public function withWJT($payload){
        JWT::$leeway    = configModule('JWT','settings.leeway');;
        $key            = configModule('JWT','settings.key');
        $algorithm      = configModule('JWT','settings.encoding_type');
        $jwtCode        = JWT::encode($payload,$key,$algorithm);

        $this->setHeader('Authorization', $jwtCode);
    }

}