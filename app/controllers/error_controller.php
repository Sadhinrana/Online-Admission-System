<?php

/*
* this is the ain eror controller
*/

class error extends Controller{
	
	function __construct() {
        parent::__construct(); 
    }

    //the base index function of error controller
    public function index(){
    	$this->view->render("error/index");
    }
    
	
}