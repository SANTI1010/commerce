<?php 

require_once "./View/ProductsView.php";
require_once "./Model/ProductsModel.php";
require_once "./Model/CategoriesModel.php";
require_once "./View/CategoriesView.php";
require_once "./Helpers/Helper.php";

class ProductsController {

	private $view;
	private $model;
	private $modelCategories;
	private $viewCategories;
	private $authHelper;

	function __construct(){
		$this->view = new ProductsView();
		$this->model = new ProductsModel();
		$this->modelCategories = new CategoriesModel();
		$this->viewCategories = new CategoriesView();
		$this->authHelper = new Helper();
	}


	function Home() {
		$products = $this->model->GetProducts();
		$categories = $this->modelCategories->GetCategories();
		$this->view->ShowHome($products, $categories);
	}


	function HomeAdmin() {
		$this->authHelper->checkLoggedIn();
		$products = $this->model->GetProducts();
		$categories = $this->modelCategories->GetCategories();
		$this->view->ShowHomeAdmin($products, $categories);
	}


	function InsertProducts() {
		$this->authHelper->checkLoggedIn();
		$this->model->InsertProducts($_POST['input_marca'],$_POST['input_talle'],$_POST['input_precio'],$_POST['categoria']);
		header("Location:".BASE_URL."homeAdmin");
	}
	
	function DeleteProducts($params = null){
		$this->authHelper->checkLoggedIn();
		$products_id = $params[':ID'];
		$this->model->DeleteProducts($products_id);
		header("Location:".BASE_URL."homeAdmin");
	}


	function EditProducts($params = null){
		$this->authHelper->checkLoggedIn();
		$id = $params[':ID'];
		$categories = $this->modelCategories->GetCategories();
		$this->view->ShowEditProducts($id,$categories);
	}

	function UpdateProducts($params = null) {
		$this->authHelper->checkLoggedIn();
		$id = $params[':ID'];
		$this->model->UpdateProducts($id,$_POST['update_marca'],$_POST['update_talle'],$_POST['update_precio'],$_POST['categoria']);

		header("Location:".BASE_URL."homeAdmin");
	}

	function DetalleProducts($params = null) {
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
