<?php
class RolesController extends Controller
{
    private $id_role;
    private $id_artist;
    private $id_work;

    private $actor;
    private $director;


    public function __construct()
    {
        $this->actor    = $actor;
        $this->director = $director;
    }

    // Setter
    public function setActor($actor)
    {
        $this->actor = $actor;
    }
    public function setDirector($director)
    {
        $this->director = $director;
    }

    // Getter
    public function getActor($actor)
    {
        return $this->actor;
    }
    public function getDirector($director)
    {
        return $this->director;
    }
}
