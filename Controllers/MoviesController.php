<?php

class MoviesController extends ArtsController
{
   private $picture;
   private $resume;
   private $time;

   public function __construct()
   {
      $this->twig = parent::getTwig();
      parent::__construct();
      $this->model = new Movies();
   }

   // Affiche tout les Films
   public function showAllMovies()
   {
      $movies   = $this->model->getAllMovies();
      $pageTwig = 'Movies/showAllMovies.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render(["movies" => $movies]);
   }

   // Affiche un Film avec son Id
   public function showMovie($id_movie) {

      // Affiche les Artistes liés a Id Film
      $instanceArtists = new Artists();
      $artists = $instanceArtists->getByMovie($id_movie);

      //Affiche les commentaire du film
      $instanceComments = new Comments();
      $comments = $instanceComments->linkCommentByMovie($id_movie);


      $movie = $this->model->getMovie($id_movie);
      $pageTwig = 'Movies/showMovie.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render(["movie" => $movie, "artists" => $artists, "comments" => $comments]);


      $instanceUser = new User();
      session_start();
      //On affiche une alerte si un commentaire vide a été publié
      if(isset($_SESSION['alert'])) {
         echo $_SESSION['alert'];
         unset($_SESSION['alert']);
      }
      //On récupère l'id_user des commentaire et l'on recherche le pseudo leur appartenant
      for($i = 0; $i < count($comments) ; $i++){
         //On récupère l'id_user de tous les commentaire
         $id_user = $comments[$i]['id_user'];
         //On récupère le pseudo par l'id_user
         $user = $instanceUser->getOnePseudo($id_user);
         //On affecte le pseudo a la place de l'id_user
         $comments[$i]['id_user'] = $user['pseudo'];

         $avatar = $instanceUser->searchAvatar($id_user);
         $comments[$i]['avatar'] = $this->baseUrl . "/assets/avatar/" .$avatar['avatar'];
      }

      //Défini la date local en europe
      date_default_timezone_set('Europe/Paris');
      setlocale(LC_TIME, 'fr_FR.utf8', 'fra');

      $user = null;
      //Affiche l'utilisateur connecté
      if (isset($_SESSION['status']) &&  $_SESSION['status'] === 1) {
         $user = $instanceUser->getOneUser($_SESSION['utilisateur']);

      } else {
         $user = "Vous devez être connecté pour déposer un commentaire";
      }
      $movie = $this->model->getMovie($id_movie);
      $pageTwig = 'Movies/showMovie.html.twig';
      $template = $this->twig->load($pageTwig);

      if(isset($_SESSION['tmpComment'])) {

         echo $template->render(["movie" => $movie, "artists" => $artists, "comments" => $comments, "user" => $user, "datedujour" => strftime("%A %d %B %Y"), "status" => $_SESSION['status'], "tmpTitle" => $_SESSION['tmpTitle'], "tmpComment" => $_SESSION['tmpComment'], "tmpNote" => $_SESSION['tmpNote'], "status" => $_SESSION['status'], "userLogin" => $_SESSION['utilisateur']]);
      } else {

         echo $template->render(["movie" => $movie, "artists" => $artists, "comments" => $comments, "user" => $user, "datedujour" => strftime("%A %d %B %Y"), "status" => $_SESSION['status'], "userLogin" => $_SESSION['utilisateur']]);
      }
   }
}
