<?php


/*
    Handle Users activities
*/
class Users {

    private $_db,
            $_data,
            $_cookieName,
            $_sessionName,
            $_isLoggedIn;
            
    function __construct($user = null) {
        
        $this->_db = DB::getInstance(); //connect with database
        
        $this->_sessionName = Config::get('session/session_name');
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
    
    public function update($fields = array(), $id = null){
        
        if(!$id && $this->isLoggedIn() ){
            $id = $this->data()->id;
        }
        
        
        if( !$this->_db->update('users', $id, $fields) ){
            throw new Exception('Problem Updating!');
        }
    }

    public function create($fields = array()){
        if(!$this->_db->insert('users',$fields)){
            throw new Exception("Problem Creaitng user");
        }
    }   

    public function apply($fields = array()){
        if(!$this->_db->insert('applications',$fields)){
            throw new Exception("Problem applying!");
        }
    }
    
    /*
        find a user in database
    */
    public function find($user = null){
        if($user){
            $field = (is_numeric($user)) ? 'id' : 'userid';
            $data = $this->_db->get('users', array($field,'=',$user));
            
            if($data->count()){
                $this->_data = $data->first();
                return true;
            }
        }
        return false;
    }


    /*
        loging in a user with remember functionality
    */
    public function login($username = null, $password = null, $remember = false){
        
        if(!$username && !$password && $this->exists()  ){
            Session::put($this->_sessionName, $this->data()->id);
        }
        else{
            
            //finding the username
            $user = $this->find($username);
            
            //if username exists check password
            if($user){

                //check password by hashing
                if( $this->data()->password === Hash::make($password, $this->data()->salt ) ){                                     
                    Session::put($this->_sessionName, $this->data()->id);
                    //put this user id in session


                    //check if remember me checked
                    if($remember){
                        
                        $hash = Hash::unique();
                        $hashCheck = $this->_db->get('users_session', array('user_id', '=', $this->data()->id ) );
                        //check if already hash for cookie is set for this user in session database


                        if(!$hashCheck->count()){
                            //if not then set a hash for this user's cookie
                            $this->_db->insert( 'users_session' ,array(
                                'user_id' => $this->data()->id,
                                'hash' => $hash
                            ));
                        }
                        else{
                            $hash = $hashCheck->first()->hash;
                        }

                        //put the hash cookie
                        Cookie::put( $this->_cookieName, $hash, Config::get('remember/cookie_expiry'));

                    }

                    return true;
                }
            }
            
        }
        return false;
    }


    
    public function applications(){
        $data = $this->_db->get('applications', array('userid','=',$this->data()->id));
        if($data->count()){
            return $data;
        }
        else{
            return false;
        }
    }    


    public function exists(){
        return (!empty($this->_data)) ? true : false;
    }
    
    //log out a user
    public function logout(){
        
        //delete this user session and cookie

        $this->_db->delete('users_session', array('user_id','=',  $this->data()->id) );
        
        Session::delete($this->_sessionName);
        Cookie::delete($this->_cookieName);
    }

    //all information about this user
    public function data(){
        return $this->_data;
    }    

    //all information about this user
    public function getDB(){
        return $this->_db;
    }
    
    //check if user already logged in
    public function isLoggedIn(){
        return $this->_isLoggedIn;
    }

}
