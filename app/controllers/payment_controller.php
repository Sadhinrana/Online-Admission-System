<?php

class payment extends Controller{

	function __construct() {
        parent::__construct(); 
    }

	public function index(){
		$this->view->render("payment/index");
	}

}