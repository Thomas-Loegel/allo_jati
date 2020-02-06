<?php

class Artists extends Model
{
   public function __construct()
   {
      $this->pdo = parent::getPdo();
   }

   // Récupère tout les Artistes
   public function getAllArtists()
   {
      $req = $this->pdo->prepare('SELECT * FROM artists');
      $req->execute();
      return $req->fetchAll();
   }

   // Récupère tout les Artistes liés au Film
   public function getByMovie($id)
   {
      $req = $this->pdo->prepare(
         "SELECT artists.*
          FROM artists, artists_movies, movies
          WHERE movies.id_movie = ?
          AND movies.id_movie = artists_movies.id_movie
          AND artists.id_artist = artists_movies.id_artist");
      $req->execute([$id]);
      return $req->fetchAll();
   }

   public function getArtist(int $id_artist)
   {
      $req = $this->pdo->prepare(
        'SELECT *
         FROM artists
         WHERE artists.id_artist = ?
         AND artists.id_artist = artists.id_artist');
      $req->execute([$id_artist]);
      return $req->fetch();
   }
}