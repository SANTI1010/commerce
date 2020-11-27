<?php

//El smarty va en la view
require_once "./libs/smarty/Smarty.class.php";

class ProductsView {	
	private $title;
	function __construct() {		
		$this->title = "Lista de Productos";
	}

	function ShowHome($products,$categorias,$comments,$users,$rol=null) {
		$smarty = new Smarty();
		$smarty->assign('titulo',$this->title);
		$smarty->assign('products', $products);
		$smarty->assign('categorias', $categorias);
		$smarty->assign('comments', $comments);
		$smarty->assign('users', $users);
		$smarty->assign('rol', $rol);

		$smarty->display('templates/products.tpl'); 
	}


		function ShowDetalle($detalle,$id_user = null, $rol_user = null) {
		$smarty = new Smarty();
		$smarty->assign('detalle', $detalle);
		$smarty->assign('id_user', $id_user);
		$smarty->assign('rol_user', $rol_user);
		$smarty->display('templates/detalle.tpl');    
	}



	function ShowHomeLocation() {
		header("Location: ".BASE_URL."home");
	}

	function ShowHomeAdmin($products,$categorias,$users,$comments) {
		$smarty = new Smarty();
		$smarty->assign('products', $products);
		$smarty->assign('categorias', $categorias);
		$smarty->assign('users', $users);
		$smarty->assign('comments', $comments);

		$smarty->display('templates/productsAdmin.tpl');   
	}


	function ShowEditProducts($id,$categorias,$product) {
		$smarty = new Smarty();
		$smarty->assign('id', $id);
		$smarty->assign('categorias', $categorias);
		$smarty->assign('product', $product);
		$smarty->display('templates/updateProducts.tpl');   
	}

	function showError($msj){
		$smarty = new Smarty();
		$smarty->assign('msj', $msj);
		$smarty->display('templates/msjError.tpl');
	}


	function ShowProductsCSR() {
		$smarty = new Smarty();
		$smarty->display('templates/productsCSR.tpl');
	}


}

?>