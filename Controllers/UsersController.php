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

      //si slug = Inscription alors change le $title en "inscription".
      if ($slug === "Inscription") {
         $title = "Inscription";
      }

      //si slug = Mot-De-Passe-Oublie alors change le $title en "Mot de passe oublié".
      if ($slug === "MotDePasseOublie") {
         $title = "Mot de passe oublié";
      }

      //si slug est défini et différent de "Inscription" et différent de "MotDePasseOublie" (en gros si l'utilisateur met nimp dans l'url) alors :
      if (isset($slug) && $slug !== "Inscription"  && $slug !== "MotDePasseOublie") {
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

               if (!empty($mavariable)) {
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
      $pageTwig = 'Users/login.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render([
         'slug' => $slug,
         'error' => $error,
      ]);
   }

   //gestion de l'envoi du formulaire de Mot De Passe Oublié
   public function forgetPassword($slug = "MotDePasseOublie")
   {
      //déclaration des variables
      $mail = NULL;
      $mailError = "";
      $generalError = "";
      $inputMail = "";



      //formulaire envoyé ?
      if (!empty($_POST)) {
         $mail = $_POST['mail'];
         //var_dump($mail);

         //le champ mail est rempli ?
         if (!empty($mail)) {

            $inputMail = $mail;
      

            if (isset($mail)) {
               $userMail = $this->model->mailExist($mail);

               //mail existe dans la bdd ?
               if ($userMail == true) {

                  if ($_SERVER['SERVER_NAME'] === "localhost") {
                     
                  
                     //on charge Swiftmailer
                     require_once('vendor/autoload.php');

                     //on instancie une nouvelle méthode d'envois du mail
                     $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 465))
                        //Port 25 ou 465 selon votre configuration

                        //identifiant et mote de passe pour votre swiftmailer
                        ->setUsername('fb4412351e7042')
                        ->setPassword('9377fb0dbcb0f8');

                     //on instancie un nouveau mail
                     $mailer = new Swift_Mailer($transport);

                     //contenu mail
                     $date = date('j, F Y h:i A');  
                     $sujet = "Mot de passe oublié";
                     $userPseudo = $this->model->recupPseudo($mail);
                     var_dump($userPseudo);
                     $userId = 1;
                     $mailBody = "
                     <h2>Bonjour!</h2>
                     <p>Vous avez demandé à changer de mot de passe.</p>
                     <br>
                     <a href='http://localhost/allo_jati/ChangerMotDePasse/$idUser'>Changer de mot de passe</a>
                     ";


                     //on instancie un nouveau corps de document mail
                     $message = (new Swift_Message($sujet))
                        ->setFrom(['galli.johanna.g2@gmail.com'])
                        ->setTo(['galli.johanna.g2@gmail.com'])
                        ->setBody($mailBody, 'text/html');

                     //on récupère et modifie le header du mail pour l'envois en HTML
                     $type = $message->getHeaders()->get('Content-Type');
                     $type->setValue('text/html');
                     $type->setParameter('charset', 'utf-8');

                     //On envois le mail en local
                     $mailer->send($message);
                  } else {
                     echo "nous ne pouvons pas vous envoyer de mail car nous utilisons swiftmailer";
                  }


                  //var_dump ($userMail);

                  //redirection vers page d'accueil'
                  //header("Location: $this->baseUrl/Connexion");
               } else {
                  $mailError = "Nous ne connaissons pas votre mail ...";
               }
            }
         } else {
            $generalError = "Veuillez remplir le champ recquis !";
         }
      }

      //affichage
      $pageTwig = 'Users/login.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render([
         'slug' => $slug,
         'mail' => $mail,

         'mailError' => $mailError,
         'inputMail' => $inputMail,
         'generalError' => $generalError,
      ]);
   }


   public function ChangePassword($slug = "ChangerMotDePasse")
   {
      //déclaration des variables
      $mdp = NULL;
      $mdpError = "";
      $generalError = "";


      //formulaire envoyé ?
      if (!empty($_POST)) {
         $mail = $_POST['mdp'];
         //var_dump($mail);

         //le champ mdp est rempli ?
         if (!empty($mdp)) {

            //mot de passe correspond aux attentes ?
            if (preg_match('`^([a-zA-Z0-9-_]{2,16})$`', $mdp)) {
               $userMdp = $this->model->insertmdp($mdp);

               //redirection vers page d'accueil'
               header("Location: $this->baseUrl/connexion");
            } else {
               $mdpError = "Votre mot de passe doit contenir des lettres (en majuscule et/ou en minuscule) et/ou des chiffres. 2 - 16 caractères";
            }
         } else {
            $generalError = "Veuillez remplir le champ recquis !";
         }
      }

      //affichage
      $pageTwig = 'Users/login.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render([
         'slug' => $slug,
         'mdp' => $mdp,
         'mdpError' => $mdpError,
         'generalError' => $generalError,
      ]);
   }


   //gestion de l'envoi du formulaire d'inscription
   public function register($slug = "Inscription")
   {
      //déclaration des variables
      $mail = NULL;
      $mailError = NULL;
      $pseudo = NULL;
      $pseudoError = NULL;
      $mdp = NULL;
      $mdpError = NULL;
      $avatar = NULL;
      $avatarError = NULL;
      $generalError = NULL;


      if (!empty($_POST)) {
         $mail = $_POST['mail'];
         $pseudo = $_POST['pseudo'];
         $mdp = $_POST['mdp'];
         $avatar = $_POST['avatar'];

         //les champs sont remplis ?
         if (!empty($mail) && !empty($pseudo) && !empty($mdp)) {

            //mail correspond aux attentes ?
            if (preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $mail)) {
               $userMail = $this->model->mailExist($mail);
               //mail existe dans la bdd ?
               if ($userMail == false) {

                  //pseudo correspond aux attentes ?
                  if (preg_match('`^([a-zA-Z0-9-_]{2,36})$`', $pseudo)) {
                     $userPseudo = $this->model->pseudoExist($pseudo);

                     //le pseudo entré existe dans la bdd ?
                     if ($userPseudo == false) {

                        //mot de passe correspond aux attentes ?
                        if (preg_match('`^([a-zA-Z0-9-_]{2,16})$`', $mdp)) {

                           //hashage du mot de passe :
                           $hashMdp = password_hash($mdp, PASSWORD_DEFAULT);

                           //une photo a été inséré dans l'insciption ?
                           if ($avatar) {
                              $info = new SplFileInfo($avatar);
                              $extensionAvatar = $info->getExtension();
                              //var_dump($extensionAvatar);
                              $extensionAvatar = strtolower($extensionAvatar);
                              $extensionsAutorisees = array('jpg', 'jpeg', 'gif', 'png', 'tiff');

                              if (in_array($extensionAvatar, $extensionsAutorisees)) {
                                 //insertion des données dans la bdd
                                 $this->model->insertUser($mail, $pseudo, $hashMdp, $avatar);
                                 header("Location: $this->baseUrl");
                              } else {
                                 $avatarError = "L'extension de votre fichier n'est pas autorisée";
                              }
                           } else {
                              //insertion des données dans la bdd
                              $this->model->insertUser($mail, $pseudo, $hashMdp, $avatar = "avatar.jpg");

                              header("Location: $this->baseUrl");
                           }
                        } else {
                           $mdpError = "Votre mot de passe doit contenir des lettres (en majuscule et/ou en minuscule) et/ou des chiffres. 2 - 16 caractères";
                        }
                     } else {
                        $pseudoError = "Ce pseudo existe déjà";
                     }
                  } else {
                     $pseudoError = "Votre pseudo doit contenir des lettres (en majuscule et/ou en minuscule) et/ou des chiffres. 2 - 36 caractères";
                  }
               } else {
                  $mailError = "Cette adresse mail possède déja un compte";
               }
            } else {
               $mailError = "L'adresse email '$mail' n'est pas considérée comme valide.";
            }
         } else {
            $generalError = "Veuillez remplir tous les champs recquis !";
         }
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
         'avatarError' => $avatarError,
      ]);
   }
}
