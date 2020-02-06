<?php
require_once 'vendor/autoload.php';

$router = new Router($_GET['url']);

// listes de nos routes
$router->get('/', 'Home.index');
$router->get('/Artists', 'Artists.index');

$router->get('/Comments', 'Comments.index');
$router->get('Comments/Delete_:id_movie', 'Comments.delAllComByMovie');
$router->get('Comments/GetAll', 'Comments.getAllCom');
$router->run();
