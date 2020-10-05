<?php 

require_once('Controller/UserController.php');
require_once('Controller/ProductsController.php');
require_once('Controller/CategoriesController.php');
require_once('RouterClass.php');

//Constantes para ruteo
define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
define("LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');




$r = new Router();

//home
$r->addRoute("home","GET","ProductsController","Home");

//Login
$r->addRoute("login","GET","UserController","Login");
$r->addRoute("verifyUser","POST","UserController","VerifyUser");
$r->addRoute("logout","GET","UserController","Logout");


//El insert lo veo en TasksView
$r->addRoute("insert","POST","ProductsController","InsertProducts");
$r->addRoute("delete/:ID","GET","ProductsController","DeleteProducts");

$r->addRoute("detalle/:ID","GET","ProductsController","DetalleProducts");

$r->addRoute("completar/:ID","GET","ProductsController","MarkCompletedTask");

//ver
$r->addRoute("ordenar/:categorie","GET","ProductsController","GetCategoriesOrder");

//volver
$r->addRoute("volver","GET","ProductsController","volver");


//Ruta por defecto
$r->setDefaultRoute("ProductsController","Home");

//run
$r->route($_GET['action'], $_SERVER['REQUEST_METHOD']);


 ?>