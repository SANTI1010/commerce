<?php

//El smarty va en la view
require_once "./libs/smarty/Smarty.class.php";

class ProductsView {	
	private $title;
	function __construct() {		
		$this->title = "Lista de Productos";
	}

	function ShowHome($products,$categorias) {
		// inicializo Smarty y asigno las variables para mostrar
		$smarty = new Smarty();
		$smarty->assign('titulo',$this->title);
		$smarty->assign('products', $products);
		$smarty->assign('categorias', $categorias);
		$smarty->display('templates/products.tpl'); // muestro el template   
	}


		function ShowDetalle($detalle) {
		// inicializo Smarty y asigno las variables para mostrar
		$smarty = new Smarty();
		$smarty->assign('detalle', $detalle);
		$smarty->display('templates/detalle.tpl'); // muestro el template   
	}



	function ShowHomeLocation() {
		header("Location: ".BASE_URL."home");
	}

	function ShowHomeAdmin($products,$categorias) {
		$smarty = new Smarty();
		$smarty->assign('products', $products);
		$smarty->assign('categorias', $categorias);
		$smarty->display('templates/productsAdmin.tpl');   
	}


	function ShowEditProducts($id,$categorias,$product) {
		$smarty = new Smarty();
		$smarty->assign('id', $id);
		$smarty->assign('categorias', $categorias);
		$smarty->assign('product', $product);
		$smarty->display('templates/updateProducts.tpl');   
	}


}

?>