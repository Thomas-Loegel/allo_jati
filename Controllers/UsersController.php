<?php

require_once('Models/Users.php');

class UsersController extends Controller
{
   private $admin;
   private $pseudo;
   private $mdp;
   private $mail;

   public function __construct()
   {
      //$this->twig = parent::getTwig();
      parent::__construct();
   }

   // Setter
   public function setAdmin($admin)
   {
      $this->admin = $admin;
   }
   public function setPseudo($pseudo)
   {
      $this->pseudo = $pseudo;
   }
   public function setMdp($mdp)
   {
      $this->mdp = $mdp;
   }

   // Getter
   public function getAdmin()
   {
      echo $this->admin;
   }
   public function getPseudo()
   {
      echo $this->pseudo;
   }
   public function getMdp()
   {
      echo $this->mdp;
   }
   public function getMail()
   {
      echo $this->mail;
   }


   // Affichage du template




   public function index($slug = null)
   //Dans mon index, si slug est null on affiche le formulaire de connexion
   {
      //$slug est null
      $title = "Connexion";


      //si slug = register alors change le $title en "inscription".
      if ($slug === "register") {
         $title = "Inscription";
      }


      //si slug est défini et différent de "register" (en gros si l'utilisateur met nimp dans l'url) alors : 
      if (isset($slug) && $slug !== "register") {
         //Affiche une erreur 303 dans la console :
         header("HTTP/1.0 303 Redirection");
         //Fait une redirection vers la page d'accueil :
         header("Location: $this->baseUrl");
      }

      $pageTwig = 'Users/index.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render(['slug' => $slug, "title" => $title]);
   }
}
