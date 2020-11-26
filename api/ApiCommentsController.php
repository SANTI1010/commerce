<?php

require_once "./Model/CommentsModel.php";
require_once "ApiController.php";


class ApiCommentsController extends ApiController {

	function __construct() {
		parent::__construct();
		$this->model = new CommentsModel();
		$this->view = new ApiView();

	}

	public function getCommentsById($params = null) {
		$comment_id = $params[':ID'];
		$comment = $this->model->getCommentsById($comment_id);
		$this->view->response($comment,200);
	}



	public function insertComments($params = null) {
		$body = $this->getData();
		$comment = $this->model->insertComments($body->comentario, $body->puntaje, $body->id_producto, $body->id_usuario);	

		if ($comment) 
			$this->view->response($this->model->getCommentsById($comment),201);
		else
			$this->view->response('La tarea no se agrego',404);	
	}

	public function deleteComment($params = null){
		$comment_id = $params[':ID'];
		$result = $this->model->DeleteComments($comment_id);	

		if ($result > 0)  //viene del rowCount y toca alguna
			$this->view->response('El comentario se borro correctamente',200);
		else
			//404
			$this->view->response('La tarea no existe',404);	
	}





}
