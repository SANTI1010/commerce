
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

	
		//Borrar
		function DeleteComments($comment_id) {
		    $sentencia = $this->db->prepare("DELETE FROM comentarios WHERE id_comentario=?");
		    $sentencia->execute(array($comment_id));
		    return $sentencia->rowCount();//me dice cuantas filas toco
		}


}



 ?>