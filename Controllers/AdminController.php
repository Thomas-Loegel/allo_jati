<?php


class AdminController extends Controller
{
   public function __construct()
   {
      $this->twig = parent::getTwig();
      parent::__construct();
      $this->model = new Admin();
   }

   public function admin()
   {
      $pageTwig = 'Admin/admin.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render();
   }

   public function editUsers($slug = 'Liste_Utilisateurs')
   {
      $users   = $this->model->getAllUsers();

      $pageTwig = 'Admin/admin.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render([
         'slug' => $slug,
         'users'=> $users
      ]);
   }

   public function editFilms($slug = 'Liste_Films')
   {

      $pageTwig = 'Admin/admin.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render(['slug' => $slug]);
   }

   public function editArtistes($slug = 'Liste_Artistes')
   {

      $pageTwig = 'Admin/admin.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render(['slug' => $slug]);
   }

   public function addFilm($slug = 'Ajout_Film')
   {

      $pageTwig = 'Admin/admin.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render(['slug' => $slug]);
   }

   public function addArtiste($slug = 'Ajout_Artiste')
   {

      $pageTwig = 'Admin/admin.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render(['slug' => $slug]);
   }
}
