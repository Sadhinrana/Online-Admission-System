<?php

class result extends Controller{

	function __construct() {
        parent::__construct(); 
    }

	public function index(){
		$this->view->render("result/index");
	}

}