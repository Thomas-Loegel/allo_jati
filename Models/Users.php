<?php

class Users extends Model
{
   public function __construct()
   {
      $this->pdo = parent::getPdo();
   }

   /**
    *  Renvoi true si Pseudo est connu dans la bdd,
    *  Renvoi false si Pseudo est inconnu dans la bdd
    */
   public function checkLogin($pseudo)
   {
      $req = $this->pdo->prepare('SELECT pseudo, mdp, admin FROM users WHERE pseudo = :pseudo');
      $req->bindValue(':pseudo', $pseudo);
      $req->execute();
      $data = $req->fetch();
      return $data;
   }

   /**
    *  Ajoute un nouveau User
    */
   public function insertUser($mail, $pseudo, $mdp, $avatar)
   {
      $req = $this->pdo->prepare("INSERT INTO users(mail, pseudo, mdp, avatar) VALUES ('$mail', '$pseudo', '$mdp', '$avatar')");
      $req->execute();
   }
   //verifie si le pseudo entré existe dans la bdd
   public function pseudoExist($pseudo)
   {
      $req = $this->pdo->prepare("SELECT pseudo FROM users WHERE pseudo = :pseudo");
      $req->bindValue(':pseudo', $pseudo);
      $req->execute();
      return $req->fetch();
   }
   //verifie si le mail entré existe dans la bdd
   public function mailExist($mail)
   {
      $req = $this->pdo->prepare("SELECT mail FROM users WHERE mail = :mail");
      $req->bindValue(':mail', $mail);
      $req->execute();
      //$data = $req->fetch();
      return $req->fetch();
   }


   /**************************FONCTIONS POUR CHANGER MOT DE PASSE**************************/

   //retourner le pseudo d'un utilisateur par rapport a son mail
   public function recupPseudo($mail)
   {
      //chercher dans table users le pseudo correspondant au mail
      $req = $this->pdo->prepare("SELECT pseudo FROM users WHERE mail = :mail");
      $req->bindValue(':mail', $mail);
   }

   //changer le mot de passe d'un utilisateur par celui entré dans l'input en fonction de son pseudo
   public function updateMdp($pseudo, $mdp)
   {
      $req = $this->pdo->prepare("UPDATE users SET mdp = :mdp WHERE pseudo= :pseudo");
      $req->bindValue(':pseudo', $pseudo);
      $req->bindValue(':mdp', $mdp);
      $req->execute();
   }

   //va chercher des caractères dans l'url après l'emplacement donné (ici 42)
   public function returnUrl()
   {
      $adresse = $_SERVER['PHP_SELF'];
      $i = 0;
      foreach ($_GET as $cle => $valeur) {
         $adresse .= ($i == 0 ? '?' : '&') . $cle . ($valeur ? '=' . $valeur : '');
         $i++;
      }
      return substr($adresse, 43);
   }

   // création de numéro aléatoire
   public function random($max)
   {
      $string = "";
      $chaine = "abcdefghijklmnpqrstuvwxy";
      srand((float) microtime() * 1000000);
      for ($i = 0; $i < $max; $i++) {
         $string .= $chaine[rand() % strlen($chaine)];
      }
      return $string;
   }

   //insertion dans la table Users_intermediar
   public function insertUsersIntermediar($randomString, $mail)
   {
      //tester si le mail existe déja
      $req = $this->pdo->prepare("SELECT mail FROM users_intermediar WHERE mail = :mail");
      $req->bindValue(':mail', $mail);
      $data = $req->fetch();
      return $data;

      //si le mail existe alors remplace son randomString par le nouveau
      if ($data = true) {
         $req = $this->pdo->prepare("UPDATE users_intermediar SET randomString = :randomString WHERE mail= :mail");
         $req->bindValue(':randomString', $randomString);
         $req->bindValue(':mail', $mail);
         $req->execute();
         //Sinon ajoute le
      } else {
         $req = $this->pdo->prepare("INSERT INTO users_intermediar(chaine_aleatoire, mail) VALUES ('$randomString', '$mail')");
         $req->execute();
      }
   }

   /*************************FIN FONCTIONS POUR CHANGER MOT DE PASSE**************************/




   /**
    *  Récupère les Utilisateurs
    */
   public function getAllUsers()
   {
      $req = $this->pdo->prepare('SELECT * FROM users');
      $req->execute();
      return $req->fetchAll();
   }
   /**
   *  Récupère l'id_user depuis son pseudo
   */
   public function getOneUser($pseudo)
   {
      $req = $this->pdo->prepare('SELECT * FROM users WHERE pseudo= ?');
      $req->execute([$pseudo]);
      return $req->fetch();
   }
   /**
   * Récupère le pseudo depuis l'id user
   */
   public function getOnePseudo($id_user)
   {
      $req = $this->pdo->prepare('SELECT pseudo FROM users WHERE id_user= ?');
      $req->execute([$id_user]);
      return $req->fetch();
   }
   /**
    * Vérifie si l'id_user est admin
    */
   public function checkAdmin($id_user)
   {
      $req = $this->pdo->prepare('SELECT `admin` FROM users WHERE id_user= ?');
      $req->execute([$id_user]);
      return $req->fetch();
   }
   /**
   *  Récupère l'avatar depuis un id user
   */
   public function searchAvatar($id_user)
   {
      $req = $this->pdo->prepare('SELECT `avatar` FROM users WHERE id_user= ?');
      $req->execute([$id_user]);
      return $req->fetch();
   }
   /**
   * Récupère l'id d'un utilisateur depuis son pseudo
   */
  public function getOneIdUser($pseudo)
  {
     $req = $this->pdo->prepare('SELECT `id_user` FROM users WHERE pseudo= ?');
     $req->execute([$pseudo]);
     return $req->fetch();
  }
  /****************************************************************** */
}
