<?php
namespace models;

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
	return $stmt->fetchAll();
	
}

public function createCategory($title){
	
$stmt = $this->db->prepare("INSERT INTO category (title) VALUES (:title)");
$stmt->execute(['title'=>$title]);
}

public function delCatAndRequest($id){
	
	$stmt = $this->db->prepare("DELETE category, request, responce FROM category LEFT JOIN request ON request.cat_id=category.category_id LEFT JOIN responce ON responce.request_id= request.id WHERE category_id = :id");
	$stmt->execute(['id'=> $id]);
	
}

public function showOneCat($id){
	
	$stmt = $this->db->prepare("SELECT req.id, req.text, req.is_published, req.has_responce, req.dated
    FROM request req JOIN category cat ON cat.category_id = req.cat_id WHERE cat.category_id ={$id}");
	$stmt->execute();
	return $stmt->fetchAll();

}

}


?>
