<?php
class ArtistsController
{
    private $id_artist;
    private $id_role;
    private $id_work;
    private $id_media;

    private $first_name;
    private $last_name;
    private $birth_day;
    private $bio;

    public function __construct()
    {
        $this->first_name = $first_name;
        $this->last_name  = $last_name;
        $this->birth_day  = $birth_day;
        $this->bio        = $bio;
    }

    // Setter
    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;
    }
    public function setLast_name($last_name)
    {
        $this->last_name = $last_name;
    }
    public function setBirth_day($birth_day)
    {
        $this->birth_day = $birth_day;
    }
    public function setBio($bio)
    {
        $this->bio = $bio;
    }

    // Getter
    public function getFirst_name($first_name)
    {
        return $this->first_name;
    }
    public function getLast_name($last_name)
    {
        return $this->last_name;
    }
    public function getBirth_day($birth_day)
    {
        return $this->birth_day;
    }
    public function getLast_name($bio)
    {
        return $this->bio;
    }
}
