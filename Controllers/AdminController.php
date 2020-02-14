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

      $success = null;
      $error   = null;
      $picture = null;
      $title   = null;
      $year    = null;
      $style   = null;
      $resume  = null;
      $time    = null;

      if (!empty($_POST)){
         $picture = $_POST['picture'];
         $title   = $_POST['title'];
         $year    = $_POST['year'];
         $style   = $_POST['style'];
         $resume  = $_POST['resume'];
         $time    = $_POST['time'];

         if (!empty($picture) && !empty($title) && !empty($year) && !empty($style) && !empty($resume) && !empty($time)){
               $success = null;
               $error   = null;
               $picture = null;
               $title   = null;
               $year    = null;
               $style   = null;
               $resume  = null;
               $time    = null;

               $success = "Votre film à bien été rajouté à la base de données !";
         }else {
            $error = "Veuillez remplir tous les champs !";
         }
      }

      $addMovie = $this->model->addMovie($picture,$title,$year,$style,$resume,$time);
      $pageTwig = 'Admin/admin.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render([
         'slug'    => $slug,
         'picture' => $picture,
         'title'   => $title,
         'year'    => $year,
         'style'   => $style,
         'resume'  => $resume,
         'time'    => $time,
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
