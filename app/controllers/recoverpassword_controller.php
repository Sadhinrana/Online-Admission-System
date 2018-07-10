<?php

class recoverpassword extends Controller{

	function __construct() {
        parent::__construct(); 
    }

    public function index(){
        $this->view->render("recoverpassword/index");
    }


}