<?php


/*
    
*/
class Session {

    public static function exists($name){
        if(isset($_SESSION[$name])){
            return true;
        }
        else{
            return false;
        }
    }
    
    public static function delete($name){
        if(self::exists($name)){
            unset($_SESSION[$name]);
        }
    }
    
    public static function get($name){
        return $_SESSION[$name];
    }    

    public static function getDel($name){
       
            $session = self::get($name);
            self::delete($name);
            return $session;
     
    }
    
    public static function put($name, $value){
        return $_SESSION[$name] = $value;
    }
    
    public static function flush($name, $string = ''){
        if(self::exists($name)){
            $session = self::get($name);
            self::delete($name);
            return $session;
        }
        else{
            self::put($name, $string);
        }
    }

}

