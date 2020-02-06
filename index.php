<?php
require_once 'vendor/autoload.php';

//echo password_hash("mdp", PASSWORD_DEFAULT);

$router = new Router($_GET['url']);

// listes de nos routes
$router->get('/', 'Home.index');
$router->get('/Artists', 'Artists.index');

$router->post('/Admin', 'Admin.index');

$router->get('/Users/:slug', 'Users.index');
$router->get('/Users', 'Users.index');


$router->run();
