<?php

class User extends Model
{
   public function __construct()
   {
      $this->pdo = parent::getPdo();
   }

   public function getpseudo()
   {
      $req = $this->pdo->prepare('SELECT FROM `users` WHERE `pseudo`');
      $req->execute();
      return $req->fetchAll();
   }
}
