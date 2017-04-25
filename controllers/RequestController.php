<?php
require_once 'CoreController.php';

class RequestController extends CoreController{


function __construct($db)
	{
		parent::__construct($db);
		$this->model = new Request($db);
		
	}
//Вывод вопросов по одной категории	
public function getEntry($params){
	
	$session = $this->model->checkLogged();
	
	if (isset($params['cat']) && is_numeric($params['cat'])) {
				
				$entry = $this->model->showOneCat($params['cat']);
			
				echo $this->render('show_entry.php',['entry'=> $entry]);
			}
	
}

//Добавление вопроса админом
public function postAdd($params, $post){
	$session = $this->model->checkLogged();
	$text= $post['text'];
	$id = $params['cat'];
	$this->model->addRequest($text, $id);
	header('Location: ?/request/entry/cat/'.$params['cat']);
}
//Удаление вопроса с ответом, если есть
public function getDelete($params)
	{
		$session = $this->model->checkLogged();
		if (isset($params['id']) && is_numeric($params['id'])) {

			$this->model->delRequest($params['id']);
		
				header('Location: ?/request/entry/cat/'.$params['cat']);
			
		}
	}
//Вывод формы для редактирования
public function getEdit($params){
	
	$session = $this->model->checkLogged();
	
	if(isset($params)){
		
		$entryToEdit = $this->model->showOneRequest($params['cat'], $params['id']);
		
	}
	$categories = $this->model->findAllСategories();

	echo $this->render('edit_entry.php', ['entryToEdit'=>$entryToEdit,'categories'=>$categories]);
}
//Редактирование вопроса
public function postUpdate($params, $post){
	$session = $this->model->checkLogged();
	if(isset($post)){
		
		$updateArray = $post;
		$id = $params['id'];
		$this->model->entryUpdate($id, $updateArray);
		header('Location: ?/request/entry/cat/'.$params['cat']);
	}
	
	
}
// Вывод всех новых вопросов 
public function getNew(){
	
	$newEntries = $this->model->showNewRequest();

	echo $this->render('new_entry.php', ['newEntries'=> $newEntries]);
		
}

}



?>
