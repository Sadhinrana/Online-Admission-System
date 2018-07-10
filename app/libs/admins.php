<?php


/*
    Handle Users activities
*/
class admins {

    private $_db,
            $_data,
            $_cookieName,
            $_sessionName,
            $_isLoggedIn;
            
    function __construct($user = null) {
        
        $this->_db = DB::getInstance(); //connect with database
        
        $this->_sessionName = Config::get('session/admin_session_name');
        $this->_cookieName = Config::get('remember/cookie_name');
        
        if(!$user){
            if(Session::exists($this->_sessionName)){
                $user = Session::get($this->_sessionName);
                
                if($this->find($user)){
                    $this->_isLoggedIn = true;
                }
                else{
                    $this->_isLoggedIn = false;
                }
            }
        }
        else{
            $this->find($user);
        }
        
    }


    /*
        loging in a user with remember functionality
    */
    public function login($username = null, $password = null){
        
        if(!$username && !$password && $this->exists()  ){
            Session::put($this->_sessionName, $this->data()->id);
        }
        else{
            
            //finding the username
            $user = $this->find($username);
            
            //if username exists check password
            if($user){

                //check password by hashing
                if( $this->data()->password === $password ){                                     
                    Session::put($this->_sessionName, $this->data()->id);
                    return true;
                }
            }
            
        }
        return false;
    }



    //log out a user
    public function logout(){
        
        //delete this admin session and cookie
        Session::delete($this->_sessionName);
    }


    /*
        find a user in database
    */
    public function find($user = null){
        if($user){
            $field = (is_numeric($user)) ? 'id' : 'name';
            $data = $this->_db->get('admin', array($field,'=',$user));
            
            if($data->count()){
                $this->_data = $data->first();
                return true;
            }
        }
        return false;
    }


    public function paymentUpdate($id=null){
        $data = $this->_db->get('applications', array('id','=',$id));
        if($data->count()){
            if(  $this->_db->update('applications',$id, array('status'=>true)  ) ){
                return Messages::payUpdateSuccess();
            }
            else{
                return Messages::payUpdateError();
            }
        }
        return Messages::payUpdateIDnotfound();
    }

    public function exists(){
        return (!empty($this->_data)) ? true : false;
    }


    //all information about this user
    public function data(){
        return $this->_data;
    } 


        //check if user already logged in
    public function isLoggedIn(){
        return $this->_isLoggedIn;
    }


}
