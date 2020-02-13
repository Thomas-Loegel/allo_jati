<?php

class Admin extends Model
{
   public function __construct()
   {
      $this->pdo = parent::getPdo();
   }

   public function getAllUsers()
   {
      $req = $this->pdo->prepare('SELECT * FROM users');
      $req->execute();
      $req->fetchAll();
   }
}
