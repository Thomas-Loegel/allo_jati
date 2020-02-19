<?php

class ProfilsController extends Controller
{
   public function __construct()
   {
      $this->twig = parent::getTwig();
      parent::__construct();
      $this->model = new Profils();
   }

   /**
   *
   */
   public function profil()
   {

      $pageTwig = 'Profil/profil.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render(['status' => $_SESSION['status'], 'user' => $_SESSION['utilisateur']]);
   }
   public function modify()
   {
      $pseudo = 'pseudo';

      $pageTwig = 'Profil/profils.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render(['slug' => $pseudo, 'status' => $_SESSION['status'], 'user' => $_SESSION['utilisateur']]);
   }
}