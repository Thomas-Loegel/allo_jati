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

      return $req->fetchAll();
   }

   //recherche un commentaire par id_user
   public function getOneComment($id)
   {
      $req = $this->pdo->prepare('SELECT * FROM comments WHERE id_user= ?');
      $resultat = $req->execute([$id]);

      return $req->fetchAll();
   }
   //suppression commentaire par id_comment
   public function delComment($id)
   {
      $req = $this->pdo->prepare('DELETE FROM comments WHERE id_comment = ?');
      $result = $req->execute([$id]);

      return $result;
   }

   //Ajouter un commentaire
   public function addComment(){
      $req = $this->pdo->prepare('INSERT INTO comments (id_user, title, content, note, date
      VALUE (:id_user, :title, :content, :note, :date');
      $result = $req->execute();

      return $result;
   }






   //recherche la liste des commentaire par id_movie
   public function linkCommentByMovie($id)
   {
      $req = $this->pdo->prepare(
         'SELECT comments.* 
         FROM movies, movie_comments, comments 
         WHERE movies.id_movie = ? 
         AND movies.id_movie = movie_comments.id_movie 
         AND comments.id_comment = movie_comments.id_comment');
      $req->execute([$id]);

      return $req->fetchAll();
   }
}
