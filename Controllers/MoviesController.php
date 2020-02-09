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
      $movies = $this->model->getAllMovies();
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
   }

}
