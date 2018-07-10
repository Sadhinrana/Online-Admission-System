<?php

//start the sesson
session_start();


//this global array is for database quering
$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => '127.0.0.1',
        'username' => 'root',
        'password' => '123',
        'db' => 'justadmission'
    ),
    'remember' => array(
        'cookie_name' => '__jacookie',
        'coockie_expiry' => 604800
    ),
    'session' => array(
        'session_name' => 'user',
        'admin_session_name' => 'admin',
        'token_name' => 'token'
    )
);


function stack_2145($className)
{
    $exists = false;
   

    // check controllers directory for the class file 
    $classFile =  SITE_PATH.'/app/controllers/'. $className . '_controller.php';
    $exists = file_exists($classFile);


    
    // check core directory for the class file if cannot find any other directory
    if( $exists == false ){
        $classFile =  SITE_PATH.'/app/core/'. $className . '.php';
        $exists = file_exists($classFile);
    }

    // check database directory for the class file if cannot find any other directory
    if( $exists == false ){
        $classFile =  SITE_PATH.'/app/database/'. $className . '.php';
        $exists = file_exists($classFile);
    }

        // check helpers directory for the class file if cannot find any other directory
    if( $exists == false ){
        $classFile =  SITE_PATH.'/app/helpers/'. $className . '.php';
        $exists = file_exists($classFile);
    }

    // check models directory for the class file if cannot find any other directory
    if( $exists == false ){
        $classFile =  SITE_PATH.'/app/models/'. $className . '_model.php';
        $exists = file_exists($classFile);
    }

     // check libs directory for the class file if cannot find any other directory
    if( $exists == false ){
        $classFile =  SITE_PATH.'/app/libs/'. $className . '.php';
        $exists = file_exists($classFile);
    }

    // require the class file
    if($exists){
       require_once($classFile); 
    }else{
        /* Error Generation Code Here */
    } 

}
spl_autoload_register("stack_2145");


//require the google recaptcha file
require_once(SITE_PATH."/app/helpers/recaptchalib.php");


if( Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))  ){
    
    $hash = Cookie::get(Config::get('remember/cookie_name'));
    $hashCheck = DB::getInstance()->get('users_session', array('hash', '=', $hash) );
    
    if($hashCheck->count()){
        $user = new Users($hashCheck->first()->user_id);
        $user->login();
    }
    
}


?>