<?php

require_once 'Model.php';

class Main extends Model
{
	
	
	// Получаем многомерный массив, где ключами будут имена тем, выводим на главной странице
	
	public function findAll()
	{
		$cat = $this->findAllСategories();
		$sth = $this->db->prepare("SELECT cat.category_id, 
							cat.title AS cat_title, 
							req.id,
							req.text AS req_text,
							res.text AS res_text
	FROM category AS cat JOIN request AS req ON req.cat_id = cat.category_id JOIN responce AS res ON res.request_id = req.id 
	WHERE req.is_published='1' ORDER BY cat.category_id");
		
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
		$stmt = $this->db ->prepare("INSERT INTO request (text, cat_id, author, user_email) 
		VALUES (:text, :cat_id, :author, :user_email);INSERT INTO responce (request_id, text) VALUES (LAST_INSERT_ID(), '')");
		$stmt->bindParam('text', $params['text'], PDO::PARAM_STR);
		$stmt->bindParam('cat_id', $params['category'], PDO::PARAM_STR);
		$stmt->bindParam('author', $params['name'], PDO::PARAM_STR);
		$stmt->bindParam('user_email', $params['email'], PDO::PARAM_STR);
		
		
		return $stmt->execute();
		
	}
	
	
}

