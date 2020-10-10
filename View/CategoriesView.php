<?php

//El smarty va en la view
require_once "./libs/smarty/Smarty.class.php";

class CategoriesView {	
	private $title;
	function __construct() {		
		$this->title = "Lista de Productos";
	}


	function ShowCategories($categorie){
		// inicializo Smarty y asigno las variables para mostrar
		$smarty = new Smarty();
		$smarty->assign('categories', $categorie);
		$smarty->display('templates/categories.tpl'); // muestro el template   
	}

		function ShowEditCategories($id) {
		$smarty = new Smarty();
		$smarty->assign('id', $id);
		$smarty->display('templates/updateCategories.tpl');   
	}

}

?>