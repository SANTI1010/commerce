<?php

require_once 'api/ApiProductsController.php';
require_once 'RouterClass.php';

//Instancio el router
$router = new Router();


//armo la tabla de ruteo de la api Rest
$router->addRoute('products','GET', 'ApiProductsController','getProducts');

$router->addRoute('products/:ID','GET', 'ApiProductsController','getProductsID');

$router->addRoute('products/:ID','DELETE', 'ApiProductsController','deleteProducts');

$router->addRoute('products/','POST', 'ApiProductsController','insertProducts');

$router->addRoute('products/:ID','PUT', 'ApiProductsController','updateProducts');


//run
$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);



?>