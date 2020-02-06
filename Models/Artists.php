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
        $req = "SELECT comments.id, users.login
                AS author, comments.content, comments.date
    			FROM comments
    			INNER JOIN users
    			ON comments.author = users.id
    			WHERE comments.id_article=".$articleid;
        $req->execute();
        return $req->fetchAll();
    }
}
