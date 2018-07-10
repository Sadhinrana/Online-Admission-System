<?php

class procedure extends Controller{

	function __construct() {
        parent::__construct(); 
    }

	public function index(){
		$this->view->render("procedure/index");
	}

}