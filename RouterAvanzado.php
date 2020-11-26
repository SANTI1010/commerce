<?php 

require_once('Controller/UserController.php');
require_once('Controller/ProductsController.php');
require_once('Controller/CategoriesController.php');
//require_once('Controller/CommentController.php');



require_once('RouterClass.php');

//Constantes para ruteo
define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
define("LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');
define("LOGUEARME", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/loguearme');


$r = new Router();

//home
$r->addRoute("index","GET","ProductsController","Index");
$r->addRoute("home","GET","ProductsController","Home");
$r->addRoute("homeAdmin","GET","ProductsController","HomeAdmin");

//Login
$r->addRoute("login","GET","UserController","ShowLogin");
$r->addRoute("verifyUser","POST","UserController","VerifyUser");
$r->addRoute("logout","GET","UserController","Logout");
$r->addRoute("loguearme","GET","UserController","ShowLoguearme");
$r->addRoute("UserLoguedIn","POST","UserController","UserLoguedIn");
$r->addRoute("UsersPermits","POST","UserController","UsersPermits");
$r->addRoute("deleteUser/:ID","GET","UserController","DeleteUser");

//Comments
$r->addRoute("insertComments/:ID","GET","CommentController","InsertComments");


//El insert lo veo en TasksView
$r->addRoute("insert","POST","ProductsController","InsertProducts");
$r->addRoute("delete/:ID","GET","ProductsController","DeleteProducts");
$r->addRoute("editProducts/:ID","GET","ProductsController","EditProducts");
$r->addRoute("updateProducts/:ID","POST","ProductsController","UpdateProducts");

$r->addRoute("insertCategories","POST","CategoriesController","InsertCategories");
$r->addRoute("deleteCategories/:ID","GET","CategoriesController","DeleteCategories");
$r->addRoute("editCategories/:ID","GET","CategoriesController","EditCategories");
$r->addRoute("updateCategories/:ID","POST","CategoriesController","UpdateCategories");

//ejemplo de CSR
$r->addRoute("products-csr","GET","ProductsController","ProductsCSR");



$r->addRoute("detalle/:ID","GET","ProductsController","DetalleProducts");
$r->addRoute("completar/:ID","GET","ProductsController","MarkCompletedTask");

//ver
$r->addRoute("ordenar/:categorie","GET","ProductsController","GetCategoriesOrder");

//volver
$r->addRoute("volver","GET","ProductsController","volver");


//Ruta por defecto
$r->setDefaultRoute("ProductsController","index");



//run
$r->route($_GET['action'], $_SERVER['REQUEST_METHOD']);


 ?>