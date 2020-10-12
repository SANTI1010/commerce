<?php 

require_once "./View/UserView.php";
require_once "./Model/UserModel.php";
require_once "./Helpers/Helper.php";



class UserController {

	private $view;
	private $model;
	private $authHelper;

	public function __construct(){
		$this->view = new UserView();
		$this->model = new UserModel();
		$this->authHelper = new Helper();
	}

		function ShowLogin() {
		$this->view->ShowLogin();
	}


	public function VerifyUser() {
		$user = $_POST['input_user'];
		$pass = $_POST['input_pass'];

		if(isset($user)){
			$userFromDB = $this->model->GetUser($user);
			
			if(isset($userFromDB) && $userFromDB){ //existe y es true.
				//	Existe el usuario
				if(password_verify($pass, $userFromDB->password)){
					$this->authHelper->Login($userFromDB);
					header("Location:".BASE_URL."homeAdmin");
				}else{
					$this->view->ShowLogin("Contraseña incorrecta");
				}
			}else{
				//No existe el user en la DB
				$this->view->ShowLogin("El usuario no existe");
			}
		}
	}


	public function Logout() {
        $this->authHelper->Logout();
        header('Location: ' . LOGIN);
    }


}
