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

    // Récupère tout les films
    public function showAllMovies()
    {
        $result = $this->model->getAllMovies();
        $pageTwig = 'Movies/showAllMovies.html.twig';
        $template = $this->twig->load($pageTwig);
        echo $template->render(["result" => $result]);
    }

    // Récupère un Film avec son ID
    public function showOneMovie(int $id_movie) {

        $result = $this->model->getMovie($id_movie);
        $pageTwig = 'Movies/showOneMovie.html.twig';
        $template = $this->twig->load($pageTwig);
        echo $template->render(["result" => $result]);
    }
}
