<?php


//connexion bdd
class User extends Model
{
   public function __construct()
   {
      $this->pdo = parent::getPdo();
   }

}
