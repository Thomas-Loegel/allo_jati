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
      $req->execute();

      return $req->fetchAll();
   }

   //recherche un commentaire par id_user
   public function getOneComment($id)
   {
      $req = $this->pdo->prepare('SELECT * FROM comments WHERE id_user= ?');
      $req->execute([$id]);
      return $req->fetchAll();
   }
   //suppression commentaire par id_comment
   public function delComment($id)
   {
      $req = $this->pdo->prepare('DELETE FROM comments 
      WHERE id_comment = ?');
      return $req->execute([$id]);
   }
   //insert dans la table comments la publication 
   public function addComment($id_user, $title, $content, $note){
      $req = $this->pdo->prepare('INSERT INTO comments (id_user, title, content, note)
      VALUE (?, ?, ?, ?)');
      $req->execute([$id_user, $title, $content, $note]);
      return $this->pdo->lastInsertId();
   }

   public function modifyComment(){
      
   }
   //insert dans la table users_comments le dernier commentaire publier
   public function addUsersComments($id_user, $id_comment){
      $req = $this->pdo->prepare('INSERT INTO users_comments (id_user, id_comment)
      VALUE (?, ?)');
      return $req->execute([$id_user, $id_comment]);

   }
   //insert dans la table users_comments le dernier commentaire publier
   public function addMovieComments($id_movie, $id_comment){
      $req = $this->pdo->prepare('INSERT INTO movie_comments (id_movie, id_comment)
      VALUE (?, ?)');
      return $req->execute([$id_movie, $id_comment]);

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

   public function getOneUser($pseudo)
   {
      $req = $this->pdo->prepare('SELECT * FROM users WHERE pseudo= ?');
      $req->execute([$pseudo]);

      return $req->fetchAll();
   }

   public function getOnePseudo($id_user)
   {
      $req = $this->pdo->prepare('SELECT * FROM users WHERE id_user= ?');
      $req->execute([$id_user]);

      return $req->fetchAll();
   }

}
