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
   public function modifyPseudo($user)
   {
      $pseudo = 'pseudo';
      $pageTwig = 'Profil/profil.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render(['slug' => $pseudo, 'status' => $_SESSION['status'], 'user' => $_SESSION['utilisateur'], 'user' => $user]);
   }
   public function modifyAvatar()
   {

      $slug = 'avatar';
      $pageTwig = 'Profil/profil.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render(['slug' => $slug, 'status' => $_SESSION['status'], 'user' => $_SESSION['utilisateur']]);
   }
   public function modifymdp()
   {
      $slug = 'mdp';
      $pageTwig = 'Profil/profil.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render(['slug' => $slug, 'status' => $_SESSION['status'], 'user' => $_SESSION['utilisateur']]);
   }
}
