<?php

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



   private $register = "créer un compte";


   // Affichage du template
   public function index($slug = null)
   {
      $title = "Connexion";

      if ($slug === "register"){
         $title = "Inscription";
      }

      if(isset($slug) && $slug !== "register") {
         header("HTTP/1.0 303 Redirection");
         header("Location: $this->baseUrl");
         
      }      
      $pageTwig = 'Users/index.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render(['slug' => $slug, "title" => $title]);
   }
}
