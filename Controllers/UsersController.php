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
      $this->model = new User();
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


   // Affichage du template pour $slug = null (formulaire de connexion)
   public function index($slug = null)
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

      echo $template->render([
         'slug' => $slug,
         "title" => $title,
      ]);
   }


   //gestion de l'envoi du formulaire de connexion
   public function log($slug = null)
   {
      // si l'input pseudo et mdp n'est pas vide
      if (!empty($_POST['pseudo']) && !empty($_POST['mdp'])) {

         //$user info appelle la fonction checkLogin
         $userInfo = $this->model->checkLogin($_POST["pseudo"]);

         //Si $userInfo a pour valeur true 
         if ($userInfo) {
            //var_dump($userInfo);
            $hashMdp = $userInfo["mdp"];

            //si le mot de passe est bon
            if (password_verify($_POST['mdp'], $hashMdp)) {
               session_start();
               header("Location: $this->baseUrl");
            } else {
               echo "Mot de passe incorrect";
            }
         } else {
            echo "Vous n'êtes pas reconnu de la base de données";
         }
      } else {
         echo "Renseignez tous les champs";
      }

      $pageTwig = 'Users/index.html.twig';
      $template = $this->twig->load($pageTwig);

      echo $template->render([
         'slug' => $slug,
      ]);
   }

   public function reg($slug = "register"){


      if (!empty($_POST['mail']) && !empty($_POST['pseudo']) && !empty($_POST['mdp'])) {
         echo "ok";
      } else echo "pas ok";


      $pageTwig = 'Users/index.html.twig';
      $template = $this->twig->load($pageTwig);

      echo $template->render([
         'slug' => $slug,
      ]);
      
   }

}
