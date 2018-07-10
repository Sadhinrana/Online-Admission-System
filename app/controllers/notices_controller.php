<?php

class notices extends Controller{

	function __construct() {
        parent::__construct(); 
    }

	public function index(){
		$this->view->render("notices/index");
	}

}