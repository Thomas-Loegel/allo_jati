<?php

class Comments extends Model
{
   public function __construct()
   {
      $this->pdo = parent::getPdo();
   }
   //recherche tous les commentaires de la BDD
   public function getAllComments()
   {
      $req = $this->pdo->prepare('SELECT * FROM comments');
      $resultat = $req->execute();
      //var_dump($resultat);
      return $req->fetchAll();
   }
   //recherche un commentaire par id_user
   public function getOneComment($id)
   {
      $req = $this->pdo->prepare('SELECT * FROM comments WHERE id_user= ?');
      $resultat = $req->execute([$id]);
      //var_dump($resultat);
      return $req->fetchAll();
   }
   //suppression commentaire par id_comment
   public function delComment($id)
   {
      $req = $this->pdo->prepare('DELETE FROM comments WHERE id_comment = ?');
      $result = $req->execute([$id]);
      //var_dump($result);
      return $result;
   }
   //recherche la liste des commentaire par id_movie
   public function linkCommentWorks($id)
   {
      $req = $this->pdo->prepare(
         'SELECT comments.* 
         FROM movies, movie_comments, comments 
         WHERE movies.id_movie = ? 
         AND movies.id_movie = movie_comments.id_movie 
         AND comments.id_comment = movie_comments.id_comment');
      $req->execute([$id]);
      //var_dump($req->fetchAll());
      return $req->fetchAll();
   }
}
