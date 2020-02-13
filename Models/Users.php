<?php

class User extends Model
{
   public function __construct()
   {
      $this->pdo = parent::getPdo();
   }

   /**
   *  Renvoi true si Pseudo est connu dans la bdd,
   *  Renvoi false si Pseudo est inconnu dans la bdd
   */
   public function ckeckLogin(){
      $req = $this->pdo->prepare('SELECT pseudo, mdp, admin FROM users WHERE pseudo = :pseudo');
      $req->bindValue(':pseudo', $pseudo);
      $req->execute();
      $data = $req->fetch();
      return $data;
   }

   /**
   *  Ajoute un nouveau User
   */
   public function insertUser($mail, $pseudo, $mdp)
   {
      $req = $this->pdo->prepare("INSERT INTO users(mail, pseudo, mdp) VALUES ('$mail', '$pseudo', '$mdp')");
      $req->execute();
   }

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
   *
   */
   public function getOneUser($pseudo)
   {
      $req = $this->pdo->prepare('SELECT * FROM users WHERE pseudo= ?');
      $req->execute([$pseudo]);
      return $req->fetch();
   }

   /**
   *
   */
   public function getOnePseudo($id_user)
   {
      $req = $this->pdo->prepare('SELECT pseudo FROM users WHERE id_user= ?');
      $req->execute([$id_user]);
      return $req->fetch();
   }

   /**
   *
   */
   public function getOneIdUser($pseudo)
   {
      $req = $this->pdo->prepare('SELECT `id_user` FROM users WHERE pseudo= ?');
      $req->execute([$pseudo]);
      return $req->fetch();
   }

   /**
   *
   */
   public function checkAdmin($id_user)
   {
      $req = $this->pdo->prepare('SELECT `admin` FROM users WHERE id_user= ?');
      $req->execute([$id_user]);
      return $req->fetch();
   }

   /**
   *
   */
   public function searchAvatar($id_user)
   {
      $req = $this->pdo->prepare('SELECT `avatar` FROM users WHERE id_user= ?');
      $req->execute([$id_user]);
      return $req->fetch();
   }
}
