<?php
/** */
class Works extends Model
{
   public function __construct()
   {
      $this->pdo = parent::getPdo();

   }

   // Requete pour requpere tous les film
   public function getAllFilms()
   {
      $req = $this->pdo->prepare('SELECT * FROM works');
      $req->execute();
      return $req->fetchAll();
   }
   public function getOneExemple($id_works) {
      $req = $this->pdo->prepare('SELECT * FROM works WHERE works.id_works = ? AND works.id_works = works.id_works ');
      $req->execute([$id_works]);
      return $req->fetch();
  }

}