<?php 

class CategoriesModel {
	
	private $db;

	function __construct() {
		$this->db = new PDO('mysql:host=localhost;'.'dbname=db_productos;charset=utf8', 'root', ''); 
	}	


	function GetCategories(){
	    $sentencia = $this->db->prepare("SELECT * FROM categorias");
	    $sentencia->execute(array());
	    return $sentencia->fetchAll(PDO::FETCH_OBJ);//me lo trae en formato OBJETO
	}

	/*function GetCategoriesOrder($id){
	    $sentencia = $this->db->prepare("SELECT * FROM categorias WHERE  id_categoria=?");
	    $sentencia->execute(array($id));
	    return $sentencia->fetchAll(PDO::FETCH_OBJ);//me lo trae en formato OBJETO
	}*/
	
}



 ?>