<?php
require_once 'Model.php';

class Category extends Model{

public function showCategoriesList(){
	
	$stmt = $this->db->prepare("SELECT req.cat_id, 
							cat.category_id,
							cat.title,
							count(req.id) AS requests,
                            				sum(is_published = '1') AS is_published,
                            				sum(has_responce = '0') AS no_responce
							FROM request AS req RIGHT JOIN category AS cat ON req.cat_id = cat.category_id 
							GROUP BY category_id");
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
	
}

public function createCategory($title){
	
$stmt = $this->db->prepare("INSERT INTO category (title) VALUES (:title)");
$stmt->execute(['title'=>$title]);
}

public function delCatAndRequest($id){
	
	$stmt = $this->db->prepare("DELETE category, request, responce FROM category LEFT JOIN request ON request.cat_id=category.category_id LEFT JOIN responce ON responce.request_id= request.id WHERE category_id = :id");
	$stmt->execute(['id'=>$id]);
	
}

public function showOneCat($id){
	
	$stmt = $this->db->prepare("SELECT req.id, req.text, req.is_published, req.has_responce, req.dated
    FROM request req JOIN category cat ON cat.category_id = req.cat_id WHERE cat.category_id ={$id}");
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);

}

public function delRequest($id){
	
	$stmt = $this->db->prepare("DELETE FROM request WHERE id = {$id}");
	$stmt ->execute();
}

public function hideRequest($id){
	
	$stmt = $this->db->prepare("UPDATE request SET is_published = 0 WHERE id = {$id}");
	$stmt ->execute();
}

public function showRequest($id){
	
	$stmt = $this->db->prepare("UPDATE request SET is_published = 1 WHERE id = {$id}");
	$stmt ->execute();
}

public function shiftRequest($cat, $id){
	
	$stmt = $this->db->prepare("UPDATE request SET cat_id = {$cat} WHERE id = {$id}");
	$stmt ->execute();
}

public function setResponce($id, $text){
	
	$stmt = $this->db->prepare("INSERT INTO responce (request_id, text) VALUES ({$id}, {$text})");
	$stmt->execute();
	
}

public function showNewRequest($cat){
	
	$stmt = $this->db->prepare("SELECT *
    FROM request WHERE has_responce=0 AND cat_id= {$cat} ORDER BY id");
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);

}


}


?>
