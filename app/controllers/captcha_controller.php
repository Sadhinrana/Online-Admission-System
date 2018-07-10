<?php

class captcha extends Controller{

	function __construct() {
        parent::__construct(); 
    }

    public function index(){


    	if(!isset( $_POST["recaptcha_challenge_field"] ) || !isset($_POST["recaptcha_response_field"]) ){
            return miscellaneous::Error();
      }

	   $privatekey = "6LeMXwoTAAAAAB5MWvqGnKivfvIuF_H4L4G0ysgV";


      $resp = recaptcha_check_answer ($privatekey,
                                    $_SERVER["REMOTE_ADDR"],
                                    $_POST["recaptcha_challenge_field"],
                                    $_POST["recaptcha_response_field"]);

      if (!$resp->is_valid) {
        // What happens when the CAPTCHA was entered incorrectly
        echo json_encode(false);
      } else {
        echo json_encode(true);
      }

	}


}