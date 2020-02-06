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

    // Affichage du template + Récupère tout les films
    public function showAllMovies()
    {
        $result = $this->model->getAllMovies();
        $pageTwig = 'Movies/showAllMovies.html.twig';
        $template = $this->twig->load($pageTwig);
        echo $template->render(["result" => $result]);
    }

    // Affichage du template + Récupère un Film avec son ID + Récupère la listes des Artistes du Film
    public function showOneMovie(int $id_movie) {

      $instanceArtists = new Artists();
      $movie = $this->model->getMovie($id_movie);

      $artists = $instanceArtists->getByMovie($id_movie);
      $pageTwig = 'Movies/showOneMovie.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render(["movie" => $movie, "artists" => $artists]);
    }
}