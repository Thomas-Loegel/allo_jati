<?php

class AdminController extends Controller
{
   public function __construct()
   {
      $this->twig = parent::getTwig();
      parent::__construct();
      $this->model = new Admin();
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
   *  Affiche la liste de tout les Utilisateurs
   */
   public function editUsers()
   {
      $slug = 'Liste_Utilisateurs';

      $instanceUsers = new Users();
      $users = $instanceUsers->getAllUsers();

      $pageTwig = 'Admin/admin.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render([
         'slug' => $slug,
         'users' => $users
      ]);
   }

   /**
   *  Affiche la liste de tout les Films
   */
   public function editMovies()
   {
      $slug = 'Liste_Films';

      $instanceMovies = new Movies();
      $movies = $instanceMovies->getAllMovies();

      $pageTwig = 'Admin/admin.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render([
         'slug' => $slug,
         'movies' => $movies
      ]);
   }

   /**
   *  Affiche la liste de tout les Artistes
   */
   public function editArtists()
   {
      $slug = 'Liste_Artistes';

      $instanceArtists = new Artists();
      $artists = $instanceArtists->getAllArtists();

      $pageTwig = 'Admin/admin.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render([
         'slug' => $slug,
         'artists' => $artists
      ]);
   }

   /**
   *  Ajoute un nouveau Film
   */
   public function addMovie()
   {
      $slug = 'Ajout_Film';
      $error   = null;
      $success = null;
      $title = $year = $time = $picture = $style = $resume= null;
      $pregYear = '/^[0-9]{4}$/m';
      $pregTime = '/^([01]?[0-9]|2[0-3])\:+[0-5][0-9]$/';
      $pregUrl = '%^(?:(?:https?|ftp)://)(?:\S+(?::\S*)?@|\d{1,3}(?:\.\d{1,3}){3}|(?:(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)(?:\.(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)*(?:\.[a-z\x{00a1}-\x{ffff}]{2,6}))(?::\d+)?(?:[^\s]*)?$%iu';


      if (isset($_POST['title']) && !empty($_POST['title'])) {
         $title = $_POST['title'];
      }else {
         $error = "Titre non renseigné !";
      }

      if (isset($_POST['year']) && !empty($_POST['year']) && preg_match($pregYear,$_POST['year'])) {
         $year = $_POST['year'];
      }else {
         $error = "Format date non valide (YYYY) !";
      }

      if (isset($_POST['time']) && !empty($_POST['time']) && preg_match($pregTime,$_POST['time'])) {
         $time = $_POST['time'];
      }else {
         $error = "Format durée non valide (H:MM)!";
      }

      if (isset($_POST['picture']) && !empty($_POST['picture']) && preg_match($pregUrl,$_POST['picture'])){
         $picture = $_POST['picture'];
      }else {
         $error = "Format url non valide !";
      }

      if (isset($_POST['style']) && !empty($_POST['style'])){
         $style = $_POST['style'];
      }else {
         $error = "Style non renseigné !";
      }

      if (isset($_POST['resume']) && !empty($_POST['resume'])){
         $resume = $_POST['resume'];
      }else {
         $error = "Résumé non renseigné !";
      }

      $addMovie = $this->model->addMovie($picture,$title,$year,$style,$resume,$time);
      $pageTwig = 'Admin/admin.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render([
         'slug'    => $slug,
         'title'   => $title,
         'year'    => $year,
         'time'    => $time,
         'picture' => $picture,
         'style'   => $style,
         'resume'  => $resume,
         'error'   => $error,
         'success' => $success
      ]);
   }

   /**
   *  Ajoute un nouvel Artiste
   */
   public function addArtist()
   {
      $slug = 'Ajout_Artiste';

      $pageTwig = 'Admin/admin.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render(['slug' => $slug]);
   }
}
