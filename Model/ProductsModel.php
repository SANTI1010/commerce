<?php 

class ProductsModel {
	
	private $db;

	function __construct() {

		try {
			$this->db = new PDO('mysql:host=localhost;'.'dbname=db_productos;charset=utf8', 'root', ''); 
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

		} catch(Exception $e) {
			var_dump($e);
		}
		return $this->db;

	}	

		//Seleccionar
		function GetProducts(){
			$sentencia = $this->db->prepare("SELECT * FROM productos INNER JOIN categorias ON productos.id_categoria = categorias.id_categoria");
		    $sentencia->execute();
		    return $sentencia->fetchAll(PDO::FETCH_OBJ);//me lo trae en formato OBJETO
		}

		function GetProductById($id) {
			$sentencia = $this->db->prepare("SELECT * FROM productos INNER JOIN categorias ON productos.id_categoria = categorias.id_categoria WHERE id_producto=?");
		    $sentencia->execute(array($id));
		    return $sentencia->fetch(PDO::FETCH_OBJ);//me lo trae en formato OBJETO
		}

		//Insertar
		function InsertProducts($marca,$talle,$precio,$id_categoria,$img = null){
		    $sentencia = $this->db->prepare("INSERT INTO productos(marca,talle,precio,id_categoria,imagen) VALUES (?,?,?,?,?)");
		    $sentencia->execute(array($marca,$talle,$precio,$id_categoria,$img));
		    return $this->db->lastInsertId();
		}

		//Borrar
		function DeleteProducts($product_id) {
		    $sentencia = $this->db->prepare("DELETE FROM productos WHERE id_producto=?");
		    $sentencia->execute(array($product_id));
		    return $sentencia->rowCount();//me dice cuantas filas toco
		}

				//Detallar
		function DetalleProducts($id){
		    $sentencia = $this->db->prepare("SELECT * FROM productos INNER JOIN categorias ON productos.id_categoria = categorias.id_categoria WHERE id_producto=?");
		    $sentencia->execute(array($id));
		    return $sentencia->fetch(PDO::FETCH_OBJ);//me lo trae en formato OBJETO
		}


		function GetCommentById($id_producto) {
			$sentencia = $this->db->prepare("SELECT * FROM comentarios INNER JOIN productos ON comentarios.id_producto = productos.id_producto WHERE  comentarios.id_producto=?");
	   		$sentencia->execute(array($id_producto));
	    	return $sentencia->fetchAll(PDO::FETCH_OBJ);	
		}


		function GetCategoriesOrder($id){
	    $sentencia = $this->db->prepare("SELECT * FROM productos INNER JOIN categorias ON productos.id_categoria = categorias.id_categoria WHERE  productos.id_categoria=?");
	    $sentencia->execute(array($id));
	    return $sentencia->fetchAll(PDO::FETCH_OBJ);//me lo trae en formato OBJETO
		}

		//Actualizar
		function UpdateProducts($id,$marca,$talle,$precio,$id_categoria) {
		    $sentencia = $this->db->prepare("UPDATE productos SET marca=?, talle=?, precio=?, id_categoria=? WHERE id_producto=? ");
		    $sentencia->execute(array($marca,$talle,$precio,$id_categoria,$id));
		    return $sentencia->rowCount();
		}
}



 ?>