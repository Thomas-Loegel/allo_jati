<?php
class RolesController
{
    private $id_roles;
    private $id_artists
    private $id_works;

    private $actors;
    private $directors;


    public function __construct()
    {
        $this->actors    = $actors;
        $this->directors = $directors;
    }

    // Setter
    public function setActors($actors)
    {
        $this->actors = $actors;
    }
    public function setDirectors($directors)
    {
        $this->directors = $directors;
    }

    // Getter
    public function getActors($actors)
    {
        return $this->actors;
    }
    public function getDirectors($directors)
    {
        return $this->directors;
    }
}
