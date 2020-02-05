<?php
require_once 'vendor/autoload.php';

$router = new Router($_GET['url']);

// listes de nos routes
$router->get('/', 'Home.index');
$router->get('/Artists:slug', 'Artists.index');

$router->run();
