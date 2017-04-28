<?php

namespace controllers;
use models\Category;

class CategoryController extends CoreController{


function __construct()
	{
		$this->model = new Category();
	}
	
public function getList(){
	
	$session = $this->model->checkLogged();
	
	$getAllCategories = $this->model->showCategoriesList();
	
	echo $this->render('show_category.php', ['getAllCategories' => $getAllCategories]);
	
}

public function postAdd($params, $post){
	$session = $this->model->checkLogged();
	
	if($post){
		$name = $post['name'];
		$this->model->createCategory($name);
		header('Location: ?/category/list');
	}
}

	public function getDelete($params)
	{
		$session = $this->model->checkLogged();
		if (isset($params['cat']) && is_numeric($params['cat'])) {

			$this->model->delCatAndRequest($params['cat']);
		
				header('Location: ?/category/list');
			
		}
	}
	
	
}



?>
