<?php
require_once('vendor/autoload.php');

//echo password_hash("mdp", PASSWORD_DEFAULT);

$router = new Router($_GET['url']);


// Route Films
$router->get('/Films/Film_:id_movie', 'Movies.showMovie');
$router->get('/Film_:id_movie', 'Movies.showMovie');
$router->get('/Films/Artiste_:id_artist', 'Artists.showArtist');
$router->get('/Films', 'Movies.showAllMovies');


// Route Artistes
$router->get('/Artistes/Artiste_:id_artist', 'Artists.showArtist');
$router->get('/Artiste_:id_artist', 'Artists.showArtist');
$router->get('/Artiste_:id_artist', 'Artists.showArtist');
$router->get('/Artistes', 'Artists.showAllArtists');


// Route Login
$router->get('/Connexion', 'Users.connexion');
$router->post('/Connexion', 'Users.login');


// Route Register
$router->post('/:slug', 'Users.register');
$router->get('/:slug', 'Users.connexion');


// Route Commentaires
$router->post('/Comments/addComment/:id_movie', 'Comments.addComment');
$router->get('/Comments/Delete_:id_movie', 'Comments.delAllComByMovie');
$router->get('/Comments/GetAll', 'Comments.getAllCom');
$router->get('/Comments', 'Comments.index');


// Route Home
$router->get('/', 'Home.index');


// Route RUN
$router->run();
