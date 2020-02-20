<?php

class ProfilsController extends Controller
{
   public function __construct()
   {
      $this->twig = parent::getTwig();
      parent::__construct();
      $this->model = new Profils();
   }
   public function profil()
   {
      $this->searchAvatar();
      $pageTwig = 'Profil/profil.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render(['status' => $_SESSION['status'], 'user' => $_SESSION['utilisateur'], 'avatar' => $_SESSION['avatar']]);
   }
   public function searchAvatar()
   {
      $instanceUsers = new Users();
      $id_user = $instanceUsers->getOneIdUser($_SESSION['utilisateur']);
      $avatar = $instanceUsers->searchAvatar($id_user['id_user']);
      $avatar = $this->baseUrl . "/assets/avatar/" . $avatar['avatar'];
      $_SESSION['avatar'] = $avatar;
   }





   public function modifyPseudo()
   {
      $pageTwig = 'Profil/profil.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render(['slug' => 'pseudo', 'status' => $_SESSION['status'], 'user' => $_SESSION['utilisateur'], 'avatar' => $_SESSION['avatar']]);
   }
   public function changePseudo()
   {
      $instanceUsers = new Users();
      if (empty($_POST['pseudo'])) {
         $_POST['pseudo'] = $_SESSION['utilisateur'];
         $alert = 2;
      } else {
         $newPseudo = $_POST['pseudo'];
         $result = $instanceUsers->pseudoExist($newPseudo);
         if ($result === false) {
            $result = $instanceUsers->updatePseudo($newPseudo, $_SESSION['utilisateur']);
            if ($result === true) {
               $_SESSION['utilisateur'] = $newPseudo;
               $this->searchAvatar();
               $alert = 1;
            }
         } else if ($result['pseudo'] === $newPseudo) {
            $alert = 0;
         }
      }
      $pageTwig = 'Profil/profil.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render(['slug' => 'pseudo', 'status' => $_SESSION['status'], 'user' => $_SESSION['utilisateur'], 'avatar' => $_SESSION['avatar'], 'alert' => $alert]);
   }
   public function modifyAvatar()
   {
      
      $pageTwig = 'Profil/profil.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render(['slug' => 'avatar', 'status' => $_SESSION['status'], 'user' => $_SESSION['utilisateur'], 'avatar' => $_SESSION['avatar']]);
   }
   public function changeAvatar()
   {
      $instanceUsers = new Users();
      

      if(isset($_FILES['avatarUpload']) && $_FILES['avatarUpload']['error'] == 0){
         if ($_FILES['avatarUpload']['size'] <= 2000000) {

            $infosfichier = pathinfo($_FILES['avatarUpload']['name']);
            $extension_upload = $infosfichier['extension'];
            $extension_upload = strtolower($extension_upload);


            $extensions_autorisees = array('bmp', 'jpg', 'jpeg', 'png', 'gif', 'tiff');
            if (in_array($extension_upload, $extensions_autorisees)) {

                $fileNameNew = uniqid('', true). "." .$extension_upload;
                $fileDestination = "assets/avatar/$fileNameNew";
                $result = move_uploaded_file($_FILES['avatarUpload']['tmp_name'], $fileDestination);

                if($result === true){  
                  $id_user = $instanceUsers->getOneIdUser($_SESSION['utilisateur']);
                  $actualAvatar = $instanceUsers->searchAvatar($id_user['id_user']);
                  $actualAvatar = $actualAvatar['avatar'];
                  $ifExist = "assets/avatar/$actualAvatar";
                  if($ifExist && $actualAvatar != "avatar.jpg") {
                     unlink($ifExist);
                  } 
                  $result = $instanceUsers->modifyAvatar($fileNameNew, $_SESSION['utilisateur']);
                  if($result === true) {
                     $_SESSION['avatar'] = "$this->baseUrl/assets/avatar/$fileNameNew";
                  }
                }  
            }
         }
      } else {
         $result = $instanceUsers->modifyAvatar($_FILES['avatarUpload'], $_SESSION['utilisateur']);
         var_dump($result);
      }



      $pageTwig = 'Profil/profil.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render(['slug' => 'avatar', 'status' => $_SESSION['status'], 'user' => $_SESSION['utilisateur'], 'avatar' => $_SESSION['avatar']]);
   }






   public function modifymdp($mdp = null)
   {
      $pageTwig = 'Profil/profil.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render(['slug' => $mdp, 'status' => $_SESSION['status'], 'user' => $_SESSION['utilisateur'], 'avatar' => $_SESSION['avatar']]);
   }
   public function sendMessage($send = null)
   {
      $pageTwig = 'Profil/profil.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render(['slug' => $send, 'status' => $_SESSION['status'], 'user' => $_SESSION['utilisateur'], 'avatar' => $_SESSION['avatar']]);
   }
   public function receiveMessage($receive = null)
   {
      $pageTwig = 'Profil/profil.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render(['slug' => $receive, 'status' => $_SESSION['status'], 'user' => $_SESSION['utilisateur'], 'avatar' => $_SESSION['avatar']]);
   }
   public function deleteAccount($account = null)
   {
      $pageTwig = 'Profil/profil.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render(['slug' => $account, 'status' => $_SESSION['status'], 'user' => $_SESSION['utilisateur'], 'avatar' => $_SESSION['avatar']]);
   }
}
