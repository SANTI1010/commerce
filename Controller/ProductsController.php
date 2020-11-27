<?php 

require_once "./View/ProductsView.php";
require_once "./Model/ProductsModel.php";
require_once "./Model/CategoriesModel.php";
require_once "./View/CategoriesView.php";
require_once "./Helpers/Helper.php";
require_once "./Model/UserModel.php";
require_once "./Model/CommentsModel.php";

class ProductsController {

	private $view;
	private $model;
	private $modelCategories;
	private $viewCategories;
	private $helper;
	private $modelUsers;
	private $modelComments;

	function __construct(){
		$this->view = new ProductsView();
		$this->model = new ProductsModel();
		$this->modelCategories = new CategoriesModel();
		$this->viewCategories = new CategoriesView();
		$this->helper = new Helper();
		$this->modelUsers = new UserModel();
		$this->modelComments = new CommentsModel();

	}

	function Home($params = null){
		$products = $this->model->GetProducts();
		$categories = $this->modelCategories->GetCategories();
		$users = $this->modelUsers->getUsers();
		$comments = $this->modelComments->getCommentByNameUser();
		$rol = $this->helper->getRol();
		if(isset($rol) && $rol != NULL){
			$this->helper->checkLoggedIn();
			$this->view->ShowHome($products,$categories,$comments,$users,$rol);				
		} else {
			$this->view->ShowHome($products,$categories,$comments,$users,$rol);
		}
		
	}


	function HomeAdmin($params = null){
		$this->helper->getRol();
		$this->helper->checkLoggedIn();
		$products = $this->model->GetProducts();
		$categories = $this->modelCategories->GetCategories();
		$users = $this->modelUsers->getUsers();
		$comments = $this->modelComments->getCommentByNameUser();

		if(isset($products) && $products != '' && isset($categories) && $categories != '' && isset($users) && $users != '')
			$this->view->ShowHomeAdmin($products, $categories,$users, $comments);
		else
			$this->view->ShowError("No hay productos");
	}

/*Construye un archivo unico y lo manda a mi carpeta de img*/
	function uniqueSaveName($realName,$tempName){
		$filePath = "img/" . uniqid("", true) . "." 
.		strtolower(pathinfo($realName, PATHINFO_EXTENSION));
		
		//Muevo el nombre temp a img
		move_uploaded_file($tempName, $filePath);	

		return $filePath;
	}


	function InsertProducts() {
		$this->helper->checkLoggedIn();

		if($_FILES['input_name']['type'] == "image/jpg" || $_FILES['input_name']['type'] == "image/jpeg" || $_FILES['input_name']['type'] == "image/png" || …) 
		{	
			$realName = $this->uniqueSaveName($_FILES['input_name']['name'], $_FILES['input_name']['tmp_name']);

			$success = $this->model->InsertProducts($_POST['input_marca'],$_POST['input_talle'],$_POST['input_precio'],$_POST['categoria'],$realName);
		}else {
			$success = $this->model->InsertProducts($_POST['input_marca'],$_POST['input_talle'],$_POST['input_precio'],$_POST['categoria']);
		}
		
		if($success)
			header("Location:".BASE_URL."home");
		else
			$this->helper->showError("No se pudo insertar la tarea correctamente");
	}
	
	function DeleteProducts($params = null){
		$this->helper->checkLoggedIn();
		$products_id = $params[':ID'];
		$this->model->DeleteProducts($products_id);
		header("Location:".BASE_URL."home");
	}


	function EditProducts($params = null){
		$this->helper->checkLoggedIn();
		$id = $params[':ID'];
		$categories = $this->modelCategories->GetCategories();
		$product = $this->model->GetProductById($id);
		$this->view->ShowEditProducts($id,$categories,$product);
	}

	function UpdateProducts($params = null) {
		$this->helper->checkLoggedIn();
		$id = $params[':ID'];

		if($_FILES['update_img']['type'] == "image/jpg" || $_FILES['update_img']['type'] == "image/jpeg" || $_FILES['update_img']['type'] == "image/png" || …) 
		{	
			$realName = $this->uniqueSaveName($_FILES['update_img']['name'], $_FILES['update_img']['tmp_name']);

			$this->model->UpdateProducts($id,$_POST['update_marca'],$_POST['update_talle'],$_POST['update_precio'],$_POST['categoria'], $realName);
		}else {
			$this->model->UpdateProducts($id,$_POST['update_marca'],$_POST['update_talle'],$_POST['update_precio'],$_POST['categoria']);
		}

		header("Location:".BASE_URL."home");
	}

	function DetalleProducts($params = null) {
		$id = $params[':ID'];
		$rol_user = $this->helper->getRol();
		$detalle = $this->model->DetalleProducts($id);
		if(isset($rol_user) && $rol_user != NULL){	
			$id_user = $this->helper->getIdUsuario();
			$this->view->ShowDetalle($detalle,$id_user,$rol_user);
		} else {
			$this->view->ShowDetalle($detalle);
		}
		
	}

	function GetCategoriesOrder($params = null){
		$idCateg = $params[':categorie'];
		$categories = $this->model->GetCategoriesOrder($idCateg);
		$this->viewCategories->ShowCategories($categories);
	}


	function volver() {
		$this->view->ShowHomeLocation();
	}


	function ProductsCSR(){
		$this->view->ShowProductsCSR();
	}

}
