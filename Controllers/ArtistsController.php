<?php

class ArtistsController extends Controller
{
    private $id_artist;
    private $role;
    private $picture;
    private $first_name;
    private $last_name;
    private $birth_day;
    private $bio;

    public function __construct()
    {
        $this->twig = parent::getTwig();
        parent::__construct();
        $this->model = new Artists();
    }

    // Affichage du template + Tous les Artistes
    public function index()
    {
        $result   = $this->model->getAllArtists();
        $pageTwig = 'Artists/index.html.twig';
        $template = $this->twig->load($pageTwig);
        echo $template->render(['result' => $result]);
    }

    // Affichage du template + Tous les Artistes du Film
    public function showByMovie()
    {
        $result   = $this->model->getByFilm();
        $pageTwig = 'Artists/showByMovie.html.twig';
        $template = $this->twig->load($pageTwig);
        echo $template->render(["result" => $result]);
    }
}
