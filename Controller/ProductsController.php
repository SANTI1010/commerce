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
		$countFilas = $this->model->GetAllProducts();
		$rol = $this->helper->getRol();

		if(isset($rol) && $rol == 'user') {

			//Paginación
			$articulo_por_pagina = 3;
	        $total_productos_db = $countFilas;
	        $paginas = $total_productos_db / $articulo_por_pagina;
	        $paginas_total = ceil($paginas);

			
			if(empty($_GET['pagina'])) {
				header('Location:products?pagina=1');			
			} else {
				$page = ($_GET['pagina']-1)*3;
			}

			if($_GET['pagina'] > $paginas_total || $_GET['pagina'] <= 0){
				header('Location:products?pagina=1');
			}

			$productLimit = $this->model->GetProductsLimit($page,$articulo_por_pagina);
			$this->helper->checkLoggedIn();
			$this->view->ShowHome($products,$categories,$comments,$users,$rol,$countFilas, $productLimit);
		} else if(isset($rol) && $rol == 'admin'){
			$this->helper->checkLoggedIn();
			$this->view->ShowHome($products,$categories,$comments,$users,$rol,$countFilas);				
		} else {
			$this->view->ShowHome($products,$categories,$comments,$users,$rol);
		}
		
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

		if(isset($_POST['input_marca']) && $_POST['input_marca'] != "" && isset($_POST['input_talle']) && $_POST['input_marca'] != "" && isset($_POST['input_precio']) && $_POST['input_precio'] != "" && isset($_POST['categoria']) && $_POST['categoria'] != "" && isset($_FILES['input_name']) && $_FILES['input_name'] != "") {

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
		}else{ 
			$this->view->showError("Error al insertar producto");
		}	
	}
	
	function DeleteProducts($params = null){
		$this->helper->checkLoggedIn();
		$products_id = $params[':ID'];
		if(isset($products_id) && $products_id != ""){
			$path = $this->model->GetProductId($products_id);
			unlink($path->imagen);

			$this->model->DeleteProducts($products_id);
			header("Location:".BASE_URL."home");
		}else {
			$this->view->showError("Erro al eliminar un producto");

	}
	}


	function EditProducts($params = null){
		$this->helper->checkLoggedIn();
		$id = $params[':ID'];
		$categories = $this->modelCategories->GetCategories();
		$product = $this->model->GetProductById($id);

		if(isset($id) && $id != "" && isset($categories) && $categories != "" && isset($product) && $product != ""){ 
			$this->view->ShowEditProducts($id,$categories,$product);
		} else {
			$this->view->ShowError("Error al editar el producto");
		}
	}

	function UpdateProducts($params = null) {
		$this->helper->checkLoggedIn();
		$id = $params[':ID'];
		//Si no se edito la imagen, viene vacio, entonces inserto la previa.
		if (isset($id) && $id != "" && isset($_POST['update_marca']) && $_POST['update_marca'] != "" && isset($_POST['update_talle']) && $_POST['update_talle'] != "" && isset($_POST['update_precio']) && $_POST['update_precio'] != "" && isset($_POST['categoria']) && $_POST['categoria'] != "" ) {
			if($_FILES['update_img']['name'] == ""){
				$this->model->UpdateProducts($id,$_POST['update_marca'],$_POST['update_talle'],$_POST['update_precio'],$_POST['categoria'],$_POST['previous_img']);
			} else {
			//Si se edito la imagen, pregunto que tipo es, la meto el nombre, borro la previa e inserto la nueva.	
				if($_FILES['update_img']['type'] == "image/jpg" || $_FILES['update_img']['type'] == "image/jpeg" || $_FILES['update_img']['type'] == "image/png" || '…') {	
					$realName = $this->uniqueSaveName($_FILES['update_img']['name'], $_FILES['update_img']['tmp_name']);
				
					if(isset($_POST['previous_img'])) {
					unlink($_POST['previous_img']);
				}

					$this->model->UpdateProducts($id,$_POST['update_marca'],$_POST['update_talle'],$_POST['update_precio'],$_POST['categoria'], $realName);
				}
			}
		} else {
			$this->view->showError("Error al actualizar");
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
