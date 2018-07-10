<?php

class admissionform extends Controller{

  function __construct() {
        parent::__construct(); 
  }

  public function index(){
      Redirect::to( SITE_URL. '/admissionform/step1');
  } 


   //step 1 of application form
  public function step1(){
      $data = $this->model->getStep1();
      $this->view->render("admissionform/step1",$data);
  }   


   //step 2 of application form
  public function step2(){

      if(Session::exists('invalid-captcha')){
        $data = $this->model->getStep2();
        $this->view->render("admissionform/step2",$data);
        return;
      }


      if(null !== Input::get('unit') ) {
        $_SESSION['admission.unit'] = Input::get('unit');
      }
      else{
        return miscellaneous::Error();
      }      

      if(null !== Input::get('ssc_roll') ) {
        $_SESSION['ssc.roll'] = Input::get('ssc_roll');
      }
      else{
        return miscellaneous::Error();
      }

      if(null !== Input::get('ssc_res'))  {
        $_SESSION['ssc.res'] = Input::get('ssc_res');
      }
      else{
        return miscellaneous::Error();
      }

      if(null !== Input::get('ssc_session')) {
        $_SESSION['ssc.session'] = Input::get('ssc_session');
      }
      else{
        return miscellaneous::Error();
      }


      if(null !== Input::get('ssc_py')) {
        $_SESSION['ssc.py'] = Input::get('ssc_py');
      }
      else{
        return miscellaneous::Error();
      }     

       if(null !== Input::get('ssc_board')) {
        $_SESSION['ssc.board'] = Input::get('ssc_board');
      }
      else{
        return miscellaneous::Error();
      }

      if(null !== Input::get('ssc_gpa')) {
        $_SESSION['ssc.gpa'] = Input::get('ssc_gpa'); 
      }
      else{
        return miscellaneous::Error();
      }

      if(null !== Input::get('hsc_roll')) {
        $_SESSION['hsc.roll'] = Input::get('hsc_roll');
      }
      else{
        return miscellaneous::Error();
      }

      if(null !== Input::get('hsc_res'))  {
        $_SESSION['hsc.res'] = Input::get('hsc_res');
      }
      else{
        return miscellaneous::Error();
      }

      if(null !== Input::get('hsc_session')) {
        $_SESSION['hsc.session'] = Input::get('hsc_session');
      }
      else{
        return miscellaneous::Error();
      }

      if(null !== Input::get('hsc_board')) {
        $_SESSION['hsc.board'] = Input::get('hsc_board');
      }
      else{
        return miscellaneous::Error();
      }

      if(null !== Input::get('hsc_py')){
       $_SESSION['hsc.py'] = Input::get('hsc_py');
      }
      else{
          return miscellaneous::Error();
      }

      if(null !== Input::get('hsc_gpa')) {
        $_SESSION['hsc.gpa'] = Input::get('hsc_gpa');
      }
      else{
        return miscellaneous::Error();
      }


       //check if applicats is eligible for application
       $D = $this->model->getStep1();
       $ok = application_requirement::ok($D);
       if(!$ok){
          Session::flush('not-eligible',Messages::notEligible( $D['admission_unit'] ));
         //s Redirect::to(SITE_URL . '/admissionform/step1');
       }


      $data = $this->model->getStep2();
      $this->view->render("admissionform/step2",$data);
  }   


  //step 3 of application form
  public function final_step(){


      if(null !== Input::get('name')) {
        $_SESSION['admission.name'] = Input::get('name');
      }      else{
        return miscellaneous::Error();
      }
      if(null !== Input::get('father_name')) {
        $_SESSION['admission.father.name'] = Input::get('father_name');
      }      else{
        return miscellaneous::Error();
      }
      if(null !== Input::get('mother_name')) {
        $_SESSION['admission.mother.name'] = Input::get('mother_name');
      }      else{
        return miscellaneous::Error();
      }

      if(null !== Input::get('gender')) {
        $_SESSION['admission.gender'] = Input::get('gender');
      }      
      else{
        return miscellaneous::Error();
      }

      if(null !== Input::get('dob')) {
        $_SESSION['admission.dob'] = Input::get('dob');
      }      else{
        return miscellaneous::Error();
      }
      if(null !== Input::get('nationality')) {
        $_SESSION['admission.nat'] =Input::get('nationality');
      }      else{
        return miscellaneous::Error();
      }
      if(null !== Input::get('pre_adress')) {
        $_SESSION['admission.preadress'] = Input::get('pre_adress');
      }      else{
        return miscellaneous::Error();
      }
      if(null !== Input::get('per_adress')) {
        $_SESSION['admission.peradress'] = Input::get('per_adress');
      }      else{
        return miscellaneous::Error();
      }
      if(null !== Input::get('contact')) {
        $_SESSION['admission.contact'] = Input::get('contact');
      }      else{
        return miscellaneous::Error();
      }
 

  } 


   //run application process
  public function run(){

    //self::final_step();
      
    if( Input::exists('post') ){

            //check if form loaded propely
            if( Token::check(Input::get('token')) ){

                //check captcha security
                if(  captchaValidattion::ok() ){

                    self::final_step();

                    $applyID = $this->model->process();
                    if( $applyID ){
                        echo "Success..applyID = " . $applyID.'<br/>';
                    }
                    else{
                        echo "SORRY! Error apply..try again!";
                    }
                    miscellaneous::deleteApplySeesion();
                }
                else{
                    Session::flush('invalid-captcha',Messages::invalidCaptcha());
                    Redirect::to(SITE_URL . '/admissionform/step2');
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



}