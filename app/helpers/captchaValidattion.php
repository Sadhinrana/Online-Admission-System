<?php

class captchaValidattion{


    public static function ok(){


      if(!isset( $_POST["recaptcha_challenge_field"] ) || !isset($_POST["recaptcha_response_field"]) ){

            return miscellaneous::Error();
       
      }

	   $privatekey = "6LeMXwoTAAAAAB5MWvqGnKivfvIuF_H4L4G0ysgV";


      $resp = recaptcha_check_answer ($privatekey,
                                    $_SERVER["REMOTE_ADDR"],
                                    $_POST["recaptcha_challenge_field"],
                                    $_POST["recaptcha_response_field"]);

      if ($resp->is_valid) {
        return true;
      } else {
        return false;
      }

	}


}