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
      $this->model = new Users();
   }


   // Affichage du template pour $slug = null (formulaire de connexion)
   public function connexion($slug = null)
   {
      //$slug est null
      $title = "Connexion";

      //si slug = register alors change le $title en "inscription".
      if ($slug === "Enregistrement") {
         $title = "Inscription";
      }

      //si slug est défini et différent de "register" (en gros si l'utilisateur met nimp dans l'url) alors :
      if (isset($slug) && $slug !== "Enregistrement") {
         //Affiche une erreur 303 dans la console :
         header("HTTP/1.0 303 Redirection");

         //Fait une redirection vers la page d'accueil :
         header("Location: $this->baseUrl");
      }
      $pageTwig = 'Users/login.html.twig';
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

               /*******************************************************/
               //On défini l'utilisateur a l'état de connecter
               $_SESSION["status"] = 1;
               //Si location existe on redirige vers postAfterLogin()
               if (isset($_SESSION['location'])) {
                  $instanceComments = new CommentsController();
                  $instanceComments->postAfterLogin();
               } else {
                  //Sinon on redirige l'utilisateur sur la page d'accueil
                  if (!empty($_SESSION["utilisateur"])) {
                     header("Location: $this->baseUrl");
                  }
               }
               /*******************************************************/
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
      $pageTwig = 'Users/login.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render([
         'slug' => $slug,
         'error' => $error,
      ]);
   }

   //gestion de l'envoi du formulaire d'inscription
   public function register($slug = "Enregistrement")
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
      $pageTwig = 'Users/login.html.twig';
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

   public function logout()
   {
      $instance = new Controller();
      $instance->controlSession();

      if($_SESSION['status'] === 1) {
         session_destroy();
         $instance->controlSession();
         header("Location: $this->baseUrl");
      }
      else if ($_SESSION['status'] === 0){
         header("Location: $this->baseUrl");
      }
   }
}
