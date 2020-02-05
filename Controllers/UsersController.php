<?php

class User
{

    private $admin;
    private $pseudo;
    private $mdp;
    private $mail;


    public function set($admin, $pseudo, $mdp)
    {
        $this->$admin = $admin;
        $this->$pseudo = $pseudo;
        $this->$mdp = $mdp;
    }

    public function get()
    {
        echo $this->admin;
        echo $this->pseudo;
        echo $this->mdp;
        echo $this->mail;
    }

}
