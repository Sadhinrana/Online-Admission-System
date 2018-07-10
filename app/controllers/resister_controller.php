<?php

/*
* 
*/

class resister extends Controller{
	
	function __construct() {
        parent::__construct(); 
    }

    //the base index function of error controller
    public function index(){
    	$this->view->render("resister/index");
    }

    //run the resistration process
  	public function run(){

  		//check if the run request from submition form
  		if( Input::exists('post') ){

  			//check if form loaded propely
  			if( Token::check(Input::get('token')) ){
  				  
            //processing resistration and catch exception
            if( $this->model->process() ){
               Session::flush('resSuccess',Messages::res_success());
               header("Location: ".SITE_URL."/login");
            }
            else{
               echo Messages::res_unsuccess();
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

    public function checkUserID(){
          
        if(!isset($_REQUEST['fieldValue']) || !isset($_REQUEST['fieldId'])){
            return miscellaneous::Error();
        }

        $validateValue=$_REQUEST['fieldValue'];
        $validateId=$_REQUEST['fieldId'];


        $validateError= "This username is already taken";
        $validateSuccess= "This username is available";


        /* RETURN VALUE */
        $arrayToJs = array();
        $arrayToJs[0] = $validateId;

        $exists = $this->model->checkExists($validateValue);

        if(!$exists){    // validate??
          $arrayToJs[1] = true;     // RETURN TRUE
          echo json_encode($arrayToJs);     // RETURN ARRAY WITH success
        }else{
          for($x=0;$x<1000000;$x++){
            if($x == 990000){
              $arrayToJs[1] = false;
              echo json_encode($arrayToJs);   // RETURN ARRAY WITH ERROR
            }
          }
          
        }
    }

    
	
}