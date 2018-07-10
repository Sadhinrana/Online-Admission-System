<?php


/*
	sanitize the inputs
	turn html command input as plain text
*/
class SANATIZE{
	public static function escape($string){
	    return htmlentities($string, ENT_QUOTES, 'UTF-8');
	}
}
