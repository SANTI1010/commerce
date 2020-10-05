<?php 

class UserModel {
	
	private $db;

	function __construct() {
		$this->db = new PDO('mysql:host=localhost;'.'dbname=db_productos;charset=utf8', 'root', ''); 
	}	
	

	function GetUser($user){
		$sentencia = $this->db->prepare("SELECT * FROM usuarios WHERE nombre=?");
		$sentencia->execute(array($user));
		return $sentencia->fetch(PDO::FETCH_OBJ);//me lo trae en formato OBJETO
	}


			/*********************/
			/*Registro de usuario*/
			/*********************/
	/*
		$pass = "12345";//viene desde un input
		$hash = password_hash($pass, PASSWORD_DEFAULT);

		$passwordInput = $pass;
		if (password_verify($passwordInput, $hash)) {
			echo "Credenciales validas";
		}else{
			echo "Credenciales invalidas";
		}
	*/

}



?>