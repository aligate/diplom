<?php
namespace controllers;


class CoreController{

protected $model = null;


	/**
	 * Подключаем шаблонизатор Твиг
	 * @param $template
	 * @param $params
	 */
	
	
	public function render($template, $params = [])
	{
		
		require_once '/../vendor/autoload.php';
		$loader = new \Twig_Loader_Filesystem('views');
		$twig = new \Twig_Environment($loader);
		$templ = $twig->loadTemplate($template);
		return $templ->render($params);
	}
	

}

?>
