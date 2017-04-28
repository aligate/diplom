<?php
namespace controllers;
use models\Request;

class RequestController extends CoreController{


function __construct()
	{
		
		$this->model = new Request();
		
	}
	
public function getEntry($params){
	
	$session = $this->model->checkLogged();
	
	if (isset($params['cat']) && is_numeric($params['cat'])) {
				
				$entry = $this->model->showOneCat($params['cat']);
			
				echo $this->render('show_entry.php',['entry'=> $entry]);
			}
	
}


public function postAdd($params, $post){
	$session = $this->model->checkLogged();
	$text= $post['text'];
	$id = $params['cat'];
	$this->model->addRequest($text, $id);
	header('Location: ?/request/entry/cat/'.$params['cat']);
}
// Удаление вопросма вместе с ответом, если есть
public function getDelete($params)
	{
		$session = $this->model->checkLogged();
		if (isset($params['id']) && is_numeric($params['id'])) {

			$this->model->delRequest($params['id']);
		
				header('Location: ?/request/entry/cat/'.$params['cat']);
			
		}
	}
// Вывод формы для редактирования
public function getEdit($params){
	
	$session = $this->model->checkLogged();
	
	if(isset($params)){
		
		$entryToEdit = $this->model->showOneRequest($params['cat'], $params['id']);
		
	}
	$categories = $this->model->findAllСategories();

	echo $this->render('edit_entry.php', ['entryToEdit'=>$entryToEdit,'categories'=>$categories]);
}
//Редактирование / Добавление ответа
public function postUpdate($params, $post){
	$session = $this->model->checkLogged();
	if(isset($post)){
		
		$updateArray = $post;
		$id = $params['id'];
		$this->model->entryUpdate($id, $updateArray);
		header('Location: ?/request/entry/cat/'.$params['cat']);
	}
	
	
}
// Показ всех новых вопросов
public function getNew(){
	
	$newEntries = $this->model->showNewRequest();

	echo $this->render('new_entry.php', ['newEntries'=> $newEntries]);
		
}

}



?>
