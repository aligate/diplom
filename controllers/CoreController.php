<?php

class CoreController{

protected $model = null;


	function __construct($db)
	{
		include 'Autoload.php';
		
	}

	/**
	 * Подключаем шаблонизатор Твиг
	 * @param $template
	 * @param $params
	 */
	
	
	public function render($template, $params = [])
	{
		
		require_once '/../vendor/autoload.php';
		$loader = new Twig_Loader_Filesystem('views');
		$twig = new Twig_Environment($loader);
		$templ = $twig->loadTemplate($template);
		return $templ->render($params);
	}
	




}

?>