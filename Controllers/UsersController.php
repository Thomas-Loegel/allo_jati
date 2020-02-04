<?php

class User
{

    private $admin;
    private $pseudo;
    private $mdp;
    private $mail;


    /**admin */
    public function set_admin($admin)
    {
        $this->$admin = $admin;
    }

    public function get_admin()
    {
        echo $this->admin;
    }


    /**pseudo */
    public function set_pseudo($pseudo)
    {
        $this->$pseudo = $pseudo;
    }

    public function get_pseudo()
    {
        echo $this->pseudo;
    }

    /**mdp */
    public function set_mdp($mdp)
    {
        $this->$mdp = $mdp;
    }

    public function get_mdp()
    {
        echo $this->mdp;
    }

    /**mail */
    public function set_mail($mail)
    {
        $this->$mail = $mail;
    }


    public function get_mail()
    {
        echo $this->mail;
    }
}
