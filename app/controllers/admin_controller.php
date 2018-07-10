<?php

class admin extends Controller{

	function __construct() {
        parent::__construct(); 
    }

    public function index(){
		$this->view->render("admin/index");
	}    

	public function login(){
		$this->view->render("admin/login/index");
	}

	public function loginProcess(){

		//check if the run request from submition form
        if( Input::exists('post') ){

            //check if form loaded propely
            if( Token::check(Input::get('token')) ){
                if( $this->model->login() ){
                    header("Location: ".SITE_URL.'/admin');
                }
                else{
                    Session::flush('error-login',Messages::login_unsuccess());
                    header("Location: ".SITE_URL."/admin/login");
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

    public function paymentupdate(){
        $id = $_POST['id'];

        $res = $this->model->paymentupdate($id);

        echo json_encode($res);
    }


}