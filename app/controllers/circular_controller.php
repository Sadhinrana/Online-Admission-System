<?php

class circular extends Controller{

	function __construct() {
        parent::__construct(); 
    }

	public function index(){
		$this->view->render("circular/index");
	}

}