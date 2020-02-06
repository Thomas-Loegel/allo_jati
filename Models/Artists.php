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
    public function getByMovie()
    {
        $req =
        $req->execute();
        return $req->fetch();
    }
}
