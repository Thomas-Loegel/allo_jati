<?php

class Admin extends Model
{
   public function __construct()
   {
      $this->pdo = parent::getPdo();
   }

   /**
   *  Ajoute un Film dans la BDD
   */
   public function addMovie($picture,$title,$year,$style,$resume,$time)
   {
      $req = $this->pdo->prepare(
        "INSERT INTO movies(picture,title,year,style,resume,time)
         VALUES (?,?,?,?,?,?)");
      $req->execute([$picture,$title,$year,$style,$resume,$time]);
   }
}
