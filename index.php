<?php
require_once 'vendor/autoload.php';

$router = new Router($_GET['url']);

// listes des routes
$router->get('/Films/Film_:id_movie', 'Movies.showOneMovie');
$router->get('/Films/Artiste_:id_artist', 'Artists.showArtist');
$router->get('/Films', 'Movies.showAllMovies');

// Route Artistes
$router->get('/Artistes/Artiste_:id_artist', 'Artists.showArtist');
$router->get('/Artiste_:id_artist', 'Artists.showArtist');
$router->get('/Artistes', 'Artists.showAllArtists');
$router->get('/Artists', 'Artists.index');

$router->post('/Comments/addComment/:id_movie', 'Comments.addComment');
$router->get('/Comments/Delete_:id_movie', 'Comments.delAllComByMovie');
$router->get('/Comments/GetAll', 'Comments.getAllCom');
$router->get('/Comments', 'Comments.index');

$router->post('/Connexion/register', 'Users.register');
$router->post('/Connexion/login', 'Users.login');
$router->get('/Connexion/:slug', 'Users.index');
$router->get('/Connexion', 'Users.index');

$router->get('/Deconnexion', 'Users.logout');



$router->get('/', 'Home.index');
$router->run();
