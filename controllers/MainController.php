<?php

require_once 'CoreController.php';

class MainController extends CoreController
{
	
	function __construct($db)
	{
		parent::__construct($db);
		$this->model = new Main($db);
		
	}
	

	/**
	 * Вывод всех рубрик и вопросов
	 * @return array
	 */
	public function getList()
	{
			
		$data = $this->model->findAll();
	
		echo $this->render('view.php', ['data' =>$data]);
		
	}
	
	public function getForm(){
		
		$categories = $this->model->findAllСategories();
		echo $this->render('form.php', ['categories' =>$categories]);
	}
	
	
	public function postForm($params, $post){
	$name = '';
	$email = '';
	$text = '';
	$category = '';
	$message= [];
	$categories = $this->model->findAllСategories();
	if(isset($post))
	{

	$name = trim(addslashes($post['name']));
	
	$email = trim(addslashes($post['email']));
	 
	$text = trim(addslashes($post['text']));
	 
	$category = $post['cat'];
	

	if($name==='')
	{
		$message['error'][] = "Введите ваше имя";
	}
	if($email==='') 
	{
		$message['error'][] = "Введите ваш email";
	}
	if($text ==='') 
	{
		$message['error'][] = "Введите текст вопроса";
	}

	
	if(empty($message))
	{
	
	if($this->model->add(['text'=>$text, 'category' => $category, 'name' => $name, 'email' => $email]))
		{
		
		
		$message['success'][] = "Вaш вопрос получен!";
		}
	}
	}
	echo $this->render('form.php', ['message'=>$message, 'categories' =>$categories, 'name' =>$name, 'email'=>$email, 'text'=>$text]);	
	
	
}

	
	
	
	
	
	

}

