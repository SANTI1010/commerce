<?php

class Helper {

	private $view;

	public function __construct() {
		$this->view = new UserView();
	}


	public function Login($user) {
		session_start();
		$_SESSION["NOMBRE"] = $user->nombre;
		$_SESSION['LAST_ACTIVITY'] = time(); // actualiza el último instante de actividad
	}

	public function Logout() {
		session_start();
		session_destroy();
		header("Location:".LOGIN);
	}

	public function checkLoggedIn(){
	session_start();
	if(!isset($_SESSION["NOMBRE"])){
		header("Location:".LOGIN);
		die();//corto toda la ejecucion
	}else{
		if ( isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) { 
			header("Location:".LOGOUT);
			die();//corto toda la ejecucion
		} 
	}
}

}


?>