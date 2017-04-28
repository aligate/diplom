<?php

namespace lib;
/**
 * Пример урла: /?/{controller}/{action}/{param1}/{value1}/{param2}/{value2}/
 * /?/book/update/id/1/
 */
 class Router{
	 
	public static function run(){
		
	if(strpos($_SERVER['REQUEST_URI'], '?') === false)
	{
	$pathList = ['main', 'list'];
	}
	else
	{
	$pathList = explode('/', trim($_SERVER['argv'][0], '/'));
	
	}
	if (count($pathList) < 2)
	{
	$pathList = ['main', 'list'];
	}
	
	$controller = array_shift($pathList);
	$action = array_shift($pathList);
	
	foreach ($pathList as $i => $value) {
		if ($i % 2 == 0 && isset($pathList[$i + 1])) {
			$params[$pathList[$i]] = $pathList[$i + 1];
			
		}
	}
	$controllerText = $controller . 'Controller';
	$controllerText = 'controllers\\' . ucfirst($controllerText);
	
		if (class_exists($controllerText)) {
			$controller = new $controllerText();
			
			$action = ($_SERVER['REQUEST_METHOD'] == 'POST' ? 'post' : 'get').ucfirst($action);
			if (method_exists($controller, $action)) {
				$controller->$action($params, $_POST);
			}
			
		}
	
	}
 }
