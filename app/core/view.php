<?php

class View {
	
	function __construct(){}

	//this function is used to include the views files
	public function render($name,$data = ''){

		if( is_array($data) ) {
            extract($data);
        }

		//include header 
		require_once SITE_PATH .'/app/views/header.php';

		//include required file 
        require_once SITE_PATH .'/app/views/' . $name .'.php';

        //include footer 
        require_once SITE_PATH .'/app/views/footer.php';

    }

}