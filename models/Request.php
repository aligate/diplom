<?php
require_once 'Model.php';

class Request extends Model{



public function addRequest($text, $cat_id){
	
$stmt = $this->db->prepare("INSERT INTO request (text, cat_id) VALUES (:text, :cat_id);INSERT INTO responce (request_id, text) VALUES (LAST_INSERT_ID(), '')");
$stmt->bindParam('text', $text);
$stmt->bindParam('cat_id', $cat_id );
$stmt->execute();
}

public function delCatAndRequest($id){
	
	$stmt = $this->db->prepare("DELETE category, request FROM category LEFT JOIN request ON request.cat_id=category.category_id WHERE category_id = :id");
	$stmt->execute(['id'=>$id]);
	
}

public function showOneCat($id){
	
	$stmt = $this->db->prepare("SELECT cat.category_id, cat.title, req.id, req.text, req.is_published, req.has_responce, req.dated
    FROM request req RIGHT JOIN category cat ON cat.category_id = req.cat_id WHERE cat.category_id ={$id}");
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);

}

public function showOneRequest($category_id, $id){
	
	$stmt = $this->db->prepare("SELECT 
	cat.category_id,
	cat.title,
	req.id,
	req.text, 
	req.cat_id,
	req.is_published, 
	req.has_responce, 	  
	req.dated, req.author,
	req.user_email,
	res.id AS res_id,
	res.text AS res_text
    FROM category cat LEFT JOIN request req ON cat.category_id = req.cat_id LEFT JOIN responce res ON res.request_id=req.id WHERE cat.category_id = :category_id AND req.id= :id");
	$stmt->execute(['category_id'=>$category_id, 'id'=>$id]);
	return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function delRequest($id){
	
	$stmt = $this->db->prepare("DELETE request, responce FROM request LEFT JOIN responce ON responce.request_id= request.id WHERE request.id = :id");
	$stmt ->execute(['id'=>$id]);
}



public function entryUpdate($id, $params){
	
	$stmt = $this->db->prepare("UPDATE request, 
	responce JOIN request req ON req.id = responce.request_id 
	SET req.text= :req_text, 		
	req.cat_id = :cat_id, 
	req.is_published= :is_published,
	req.has_responce= '1',
	req.author= :author, 
	responce.text= :res_text 
	WHERE req.id = :req_id");
	$stmt->bindParam('req_text', $params['text']);
	$stmt->bindParam('cat_id', $params['cat_id']);
	$stmt->bindParam('is_published', $params['is_published']);
	$stmt->bindParam('author',$params['author']);
	$stmt->bindParam('res_text', $params['responce']);
	$stmt->bindParam('req_id', $id);
	$stmt ->execute();
	
}

public function showNewRequest(){
	
	$stmt = $this->db->prepare("SELECT req.id, req.text, req.dated, req.has_responce, cat.category_id, cat.title
    FROM request req JOIN category cat ON cat.category_id = req.cat_id WHERE req.has_responce='0' ORDER BY dated");
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);

}


}


?>
