<?php


class Controller{

	public $view;
	public $model;


	//construct the controller class ans initialize its view object
	function __construct() {
		$this->view = new View();
    }

	public function loadModel($name){

		// file path of the model
		$file = SITE_PATH . '/app/models/'.$name. '_model.php';

		//check if model is valid
		if( file_exists($file) ){
            require $file;
            $modelClass = $name . '_model';
            $this->model = new $modelClass;
        }
    }

}