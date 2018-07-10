<?php

/*
    get the configuration we setup in $GLOBALS array
*/
class Config {

/*
    This get() function is used to separate the tree element,search and return the 
    desired element in $GLOBALS array which is declared in init.php file
    the parameter is like "mysql/host" and return the element of $GLOBALS['config']['mysql']['host']
*/
    public static function get($path = null){
        if($path){
            $config = $GLOBALS['config'];
            $path = explode('/', $path);
            foreach ($path as $bit ){
                if(isset($config[$bit])){
                    $config = $config[$bit];
                }
            }
            return $config;
        }
    }
}
