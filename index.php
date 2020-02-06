<?php
require_once 'vendor/autoload.php';

$router = new Router($_GET['url']);

// Routes Films:
$router->get('/Films/Film_:id_movie', 'Movies.showMovie');
$router->get('/Films/Artiste_:id_artist', 'Artists.showArtist');
$router->get('/Films', 'Movies.showAllMovies');

// Routes Artistes:
$router->get('/Artistes/Artiste_:id_artist', 'Artists.showArtist');
$router->get('/Artistes', 'Artists.showAllArtists');
$router->get('/Artists', 'Artists.index');

// Routes Commentaires:
$router->get('Comments/Delete_:id_movie', 'Comments.delAllComByMovie');
$router->get('Comments/GetAll', 'Comments.getAllCom');
$router->get('/Comments', 'Comments.index');

// Routes Connexion:
$router->get('/Connexion', 'Users.index');
$router->get('/Connexion/:slug', 'Users.index');

// Routes Home:
$router->get('/', 'Home.index');

// Run Routes
$router->run();
