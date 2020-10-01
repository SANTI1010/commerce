<?php 

require_once "./View/CategoriesView.php";
require_once "./Model/CategoriesModel.php";


class CategoriesController {

	private $view;
	private $model;

	function __construct(){
		$this->view = new CategoriesView();
		$this->model = new CategoriesModel();
	}


	function GetCategories(){
		$categories = $this->model->GetCategories($categorie);
		$this->view->ShowCategories($categories);
	}

	

	




}
