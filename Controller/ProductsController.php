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
		$products = $this->model->GetProducts();
		$categories = $this->modelCategories->GetCategories();

		$this->view->ShowHome($products, $categories);
	}


	function HomeAdmin() {
		$this->checkLoggedIn();
		$products = $this->model->GetProducts();
		$categories = $this->modelCategories->GetCategories();

		$this->view->ShowHomeAdmin($products, $categories);
	}



	function InsertProducts() {
		$categoria = $_POST['categoria'];

		if($categoria == 1) {
			$categoria = 1;
		} else {
			$categoria = 2;
		}

		$this->model->InsertProducts($_POST['input_marca'],$_POST['input_talle'],$_POST['input_precio'],$categoria);
		header("Location:".BASE_URL."homeAdmin");
	}
	
	function DeleteProducts($params = null){
		$products_id = $params[':ID'];
		$this->model->DeleteProducts($products_id);
		header("Location:".BASE_URL."homeAdmin");
	}


	function EditProducts($params = null){
		$id = $params[':ID'];
		$categories = $this->modelCategories->GetCategories();
		$this->view->ShowEditProducts($id,$categories);
	}

	function UpdateProducts($params = null) {
		$id = $params[':ID'];
		$this->model->UpdateProducts($id,$_POST['update_marca'],$_POST['update_talle'],$_POST['update_precio'],$_POST['categoria']);

		header("Location:".BASE_URL."homeAdmin");
	}

	function DetalleProducts($params = null) {
	//	$this->checkLoggedIn();
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


}
