<?php

/*
    All functionality of form inputs
*/
class Input {

    /*
        check if input is set by browsing webpage
    */
    public static function exists($type =  'post'){
        switch ($type){
            case 'post':
                return (!empty($_POST)) ? true : false;
            break;
            case 'get':
                return (!empty($_GET)) ? true : false;
            break;
            default:
                return false;
            break;
        }
    }
    


    /*
        get the input values both GET and POST type input
    */
    public static function get($item){
        
        if(isset($_POST[$item])){
            return SANATIZE::escape($_POST[$item]);
        }
        else if(isset($_GET[$item])){
            return SANATIZE::escape($_GET[$item]);
        }
        
        return null;
    }

}
