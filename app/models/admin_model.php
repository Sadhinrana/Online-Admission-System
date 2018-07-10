<?php

class admin_model extends Model{

	function __construct() {
        parent::__construct();
    }

    public function login(){
    	$this->user = new admins();
    
 
        $login = SANATIZE::escape($_POST['name']);
        $password = SANATIZE::escape($_POST['password']); 
       
        $login = $this->user->login($login, $password);
            
        return $login;
    }

     public function logout(){
        $user = new admins();
        $user->logout();
        header("Location: ".SITE_URL."/admin");
    }     

    public function paymentupdate($id = null){
        
        if($id){
            $this->user = new admins();
            return $this->user->paymentUpdate($id);
        }   
        else{
            return 'Insert id'; 
        }

    }

}