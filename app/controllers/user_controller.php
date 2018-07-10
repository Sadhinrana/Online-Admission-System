<?php

class user extends Controller{

	function __construct() {
        parent::__construct(); 
    }

    public function index(){
        return miscellaneous::Error();
    }

    public function profile(){
    	$user  = new Users();
		if($user->isLoggedIn()){
			$this->view->render("user/profile/index");
		}
		else{
    		return miscellaneous::Error();
    	}
    }

}