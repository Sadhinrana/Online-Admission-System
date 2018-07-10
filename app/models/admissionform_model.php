<?php

class admissionform_model extends Model{

	function __construct() {
        parent::__construct();
    }

    public function process(){
        

        $user = new Users();

        $data = self::getAll();

        try{
             $user->apply( array(
                'userid' => $user->data()->id,
                'unit' => $data['admission_unit'],
                'name' => $data['admission_name'],
                'father' => $data['admission_father_name'],
                'mother' => $data['admission_mother_name'],
                'sex' => $data['admission_gender'],
                'dob' => $data['admission_dob'],
                'present' => $data['admission_preadress'],
                'permanent' => $data['admission_peradress'],
                'contact' => $data['admission_contact'],
                'sscroll' => $data['ssc_roll'],
                'sscres' => $data['ssc_res'],
                'sscsession' => $data['ssc_session'],
                'sscpa' => $data['ssc_py'],
                'sscgpa' => $data['ssc_gpa'],
                'sscboard' => $data['ssc_board'],               
                'hscroll' => $data['hsc_roll'],
                'hscres' => $data['hsc_res'],
                'hscsession' => $data['hsc_session'],
                'hscpa' => $data['hsc_py'],
                'hscgpa' => $data['hsc_gpa'],
                'hscboard' => $data['hsc_board'],
                'status' => false,
                'applytime' => date('Y-m-d H:i:s')
            ));
            $liid = $user->getDB()->getLastInsertId();

          //  $rid = rand(100,999) . $liid;
            $rid = $liid;

            return $rid;
        }
        catch(Exception $e){
            return 0;
        }
    }   


    public function getStep1(){

        (!isset($_SESSION['admission.unit'])) ? $admission_unit = '' : $admission_unit = $_SESSION['admission.unit'];   

        (!isset($_SESSION['ssc.roll'])) ? $ssc_roll = '' : $ssc_roll = $_SESSION['ssc.roll'];
        (!isset($_SESSION['ssc.session'])) ? $ssc_session = '' : $ssc_session = $_SESSION['ssc.session'];
        (!isset($_SESSION['ssc.res'])) ? $ssc_res = '' : $ssc_res = $_SESSION['ssc.res'];
        (!isset($_SESSION['ssc.py'])) ? $ssc_py = '' : $ssc_py = $_SESSION['ssc.py'];
        (!isset($_SESSION['ssc.board'])) ? $ssc_board = '' : $ssc_board = $_SESSION['ssc.board'];
        (!isset($_SESSION['ssc.group'])) ? $ssc_group = '' : $ssc_group = $_SESSION['ssc.group'];
        (!isset($_SESSION['ssc.gpa'])) ? $ssc_gpa = '' : $ssc_gpa = $_SESSION['ssc.gpa'];

        (!isset($_SESSION['hsc.roll'])) ? $hsc_roll = '' : $hsc_roll = $_SESSION['hsc.roll'];         
        (!isset($_SESSION['hsc.session'])) ? $hsc_session = '' : $hsc_session = $_SESSION['hsc.session'];  
        (!isset($_SESSION['hsc.res'])) ? $hsc_res = '' : $hsc_res = $_SESSION['hsc.res'];  
        (!isset($_SESSION['hsc.py'])) ? $hsc_py = '' : $hsc_py = $_SESSION['hsc.py'];  
        (!isset($_SESSION['hsc.board'])) ? $hsc_board = '' : $hsc_board = $_SESSION['hsc.board'];  
        (!isset($_SESSION['hsc.group'])) ? $hsc_group = '' : $hsc_group = $_SESSION['hsc.group'];  
        (!isset($_SESSION['hsc.gpa'])) ? $hsc_gpa = '' : $hsc_gpa = $_SESSION['hsc.gpa'];  

        return array(       
            'admission_unit' => $admission_unit,
            'ssc_roll' => $ssc_roll,
            'ssc_session' => $ssc_session,
            'ssc_res' => $ssc_res,
            'ssc_py' => $ssc_py,
            'ssc_board' => $ssc_board,
            'ssc_group' => $ssc_group,
            'ssc_gpa' => $ssc_gpa,
            'hsc_roll' => $hsc_roll,
            'hsc_session' => $hsc_session,
            'hsc_res' => $hsc_res,
            'hsc_py' => $hsc_py,
            'hsc_board' => $hsc_board,
            'hsc_gpa' => $hsc_gpa
        );

    }    

    public function getStep2(){

        (!isset($_SESSION['admission.name'])) ? $admission_name = '' : $admission_name = $_SESSION['admission.name'];   
        (!isset($_SESSION['admission.father.name'])) ? $admission_father_name = '' : $admission_father_name = $_SESSION['admission.father.name'];   
        (!isset($_SESSION['admission.mother.name'])) ? $admission_mother_name = '' : $admission_mother_name = $_SESSION['admission.mother.name'];   
        (!isset($_SESSION['admission.gender'])) ? $admission_gender = '' : $admission_gender = $_SESSION['admission.gender'];   
        (!isset($_SESSION['admission.nat'])) ? $admission_nat = '' : $admission_nat = $_SESSION['admission.nat'];   
        (!isset($_SESSION['admission.preadress'])) ? $admission_preadress = '' : $admission_preadress = $_SESSION['admission.preadress'];   
        (!isset($_SESSION['admission.peradress'])) ? $admission_peradress = '' : $admission_peradress = $_SESSION['admission.peradress'];   
        (!isset($_SESSION['admission.contact'])) ? $admission_contact = '' : $admission_contact = $_SESSION['admission.contact'];   
        (!isset($_SESSION['admission.dob'])) ? $admission_dob = '' : $admission_dob = $_SESSION['admission.dob'];   
        (!isset($_SESSION['admission.photo'])) ? $admission_photo = '' : $admission_photo = $_SESSION['admission.photo'];   
    
        return array(       
            'admission_name' => $admission_name,
            'admission_father_name' => $admission_father_name,
            'admission_mother_name' => $admission_mother_name,
            'admission_gender' => $admission_gender,
            'admission_preadress' => $admission_preadress,
            'admission_peradress' => $admission_peradress,
            'admission_contact' => $admission_contact,
            'admission_dob' => $admission_dob,
            'admission_photo' => $admission_photo
        );

    }    

    public function getAll(){
         $st1 = self::getStep1();
         $st2 = self::getStep2();
         $st3 = $st1 + $st2;
         return $st3;
    }


}