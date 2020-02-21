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
   public function insertUser($pseudo, $mdp, $mail, $avatar)
   {
      $req = $this->pdo->prepare("INSERT INTO users(pseudo, mdp, mail, avatar) VALUES (:pseudo, :mdp, :mail, :avatar)");
      return $req->execute(array(
         'pseudo' => $pseudo,
         'mdp' => $mdp,
         'mail' => $mail,
         'avatar' => $avatar,
      ));
   }

   /**
    * verifie si le pseudo entré existe dans la bdd
    */
   public function pseudoExist($pseudo)
   {
      $req = $this->pdo->prepare("SELECT pseudo FROM users WHERE pseudo = :pseudo");
      $req->bindValue(':pseudo', $pseudo);
      $req->execute();
      return $req->fetch();
   }

   /**
    * verifie si le mail entré existe dans la bdd
    */
   public function mailExist($mail)
   {
      $req = $this->pdo->prepare("SELECT mail FROM users WHERE mail = :mail");
      $req->bindValue(':mail', $mail);
      $req->execute();
      return $req->fetch();
   }


   /******************FONCTIONS POUR CHANGER MOT DE PASSE**************************/

   /*
    * retourner le pseudo d'un utilisateur par rapport a son mail
    */
   public function recupPseudo($mail)
   {
      //chercher dans table users le pseudo correspondant au mail
      $req = $this->pdo->prepare("SELECT pseudo FROM users WHERE mail = ?");
      $req->execute([$mail]);
      return $req->fetch();
   }

   

   public function checkMail($hash)
   {
      $req = $this->pdo->prepare("SELECT mail FROM users WHERE mail = :mail");
      $req->bindValue(':mail', $hash);
      $req->execute();
      return $req->fetch();
   }


   /**
    * insertion dans la table Users
    */
   public function insertInUsersHash($hash, $mail, $pseudo)
   {
      
      //tester si le hash existe déja 
      $req = $this->pdo->prepare("SELECT mail FROM users WHERE mail = :mail");
      $req->bindValue(':mail', $mail);
      $req->execute();
      $data = $req->fetch();
      return $data;

      //si le md5 existe alors remplace son hash par le nouveau
      if ($data = true) {
         $req = $this->pdo->prepare("UPDATE users_hash SET 'hash'=:hash, 'mail'=:mail, 'pseudo'=:pseudo WHERE mail= :mail");
         $req->bindValue(':hash', $hash);
         $req->bindValue(':mail', $mail);
         $req->bindValue(':pseudo', $pseudo);
         $req->execute();
         //Sinon ajoute le
      } else {
         $req = $this->pdo->prepare("INSERT INTO users_hash(hash, mail, pseudo) VALUES ('$hash', '$mail', '$pseudo')");
         $req->execute();
      }
   }



   /*
    * va chercher des caractères dans l'url après l'emplacement donné (ici 42)
    */
   public function returnUrl($pointeur)
   {
      $adresse = $_SERVER['PHP_SELF'];
      $i = 0;
      foreach ($_GET as $cle => $valeur) {
         $adresse .= ($i == 0 ? '?' : '&') . $cle . ($valeur ? '=' . $valeur : '');
         $i++;
      }
      return substr($adresse, $pointeur);
   }

   /*
    * changer le mot de passe d'un utilisateur par celui entré dans l'input en fonction de son pseudo
    */
   public function updateMdp($pseudo, $mdp)
   {
      $req = $this->pdo->prepare("UPDATE users SET mdp = :mdp WHERE pseudo= :pseudo");
      $req->bindValue(':pseudo', $pseudo);
      $req->bindValue(':mdp', $mdp);
      $req->execute();
   }


   /********************************************************************/


   /*************************FONCTIONS ANTHONY**************************/

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
      $req = $this->pdo->prepare('SELECT avatar FROM users WHERE id_user= ?');
      $req->execute([$id_user]);
      return $req->fetch();
   }

   /**
    * 
    */
   public function modifyAvatar($newAvatar, $pseudo)
   {
      $req = $this->pdo->prepare("UPDATE users SET avatar = ? WHERE pseudo = ?");
      return $req->execute([$newAvatar, $pseudo]);
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

   
   public function updatePseudo($newpseudo, $pseudo)
   {
      $req = $this->pdo->prepare("UPDATE users SET pseudo = ? WHERE pseudo = ?");
      return $req->execute([$newpseudo, $pseudo]);
   }
   /*******************************************************************/
}
