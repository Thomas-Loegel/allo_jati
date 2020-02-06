<?php
require_once 'vendor/autoload.php';

$router = new Router($_GET['url']);

// listes des routes
$router->get('/Films/Film_:id_movie', 'Movies.showOneMovie');
$router->get('/Films/Artiste_:id_artist', 'Artists.showArtist');
$router->get('/Films', 'Movies.showAllMovies');

$router->get('/Connexion/:slug', 'Users.index');
$router->get('/Connexion', 'Users.index');

$router->get('/', 'Home.index');


$router->run();