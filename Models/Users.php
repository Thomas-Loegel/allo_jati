<?php

class Users extends Model
{
   public function __construct()
   {
      $this->pdo = parent::getPdo();
   }

   /**
   *  Renvoi true si pseudo entré par l'utilisateur est connu dans la bdd
   *  Renvoi false si pseudo entré par l'utilisateur est inconnu dans la bdd
   */
   function checkLogin($pseudo)
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

   /**
   *  Verifie si le pseudo entré existe dans la bdd
   */
   public function pseudoExist($pseudo)
   {
      $req = $this->pdo->prepare("SELECT pseudo FROM users WHERE pseudo = :pseudo");
      $req->bindValue(':pseudo', $pseudo);
      $req->execute();
      return $req->fetch();
   }

   /**
   *  Verifie si le mail entré existe dans la bdd
   */
   public function mailExist($mail)
   {
      $req = $this->pdo->prepare("SELECT mail FROM users WHERE mail = :mail");
      $req->bindValue(':mail', $mail);
      $req->execute();
      //$data = $req->fetch();
      return $req->fetch();
   }

   /**
   *
   */
   public function recupPseudo($mail)
   {
      //chercher dans table users le pseudo correspondant au mail
      $req = $this->pdo->prepare("SELECT pseudo FROM users WHERE mail = :mail");
      $req->bindValue(':mail', $mail);
   }

   /**
   *
   */
   public function returnUrl()
   {
      $adresse = $_SERVER['PHP_SELF'];
      $i = 0;
      foreach ($_GET as $cle => $valeur) {
         $adresse .= ($i == 0 ? '?' : '&') . $cle . ($valeur ? '=' . $valeur : '');
         $i++;
      }
      return substr($adresse, 48);
   }

   /*************************Function ANTHONY********************/
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
   *  Vérifie si l'id_user est admin
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
   /*******************************************************************/
}
