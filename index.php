<?php
require_once('vendor/autoload.php');
session_start();

$router = new Router($_GET['url']);

// Route Films
$router->get('/Films/Film_:id_movie', 'Movies.showMovie');
$router->get('/Films/Artiste_:id_artist', 'Artists.showArtist');
$router->post('/Films/Recherche', 'Movies.search');
$router->post('/Films/Genre', 'Movies.genre');
$router->get('/Film_:id_movie', 'Movies.showMovie');
$router->get('/Films', 'Movies.showAllMovies');


// Route Artistes
$router->get('/Artistes/Artiste_:id_artist', 'Artists.showArtist');
$router->get('/Artiste_:id_artist', 'Artists.showArtist');
$router->post('/Artistes/Recherche', 'Artists.search');
$router->get('/Artistes', 'Artists.showAllArtists');

// Route Login
$router->get('/Connection', 'Users.connexion');
$router->post('/', 'Users.login');

// route forgetPassword
$router->get('/MotDePasseOublie', 'Users.forgetPassword');
$router->post('/MotDePasseOublie/post', 'Users.forgetPassword');

// route MailEnvoyé
$router->get('/mailEnvoye', 'Users.mailEnvoye');

// Route ChangePassword
$router->get('/ChangerMotDePasse/:hash', 'Users.updatePassword');
$router->post('/ChangerMotDePasse/:hash/post', 'Users.updatePassword');

// route forgetPassword
$router->get('/MotDePasseOublie', 'Users.forgetPassword');
$router->post('/Connection/post', 'Users.forgetPassword');

// Route Register
$router->get('/Inscription', 'Users.register');
$router->post('/Inscription/post', 'Users.register');

// Route Commentaires
$router->get('/Commentaires/Effacer_:id_comment/:id_movie', 'Comments.deleteComment');
$router->post('/Commentaires/Modifier_:id_movie/:id_comment', 'Comments.modifyComment');
$router->post('/Commentaires/Ajouter_:id_movie', 'Comments.addComment');
$router->get('/Commentaires', 'Comments.index');

// Route Profile
$router->get('/Profile/ModifierPseudo_:user', 'Profils.modifyPseudo');
$router->get('/Profile/ModifierAvatar_:avatar', 'Profils.modifyAvatar');
$router->get('/Profile/ModifierMdp_:mdp', 'Profils.modifymdp');
$router->get('/Profile/ModifierCompte_:id_user', 'Profils.modifymdp');

$router->get('/Profile', 'Profils.profil');

// Route Deconnexion
$router->get('/Deconnection', 'Users.logout');

// Route Admin
$router->get('/Admin/Effacer_:id_comment/:id_movie/:id_user', 'Comments.deleteComment');
$router->get('/Admin/Effacer_:id_comment', 'Comments.deleteComment');
$router->post('/Admin/Utilisateur', 'Comments.searchAllCommByUser');
$router->get('/Admin/Tous', 'Comments.getAllCom');

$router->get('/Admin', 'Admin.admin');
$router->get('/Admin/Liste_Utilisateurs', 'Admin.editUsers');
$router->get('/Admin/Liste_Films', 'Admin.editMovies');
$router->get('/Admin/Liste_Artistes', 'Admin.editArtists');
$router->get('/Admin/Ajout_Film', 'Admin.addMovie');
$router->post('/Admin/Ajout_Film/Add', 'Admin.addMovie');
$router->post('/Admin/Ajout_Artiste/Add', 'Admin.addArtist');
$router->get('/Admin/Ajout_Artiste', 'Admin.addArtist');
$router->get('/Admin/Associer', 'Admin.association');
$router->post('/Admin/Associer/With', 'Admin.association');


// Route Contact
$router->post('/Suggestion', 'Suggestion.addSuggestion');
$router->get('/Suggestion', 'Suggestion.suggestion');

// Route Home
$router->get('/', 'Home.index');



// Route RUN
$router->run();
