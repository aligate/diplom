<?php

require_once 'Model.php';

class Main extends Model
{
	
	/**
	* Получение всех всех вопросов
	* @return array
	*/
	public function findAll()
	{
		$cat = $this->findAllСategories();
		$sth = $this->db->prepare("SELECT cat.category_id, 
							cat.title AS cat_title, 
							req.id,
							req.text AS req_text,
							res.text AS res_text
	FROM category AS cat JOIN request AS req ON req.cat_id = cat.category_id JOIN responce AS res ON res.request_id = req.id WHERE req.is_published='1' ORDER BY cat.category_id");
		
		if ($sth->execute()) {
			$data =  $sth->fetchAll(PDO::FETCH_ASSOC);
			$all = [];
			foreach($cat as $key => $item){
				$key = $item['title'];
			foreach($data as $value){
				if($key== $value['cat_title'])
				 $all[$key][] = $value;
			}
			
          }
			return $all;
		}
		return false;
	}
	
	
	function add($params)
	{
		$stmt = $this->db ->prepare("INSERT INTO request (text, cat_id, author, user_email) VALUES (:text, :cat_id, :author, :user_email);INSERT INTO responce (request_id, text) VALUES (LAST_INSERT_ID(), '')");
		$stmt->bindParam('text', $params['text'], PDO::PARAM_STR);
		$stmt->bindParam('cat_id', $params['category'], PDO::PARAM_STR);
		$stmt->bindParam('author', $params['name'], PDO::PARAM_STR);
		$stmt->bindParam('user_email', $params['email'], PDO::PARAM_STR);
		
		
		return $stmt->execute();
		
	}
	
	
	
	// Авторизация
	public function findAuth($log, $pass)
	{
		$stmt = $this->db->prepare("SELECT * FROM user WHERE login = :login AND password = :password");
		
		$stmt->execute(['login'=>$log, 'password'=>md5($pass)]);
		
		return $stmt->fetch(PDO::FETCH_ASSOC); 
		
		}
	// Проверка на существование зарегистрированного логина	
	public function checkLogin($login){
		
		$stmt = $this->db->prepare("SELECT * FROM user WHERE login = '{$login}'");
		$stmt->execute();
		if($stmt->rowCount() > 0){
			return true;
		}
			return false;
	}
	// Регистрация
	public function regist($login, $password){
		
	$stmt = $this->db->prepare("INSERT INTO user (login, password) VALUES (:login, :password)");
	$stmt->execute(['login' =>$login, 'password' =>md5($password)]);
	if($stmt->rowCount() === 1){
		return true;
	}
	return false;
	}

	
}

