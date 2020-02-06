<?php


//connexion bdd
class User extends Model
{
   public function __construct()
   {
      $this->pdo = parent::getPdo();
   }

   /* 
   function register($userlogin, $userpass, $useremail, $pdo)
{
   $req = $pdo->prepare("INSERT INTO login_admin (login, password, email)
   VALUES (:login, :password, :email)");

   $req->bindValue(':login', $userlogin, PDO::PARAM_STR);
   $req->bindValue(':password', $userpass, PDO::PARAM_STR);
   $req->bindValue(':email', $useremail, PDO::PARAM_STR);

   $data = $req->execute();
   return $data;

}
   public function getPseudo()
   {
      $req = $this->pdo->prepare('SELECT pseudo FROM users');

      $req->execute();

      return $req->fetchAll();
   }*/





   //-----> la fonction ckeckLogin : renvoi true si le pseudo entré par l'utilisateur est connu dans la bdd et renvoi un false si le pseudo entré par l'utilisateur est connu dans la bdd
   function checkLogin($pseudo)
   {
      $req = $this->pdo->prepare('SELECT pseudo, mdp, admin FROM users WHERE pseudo = :pseudo');
      $req->bindValue(':pseudo', $pseudo);
      $req->execute();
      $data = $req->fetch();
      return $data;
   }
}
