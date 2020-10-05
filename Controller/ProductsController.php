<?php 

require_once "./View/ProductsView.php";
require_once "./Model/ProductsModel.php";
require_once "./Model/CategoriesModel.php";
require_once "./View/CategoriesView.php";

class ProductsController {

	private $view;
	private $model;
	private $modelCategories;
	private $viewCategories;

	function __construct(){

	/***********************************/
	/*Solo para cuando es acceso privado va en el __construct() */
	/*      $this->checkLoggedIn();     */
	/***********************************/
		$this->view = new ProductsView();
		$this->model = new ProductsModel();
		$this->modelCategories = new CategoriesModel();
		$this->viewCategories = new CategoriesView();
	}


	private function checkLoggedIn(){
		session_start();
		if(!isset($_SESSION["NOMBRE"])){
			header("Location:".LOGIN);
			die();//corto toda la ejecucion
		}else{
			if ( isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) { 
				header("Location:".LOGOUT);
				die();//corto toda la ejecucion
			} 
		}
	}

	function Home() {
		//chequeo session
		$this->checkLoggedIn();

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
		$this->checkLoggedIn();
		$id = $params[':ID'];
		$detalle = $this->model->DetalleProducts($id);
		$this->view->ShowDetalle($detalle);
	}

	function GetCategoriesOrder($params = null){
		$idCateg = $params[':categorie'];
		$categories = $this->model->GetCategoriesOrder($idCateg);
		$this->viewCategories->ShowCategories($categories);
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
