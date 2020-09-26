<?php 

require_once "./View/ProductsView.php";
require_once "./Model/ProductsModel.php";


class ProductsController {

	private $view;
	private $model;

	function __construct(){
		$this->view = new ProductsView();
		$this->model = new ProductsModel();
	}


	function Home() {
		$products = $this->model->GetProducts();
		$this->view->ShowHome($products);
	}

	function InsertProducts() {
		$categoria = $_POST['categoria'];

		if($categoria == 1) {
			$categoria = 1;
		} else {
			$categoria = 2;
		}


		$this->model->InsertProducts($_POST['input_marca'],$_POST['input_talle'],$_POST['input_precio'],$categoria);
		$this->view->ShowHomeLocation();
	}
	
	function DeleteProducts($params = null){
		$products_id = $params[':ID'];
		$this->model->DeleteProducts($products_id);
		$this->view->ShowHomeLocation();
	}

	function GetCategories($params = null) {
		$categories = $params[':ID'];
		$this->model->GetCategories($categories);
		$this->view->ShowCategories($categories);
		$this->view->ShowHomeLocation();		
	}






	/*
	function MarkCompletedTask($params = null){
		$products_id = $params[':ID'];

		$this->model->MarkCompletedTask($products_id);
		$this->view->ShowHomeLocation();
	}
	*/





}
