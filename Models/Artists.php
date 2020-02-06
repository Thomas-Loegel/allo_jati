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
    public function getByArtists()
    {
        $req = $this->pdo->prepare('SELECT artists.*, movies.*, GROUP_CONCAT(movies.id_movie) AS picture FROM artists, movies, artists_movies WHERE artists.id_artist = ? AND artists.id_artist = artists_movies.id_artist AND artists_movies.id_movie = movies.id_movie');
        $req->execute();
        return $req->fetchAll();
    }
}
