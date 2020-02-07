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
        $movies = $this->model->getAllMovies();
        $pageTwig = 'Movies/showAllMovies.html.twig';
        $template = $this->twig->load($pageTwig);
        echo $template->render(["movies" => $movies]);
    }

    // Affichage du template + Récupère un Film avec son ID
    public function showOneMovie($id_movie) {

      $instanceArtists = new Artists();
      $artists = $this->model->

        $movie = $this->model->getMovie($id_movie);
        $pageTwig = 'Movies/showOneMovie.html.twig';
        $template = $this->twig->load($pageTwig);
        echo $template->render(["movie" => $movie]);
    }
}
