<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT);
ini_set('display_errors', 1);
session_start();

use lib\Router;

spl_autoload_register(function($class){
	$file = str_replace("\\", "/", $class ). ".php";

	if(file_exists($file)){
		require_once $file;
	}
	
});

Router::run();


