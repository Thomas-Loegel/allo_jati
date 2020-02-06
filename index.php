<?php
require_once 'vendor/autoload.php';

$router = new Router($_GET['url']);

// listes des routes
$router->get('/Films/Film/:id_movie', 'Movies.showOneMovie');
$router->get('/Films', 'Movies.showAllMovies');

$router->get('/Artists/show', 'Artists.setByArtists');
$router->get('/Artists', 'Artists.index');

$router->get('/Connexion/:slug', 'Users.index');
$router->get('/Connexion', 'Users.index');

$router->get('/', 'Home.index');
$router->get('/Artists', 'Artists.index');


$router->get('/Comments', 'Comments.index');
$router->get('Comments/Delete_:id_movie', 'Comments.delAllComByMovie');
$router->get('Comments/GetAll', 'Comments.getAllCom');
$router->run();
