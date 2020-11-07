<?php

require_once "./Model/ProductsModel.php";
require_once "ApiController.php";


class ApiProductsController extends ApiController {

	function __construct() {
		parent::__construct();
		$this->model = new ProductsModel();
		$this->view = new ApiView();

	}

	public function getProducts($params = null) {
		$products = $this->model->GetProducts();
		$this->view->response($products,200);
	}


	public function getProductsID($params = null) {
		$products_id = $params[':ID'];
		$products = $this->model->GetProductById($products_id);


		if (!empty($products))  //puede ser distinto de false
			$this->view->response($products,200);
		else
			//404
			$this->view->response('La tarea no existe',404);		
	}


	public function DeleteProducts($params = null) {
		$products_id = $params[':ID'];
		$products = $this->model->DeleteProducts($products_id);	
	}

	public function InsertProducts($params = null) {
		//traer la data desde el body postman
		$body = $this->getData();
		$products = $this->model->InsertProducts($body->marca, $body->talle,$body->precio,$body->id_categoria);	

		if ($products)  //puede ser distinto de false
			$this->view->response('Anduvo',200);
		else
			//404
			$this->view->response('La tarea no se agrego',404);	

	}

	


}
