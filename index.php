<?php
	
	// Turn on error reporting
	error_reporting(E_ALL);

	//define root address of the site for further use
	define('SITE_PATH', realpath(dirname(__FILE__)) );
	define('SITE_URL', "http://localhost/justas" );

	// require init for initializing everything
	require_once SITE_PATH.'/app/init.php';

	// call app class for routing and load views
	$app = new app();

?>