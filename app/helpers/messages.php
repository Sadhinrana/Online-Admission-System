<?php


/**
* this class is used for  all kind of messages and notifications
*/
class Messages{


	//return resitration successfull message
	public static function res_success(){
		$msg = "Resistration successfull,You can login now!";
		return $msg;
	}	

	//return resitration failure message
	public static function res_unsuccess(){
		$msg = "Resistration unsuccessfull,Unknown error!";
		return $msg;
	}		

	//return login failure message
	public static function login_unsuccess(){
		$msg = "Username or password is incorrrect!";
		return $msg;
	}	

	//return 404  message
	public static function _404(){
		$msg = "Error 404: Page does not exists!<br/>Are you sure what you are looking for?";
		return $msg;
	}	

	//return eligible  message
	public static function notEligible($unit=""){
		$msg = "SORRY! You are not eligible for this unit " . $unit;
		return $msg;
	}	

	//return eligible  message
	public static function invalidCaptcha(){
		$msg = "Captcha does not match!";
		return $msg;
	}


	//return eligible  message
	public static function payUpdateIDnotfound(){
		$msg = "ID not Found. Please check ID!";
		return $msg;
	}	

	//return eligible  message
	public static function payUpdateError(){
		$msg = "Error Updating! Plese try again!";
		return $msg;
	}	

	//return eligible  message
	public static function payUpdateSuccess(){
		$msg = "UPDATED!";
		return $msg;
	}



}