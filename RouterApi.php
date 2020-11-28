<?php
require_once 'api/ApiCommentsController.php';
require_once 'api/ApiProductsController.php';
require_once 'RouterClass.php';

//Instancio el router
$router = new Router();

//Comments
$router->addRoute('comments/:ID','GET', 'ApiCommentsController','getCommentsById');
$router->addRoute('comments/','POST', 'ApiCommentsController','insertComments');
$router->addRoute('comments/:ID','DELETE', 'ApiCommentsController','deleteComment');

//run
$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);



?>