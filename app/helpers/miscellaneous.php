<?php

class miscellaneous{

	public static function getYearList($count=3){
          $currentYear = date('Y');
          $earliest_year = $currentYear - $count;
          $ret = array();
          foreach (range(date('Y'), $earliest_year) as $x) {
              $ret[] = $x;
          }
          return $ret;
	}


	public static function errorPopup($message="",$bg="",$foreground="#fff"){
		$ret  = '<div id="flushes" ><h3 style="background: '.$bg.' none repeat scroll 0% 0%; color:'.$foreground.'">';
		$ret .= $message;
		$ret .= '</h3><img  class="pop-close" src="'. SITE_URL .'/public/img/close_icon.png" /></div>';
		return $ret;
	}

	public static function Error(){
		Session::flush('sure',Messages::_404());
		require_once SITE_PATH.'/app/controllers/error_controller.php';
        $control = new error();
        $control->index();
        return FALSE;
	}


	public static function deleteApplySeesion(){
		Session::delete('admission.unit');   
        Session::delete('ssc.roll');
        Session::delete('ssc.session');
        Session::delete('ssc.res');
        Session::delete('ssc.py');
        Session::delete('ssc.board');
        Session::delete('ssc.group');
        Session::delete('ssc.gpa');
        Session::delete('hsc.roll');         
        Session::delete('hsc.session');  
        Session::delete('hsc.res');  
        Session::delete('hsc.py');  
        Session::delete('hsc.board');  
        Session::delete('hsc.group');  
        Session::delete('hsc.gpa');  
        Session::delete('admission.name');   
        Session::delete('admission.father.name');
        Session::delete('admission.mother.name'); 
        Session::delete('admission.gender');  
        Session::delete('admission.nat');
        Session::delete('admission.preadress');
        Session::delete('admission.peradress'); 
        Session::delete('admission.contact');
        Session::delete('admission.dob'); 
        Session::delete('admission.photo'); 
	}


}