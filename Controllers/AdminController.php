<?php

class Admin extends User
{

   public function __construct()
    {
        $this->twig = parent::getTwig();
    }

    public function index()
    {
        $pageTwig = 'index.html.twig';
        $template = $this->twig->load($pageTwig);
        echo $template->render();
    }
    
}