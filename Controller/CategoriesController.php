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

	function InsertCategories() {
		$nameCategories = $_POST['input_categoria'];
		$this->model->InsertCategories($nameCategories);
		header("Location:".BASE_URL."homeAdmin");
	}

	function DeleteCategories($params = null) {
		$categorie_id = $params[':ID'];
		$this->model->DeleteCategories($categorie_id);
		header("Location:".BASE_URL."homeAdmin");
	}


	function EditCategories($params = null){
		$id = $params[':ID'];
		$this->view->ShowEditCategories($id);
	}

	function UpdateCategories($params = null) {
		$id = $params[':ID'];
		$this->model->UpdateCategories($id,$_POST['update_nombre']);

		header("Location:".BASE_URL."homeAdmin");
	}

}
