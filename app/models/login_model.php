<?php

class login_model extends Model{

	function __construct() {
        parent::__construct();
    }

    public function process(){

        $this->user = new Users();
        
        $remember = false;

        if( isset($_POST['remember']) && $_POST['remember'] == 'on' ) {
            $remember = true;
        }
 
        $login = SANATIZE::escape($_POST['log-id']);
        $password = SANATIZE::escape($_POST['log-password']); 
       
        $login = $this->user->login($login, $password, $remember);
            
        return $login;
    }

    public function logout(){
        $user = new Users();
        $user->logout();
        header("Location: ".SITE_URL."/login");
    }

}