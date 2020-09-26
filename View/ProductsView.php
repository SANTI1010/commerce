<?php

//El smarty va en la view
require_once "./libs/smarty/Smarty.class.php";

class ProductsView {	
	private $title;
	function __construct() {		
		$this->title = "Lista de Productos";
	}

	function ShowHome($products) {
		// inicializo Smarty y asigno las variables para mostrar
		$smarty = new Smarty();
		$smarty->assign('titulo',$this->title);
		$smarty->assign('products', $products);
		$smarty->display('templates/products.tpl'); // muestro el template   
	}


	function ShowHomeLocation() {
		header("Location: ".BASE_URL."home");
	}


}

?>