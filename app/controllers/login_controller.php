<?php

/*
* 
*/

class login extends Controller{
	
	function __construct() {
        parent::__construct(); 
    }

    //the base index function of login controller
    public function index(){
    	$this->view->render("login/index");
    }


    //run the login process
    public function run(){


        //check if the run request from submition form
        if( Input::exists('post') ){

            //check if form loaded propely
            if( Token::check(Input::get('token')) ){
                if( $this->model->process() ){
                    header("Location: ".SITE_URL);
                }
                else{
                    Session::flush('error-login',Messages::login_unsuccess());
                    header("Location: ".SITE_URL."/login");
                }
            }
            else{
                return miscellaneous::Error();
            }
        }
        else{
            return miscellaneous::Error();
        }

    }


    public function logout(){
        miscellaneous::deleteApplySeesion();
        $this->model->logout();
    }
    
	
}