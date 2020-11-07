<?php

require_once 'api/ApiProductsController.php';
require_once 'RouterClass.php';

//Instancio el router
$router = new Router();


//armo la tabla de ruteo de la api Rest
$router->addRoute('products','GET', 'ApiProductsController','getProducts');

$router->addRoute('products/:ID','GET', 'ApiProductsController','getProductsID');

$router->addRoute('products/:ID','DELETE', 'ApiProductsController','DeleteProducts');

$router->addRoute('products/','POST', 'ApiProductsController','InsertProducts');


//run
$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);



?>