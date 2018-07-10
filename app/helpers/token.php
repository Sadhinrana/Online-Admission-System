<?php

/*
    Token is used for checking if requests are from webpage or direct from url input
*/
class Token {

    //generate random unique token
    public static function generate(){
        return Session::put(Config::get('session/token_name'), md5(uniqid()));
    }
    

    //check if Session token exists
    public static function check($token){
        
        $tokenName = Config::get('session/token_name');
        
        if( Session::exists($tokenName) && $token === Session::get($tokenName) ){
            Session::delete($tokenName);
            return true;
        }

        return false;
    }

}

