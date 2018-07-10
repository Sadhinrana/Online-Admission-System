<?php

/*
* 
*/

class paymentupdate extends Controller{
	
	function __construct() {
        parent::__construct(); 
    }

    public function index(){

    	$id = $_POST['id'];

    	

    	echo json_encode($id);
    }

}