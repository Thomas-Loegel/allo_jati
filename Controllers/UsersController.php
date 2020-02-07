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
   public function login($slug = null)
   {
      $error = "";
      $mavariable = "";
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
               $_SESSION["utilisateur"] = $_POST['pseudo'];

               $mavariable = $_SESSION["utilisateur"];

               if(!empty($mavariable)) {
                  header("Location: $this->baseUrl");
               }
               


            } else {
               $error = "Mot de passe incorrect";
            }
         } else {
            $error = "Vous êtes qui ?! :S";
         }
      } else {
         $error = "Vous n'avez pas rempli tous les champs !";
      }


      //affichage
      $pageTwig = 'Users/index.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render([
         'slug' => $slug,
         'error' => $error,
      ]);
   }

   //gestion de l'envoi du formulaire d'inscription
   public function register($slug = "register")
   {
      $generalError = "";
      $mailError = "";
      $pseudoError = "";
      $mdpError = "";


      $mail = $_POST['mail'];
      $pseudo = $_POST['pseudo'];
      $mdp = $_POST['mdp'];

      //si les champs sont remplis
      if (!empty($mail) && !empty($pseudo) && !empty($mdp)) {

         //vérif mail
         if (preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $mail)) {

            //vérif pseudo
            if (preg_match('`^([a-zA-Z0-9-_]{2,36})$`', $pseudo)) {

               //vérif mot de passe
               if (preg_match('`^([a-zA-Z0-9-_]{2,16})$`', $mdp)) {
                  //hashage du mot de passe :
                  $hashMdp = password_hash($mdp, PASSWORD_DEFAULT);

                  //insertion des données dans la bdd
                  $this->model->insertUser($mail, $pseudo, $hashMdp);

               } else {
                  $mdpError = "Seul les lettres en majuscule et en minuscule ainsi que les chiffres sont autorisés. 
                  Min 2 et max 16 caractères";
               }

            } else {
               $pseudoError = "Seul les lettres en majuscule et en minuscule ainsi que les chiffres sont autorisés. 
               Min 2 et max 36 caractères";
            }

         } else {
            $mailError = "L'adresse email '$mail' n'est pas considérée comme valide.";
         }
         
      } else {
         $generalError = "Vous n'avez pas rempli tous les champs !";
      }

      //affichage
      $pageTwig = 'Users/index.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render([
         'slug' => $slug,
         'generalError' => $generalError,
         'mailError' => $mailError,
         'pseudoError' => $pseudoError,
         'mdpError' => $mdpError,

         'inputMail' => $mail,
         'inputPseudo' => $pseudo,

      ]);
   }
}
