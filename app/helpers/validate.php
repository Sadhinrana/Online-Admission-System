<?php

/*
    NOT USED
*/

class Validate {

    private $_passed = false,
            $_errors,
            $_db = null;
          
    function __construct() {
        $this->_db = DB::getInstance();
    }
    
    public function check($source, $items = array()){
        foreach ($items as $item => $rules){
            foreach ($rules as $rule => $rule_value){
                
                $value = trim($source[$item]);
                
                if($rule === 'required' && empty($value) ){
                    $this->addError("{$item} is required");
                    return false;
                }
                else if(!empty ($value)){
                    switch ($rule){
                        case 'min':
                            if(strlen($value)< $rule_value){
                                $this->addError("{$item} must be minumum of {$rule_value} characters");
                                return false;
                            }
                        break;
                        case 'max':
                            if(strlen($value) > $rule_value){
                                $this->addError("{$item} must be maximum of {$rule_value} characters");
                                return false;
                            }
                        break;
                        case 'matches':
                            if($value != $source[$rule_value]){
                                $this->addError("{$rule_value} must match");
                                return false;
                            }
                        break;
                        case 'unique':
                            $check = $this->_db->get($rule_value , array($item, '=', $value));
                            if($check->count()){
                                $this->addError("{$item} already exists");
                                return false;
                            }
                        break;
                        case 'validate':
                            if( !filter_var($value, FILTER_VALIDATE_EMAIL) ){
                                $this->addError("Invalid email format");
                                return false;
                            }
                        break;
                    }
                }
            }
        }
        
        if(empty($this->_errors)){
             $this->_passed = true;
        }
        
        return $this;

    }
    
    private function addError($error){
        $this->_errors = $error;
    }
    
    public function errors(){
        return $this->_errors;
    }
    
    public function passed(){
        return $this->_passed;
    }

}

