<?php

class application_requirement{

	public static function ok($data = []){
		
		$unit = $data['admission_unit'];
		switch($unit) {
			case 'A':
				return self::A($data);
				break;		

			case 'B':
				return self::B($data);
				break;			

			case 'C':
				return self::C($data);
				break;			

			case 'D':
				return self::D($data);
				break;
			
			default:
				return false;
				break;
		}

	}

	public static function A(){
		$ret = false;
		//conditions
		return $ret;
	}	

	public static function B(){
		$ret = true;
		//conditions
		return $ret;
	}	

	public static function C(){
		$ret = true;
		//conditions
		return $ret;
	}	

	public static function D(){
		$ret = true;
		//conditions
		return $ret;
	}


	  //check aplicants Eligibility
	  public static function checkEligibility($unit,$data = []){

	       $ret = application_requirement::ok($unit,$data);

	       if(!$ret){
	          Session::flush('not-eligible',Messages::notEligible());
	       }

	  }

}