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

   // Affiche la fiche Artiste
   public function showArtist(int $id_artist)
   {
   $artist   = $this->model->getArtist($id_artist);
   $pageTwig = 'Artists/showArtist.html.twig';
   $template = $this->twig->load($pageTwig);
   echo $template->render(['artist' => $artist]);
   }

   // Affiche les Artistes
   public function showAllArtists()
   {
      $artists  = $this->model->getAllArtists();
      $pageTwig = 'Artists/showAllArtists.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render(['artists' => $artists]);
   }

   // Affiche les Artistes du Film
   public function showByMovie()
   {
      $artists  = $this->model->getByFilm();
      $pageTwig = 'Artists/showByMovie.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render(["artists" => $artists]);
   }
}
