<?php

namespace models;

class Admin extends Model{
	
	
	public function addNewAdmin($name, $password){
		
	$stmt= $this->db->prepare("INSERT INTO admin (name, password) VALUES (:name, :password)");
	$stmt->execute(['name' =>$name, 'password'=>md5($password)]);
	
	}
	
	public function selectAllAdmin(){
		
		$stmt = $this->db->prepare("SELECT * FROM admin");
		$stmt->execute();
		return $stmt->fetchAll();
		
	}
	
	public function selectOneAdmin($id){
		
		$stmt = $this->db->prepare("SELECT * FROM admin WHERE id = :id");
		$stmt->execute(['id' =>$id]);
		return $stmt->fetch();
	}
	
	public function updateAdminPass($id, $password){
		
		$stmt = $this->db->prepare("UPDATE admin SET password = :password WHERE id= :id");
		$stmt->execute(['password'=>md5($password), 'id'=>$id]);
		
	}
	
	public function deleteAdmin($admin){
		
	$stmt = $this->db->prepare("DELETE FROM admin WHERE id = :id");
	$stmt->execute(['id'=>$admin]);
		
	}
	
	public function findAuth($log, $pass)
	{
		$stmt = $this->db->prepare("SELECT * FROM admin WHERE name = :name AND password = :password");
		
		$stmt->execute(['name'=>$log, 'password'=>md5($pass)]);
		
		return $stmt->fetch(); 
		
		}
		
	
}











?>
