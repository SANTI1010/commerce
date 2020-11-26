
<?php 

class CommentsModel {
	
	private $db;

	function __construct() {
		$this->db = new PDO('mysql:host=localhost;'.'dbname=db_productos;charset=utf8', 'root', ''); 
	}	



	function getCommentByNameUser(){
		$sentencia = $this->db->prepare("SELECT * FROM comentarios INNER JOIN usuarios ON comentarios.id_usuario = usuarios.id_usuario");
	    $sentencia->execute();
	    return $sentencia->fetchAll(PDO::FETCH_OBJ);//me lo trae en formato OBJETO
	}

	function getCommentsById($id){
    	$sentencia = $this->db->prepare("SELECT * FROM comentarios WHERE id_producto=?");
    	$sentencia->execute(array($id));
    	return $sentencia->fetchAll(PDO::FETCH_OBJ);//me lo trae en formato OBJETO
	}

	//Insertar
		function InsertComments($comentario,$puntaje,$id_producto,$id_usuario){
		    $sentencia = $this->db->prepare("INSERT INTO comentarios(comentario,puntaje,id_producto,id_usuario) VALUES (?,?,?,?)");
		    $sentencia->execute(array($comentario,$puntaje,$id_producto,$id_usuario));
		    return $this->db->lastInsertId();
		}

	
/*
	function GetCategories(){
	    $sentencia = $this->db->prepare("SELECT * FROM categorias");
	    $sentencia->execute(array());
	    return $sentencia->fetchAll(PDO::FETCH_OBJ);//me lo trae en formato OBJETO
	}

	//Insertar
	function InsertCategories($nameCategorie){
	    $sentencia = $this->db->prepare("INSERT INTO categorias(nombre) VALUES (?)");
	    $sentencia->execute(array($nameCategorie));
	}

	//Borrar
	function DeleteCategories($categorie_id) {
	    $sentencia = $this->db->prepare("DELETE FROM categorias WHERE id_categoria=?");
	    $sentencia->execute(array($categorie_id));
	}


	//Actualizar
	function UpdateCategories($id,$nombre) {
		$data = [
		    'id' => $id,
		    'nombre' => $nombre,
		];

	    $sql = "UPDATE categorias SET nombre=:nombre WHERE id_categoria=:id ";
	    $this->db->prepare($sql)->execute($data);
	}

*/

}



 ?>