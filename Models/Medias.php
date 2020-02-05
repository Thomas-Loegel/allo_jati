<?php

class Medias extends Model
{
   public function __construct()
   {
      $this->pdo = parent::getPdo();
   }
   public function getAllPosters()
   {
      $req = $this->pdo->prepare('SELECT poster FROM medias');
      $req->execute();
      return $req->fetchAll();
   }
   public function getAllPictures()
   {
      $req = $this->pdo->prepare('SELECT pictures FROM medias');
      $req->execute();
      return $req->fetchAll();
   }
}
