<?php
require_once('vendor/autoload.php');

//echo password_hash("mdp", PASSWORD_DEFAULT);

$router = new Router($_GET['url']);

// listes des routes
$router->get('/Films/Film_:id_movie', 'Movies.showOneMovie');
$router->post('/Comments/addComment/:id_movie', 'Comments.addComment');
$router->get('/Films/Artiste_:id_artist', 'Artists.showArtist');
$router->get('/Comments/Delete_:id_movie', 'Comments.delAllComByMovie');
$router->get('/Connexion/:slug', 'Users.index');
$router->get('/Comments/GetAll', 'Comments.getAllCom');
$router->get('/Films', 'Movies.showAllMovies');


// Route Artistes
$router->get('/Artistes/Artiste_:id_artist', 'Artists.showArtist');
$router->get('/Artiste_:id_artist', 'Artists.showArtist');
$router->get('/Artistes', 'Artists.showAllArtists');

// Route Login
$router->get('/Connexion/:slug', 'Users.index');
$router->get('/Connexion', 'Users.index');


// Route Users
$router->post('/Users/login', 'Users.login');
$router->post('/Users/register', 'Users.register');
$router->get('/Users/:slug', 'Users.index');
$router->get('/Users', 'Users.index');


// Route Commentaires
$router->get('/Comments/Delete_:id_movie', 'Comments.delAllComByMovie');
$router->get('/Comments/GetAll', 'Comments.getAllCom');
$router->get('/Comments', 'Comments.index');


$router->get('/', 'Home.index');
$router->get('/Artists', 'Artists.index');


// Route RUN
$router->run();
