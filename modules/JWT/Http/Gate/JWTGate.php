<?php
namespace Modules\JWT\Http\Gate;

use Limkie\Http\Gate;
use Firebase\JWT\JWT;


class JWTGate extends Gate{

    protected $alias = 'jwt';

    public function handle(){
        $payload = $this->request->header('Authorization');

        if(!$payload){
            return false;
        }

        $payload        = str_replace('Bearer ','',$payload);
        
        JWT::$leeway    = configModule('JWT','settings.leeway');;
        $key            = configModule('JWT','settings.key');
        $algorithm      = configModule('JWT','settings.encoding_type');
        $jwtData        = JWT::decode($payload,$key,$algorithm);

        if(!$jwtData){
            return false;
        }

        return $this->validateTokenData($jwtData);
    }


    public function validateTokenData($jwtData){
        //code here for validating token

        //return true/false or other stuff 
    }

}

?>