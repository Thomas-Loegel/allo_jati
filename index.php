<?php
require_once 'vendor/autoload.php';

$router = new Router($_GET['url']);

// listes des routes
$router->get('/Films/Film_:id_movie', 'Movies.showOneMovie');

$router->post('/Comments/addComment/:id_movie', 'Comments.addComment');

$router->get('/Films/Artiste_:id_artist', 'Artists.showArtist');
$router->get('/Comments/Delete_:id_movie', 'Comments.delAllComByMovie');
$router->get('/Connexion/:slug', 'Users.index');
$router->get('/Comments/GetAll', 'Comments.getAllCom');
$router->get('/Films', 'Movies.showAllMovies');
$router->get('/Connexion', 'Users.index');
$router->get('/Artists', 'Artists.index');
$router->get('/Comments', 'Comments.index');


$router->get('/', 'Home.index');
$router->run();
