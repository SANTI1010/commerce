<?php

//El smarty va en la view
require_once "./libs/smarty/Smarty.class.php";

class UserView {	
	private $title;
	function __construct() {		
		$this->title = "Login";
	}

	function ShowLogin($message = ""){
		$smarty = new Smarty();
		$smarty->assign('titulo',$this->title);
		$smarty->assign('message',$message);

		$smarty->display('templates/login.tpl'); // muestro el template 		
	}

	/*function ShowHome($products,$categorias) {
		// inicializo Smarty y asigno las variables para mostrar
		$smarty = new Smarty();
		$smarty->assign('titulo',$this->title);
		$smarty->assign('products', $products);
		$smarty->assign('categorias', $categorias);
		$smarty->display('templates/products.tpl'); // muestro el template   
	}*/




}

?>