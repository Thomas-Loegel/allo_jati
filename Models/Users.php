<?php

class User extends Model
{
   public function __construct()
   {
      $this->pdo = parent::getPdo();
   }


   //-----> la fonction ckeckLogin : renvoi true si le pseudo entré par l'utilisateur est connu dans la bdd et renvoi un false si le pseudo entré par l'utilisateur est connu dans la bdd
   public function checkLogin($pseudo)
   {
      $req = $this->pdo->prepare('SELECT pseudo, mdp, admin FROM users WHERE pseudo = :pseudo');
      $req->bindValue(':pseudo', $pseudo);
      $req->execute();
      $data = $req->fetch();
      return $data;
   }

   public function insertUser($mail, $pseudo, $mdp)
   {
      $req = $this->pdo->prepare("INSERT INTO users(mail, pseudo, mdp) VALUES ('$mail', '$pseudo', '$mdp')");
      $req->execute();
   }

   public function getAllUsers()
   {
      $req = $this->pdo->prepare('SELECT * FROM users');
      $req->execute();
      $req->fetchAll();
   }
}
