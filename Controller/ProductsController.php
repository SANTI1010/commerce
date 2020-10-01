<?php 

require_once "./View/ProductsView.php";
require_once "./Model/ProductsModel.php";
require_once "./Model/CategoriesModel.php";


class ProductsController {

	private $view;
	private $model;
	private $modelCategories;

	function __construct(){
		$this->view = new ProductsView();
		$this->model = new ProductsModel();
		$this->modelCategories = new CategoriesModel();
	}


	function Home() {
		$products = $this->model->GetProducts();
		$categories = $this->modelCategories->GetCategories();

		$this->view->ShowHome($products, $categories);
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


	function DetalleProducts($params = null) {
		$id = $params[':ID'];
		$detalle = $this->model->DetalleProducts($id);
		$this->view->ShowDetalle($detalle);
	}









	function volver() {
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
