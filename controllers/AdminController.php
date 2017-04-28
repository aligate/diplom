<?php

namespace controllers;
use models\Admin;

class AdminController extends CoreController{


function __construct()
	{
		$this->model = new Admin();
	}
	
	
public function getLogin(){
	
	if($_SESSION['users']){
		header('Location: ?/admin/list');
	}
	
	echo $this->render('login.php');
	}

public function postLogin($params, $post){
		
	$log = '';
	$pass = '';
	$message = [];
			
	if(isset($post['auth']))
{
	
	$log = $post['login'];
	$pass = $post['password'];

	if($log =='')
	{
		$message[] = "Введите ваш логин";
	}
	if($pass === '') 
	{
		$message[] = "Введите ваш пароль";
	}
	if(!$this->model->findAuth($log, $pass)){
		
		$message[] = "Неверные входные данные";
	}
	else{
		$is_auth = $this->model->findAuth($log, $pass);
		
		$_SESSION['users'] = $is_auth;
	
		header('Location: ?/admin/list');
		
	}
}
	echo $this->render('login.php', ['message' => $message, 'log' => $log]);
}



public function getList(){
	
	$session = $this->model->checkLogged();
	echo $this->render('admin.php',['session' =>$session]);
	
}

public function getUser(){
	
	$session = $this->model->checkLogged();
	
	$adminList = $this->model->selectAllAdmin();
	echo $this->render('show_admin.php', ['adminList' => $adminList]);
}


public function postAdd($params, $post){
	$session = $this->model->checkLogged();
	
	if($post){
		$name = $post['name'];
		$password = $post['password'];
		$this->model->addNewAdmin($name, $password);
		header('Location: ?/admin/user');
	}
}
	public function getDelete($params)
	{
		$session = $this->model->checkLogged();
		if (isset($params['id']) && is_numeric($params['id'])) {
			$this->model->deleteAdmin($params['id']);
		
				header('Location: ?/admin/user');
			
		}
	}
	
	public function getUpdate($params){
		$session = $this->model->checkLogged();
		if (isset($params['id']) && is_numeric($params['id'])) {
				
				$adminToEdit = $this->model->selectOneAdmin($params['id']);
				echo $this->render('update_admin.php',['adminToEdit'=> $adminToEdit]);
			}
		
	}
	public function postUpdate($params, $post)
	{
		$session = $this->model->checkLogged();
		if (isset($params['id']) && is_numeric($params['id'])) {
		
			if (isset($post['password'])) {
				$update = $post['password'];
			}
			
			$this->model->updateAdminPass($params['id'], $update);
			header('Location: ?/admin/user');
			
		}
	}
	
	public function getLogout(){
		session_start();
		session_destroy();
		header('Location: ?/admin/login/');
		
	}

}



?>
