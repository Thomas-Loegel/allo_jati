<?php


class AdminController extends Controller
{
   public function __construct()
   {
      $this->twig = parent::getTwig();
      parent::__construct();
   }

   /**
   *
   */
   public function admin()
   {
      $pageTwig = 'Admin/admin.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render();
   }

   /**
   *
   */
   public function editUsers($slug = 'Liste_Utilisateurs')
   {
      $instanceUsers = new User();
      $users = $instanceUsers->getAllUsers();

      $pageTwig = 'Admin/admin.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render([
         'slug' => $slug,
         'users' => $users
      ]);
   }

   /**
   *
   */
   public function editMovies($slug = 'Liste_Films')
   {
      $instanceMovies = new Movies();
      $movies = $instanceMovies->getAllMovies();
      var_dump($movies);

      $pageTwig = 'Admin/admin.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render([
         'slug' => $slug,
         'movies' => $movies
      ]);
   }

   /**
   *
   */
   public function editArtists($slug = 'Liste_Artistes')
   {
      $instanceArtists = new Artists();
      $artists = $instanceArtists->getAllArtists();
      var_dump($artists);

      $pageTwig = 'Admin/admin.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render([
         'slug' => $slug,
         'artists' => $artists
      ]);
   }

   /**
   *
   */
   public function addMovie($slug = 'Ajout_Film')
   {

      $pageTwig = 'Admin/admin.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render(['slug' => $slug]);
   }

   /**
   *
   */
   public function addArtist($slug = 'Ajout_Artiste')
   {

      $pageTwig = 'Admin/admin.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render(['slug' => $slug]);
   }
}
