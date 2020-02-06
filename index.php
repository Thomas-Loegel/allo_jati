
<?php
require_once 'vendor/autoload.php';

$router = new Router($_GET['url']);

// listes de nos routes
$router->get('/', 'Home.index');
$router->get('/Artists', 'Artists.index');
$router->get('/Films', 'Works.index');
$router->get('/Films/Show/:id_works', 'Works.showmovie');


$router->get('/Users/:slug', 'Users.index');
$router->get('/Users', 'Users.index');


$router->run();
