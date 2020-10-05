<?php 

class ProductsModel {
	
	private $db;

	function __construct() {

		$this->db = new PDO('mysql:host=localhost;'.'dbname=db_productos;charset=utf8', 'root', ''); 

	}	

		//Seleccionar
		function GetProducts(){
		    $sentencia = $this->db->prepare("SELECT * FROM productos");
		    $sentencia->execute();
		    return $sentencia->fetchAll(PDO::FETCH_OBJ);//me lo trae en formato OBJETO
		}

		//Insertar
		function InsertProducts($marca,$talle,$precio,$id_categoria){
		    $sentencia = $this->db->prepare("INSERT INTO productos(marca,talle,precio,id_categoria) VALUES (?,?,?,?)");
		    $sentencia->execute(array($_POST['input_marca'],$_POST['input_talle'],$_POST['input_precio'],$id_categoria));
		}

		//Borrar
		function DeleteProducts($product_id) {
		    $sentencia = $this->db->prepare("DELETE FROM productos WHERE id_producto=?");
		    $sentencia->execute(array($product_id));
		}

				//Detallar
		function DetalleProducts($id){
		    $sentencia = $this->db->prepare("SELECT * FROM productos WHERE id_producto=?");
		    $sentencia->execute(array($id));
		    return $sentencia->fetchAll(PDO::FETCH_OBJ);//me lo trae en formato OBJETO
		}


		function GetCategoriesOrder($id){
	    $sentencia = $this->db->prepare("SELECT * FROM productos INNER JOIN categorias ON productos.id_categoria = categorias.id_categoria WHERE  productos.id_categoria=?");
	    $sentencia->execute(array($id));
	    return $sentencia->fetchAll(PDO::FETCH_OBJ);//me lo trae en formato OBJETO
		}


		//Actualizar
		function MarkCompletedTask($task_id) {
		    $sentencia = $this->db->prepare("UPDATE task SET completed=1 WHERE id=?");
		    $sentencia->execute(array($task_id));  
		}
	
}



 ?>