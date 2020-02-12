<?php

class HomeController extends Controller
{

    public function __construct()
    {
        $this->twig = parent::getTwig();
    }
    public function index()
    {
       
      $session = parent::controlSession();

      $pageTwig = 'index.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render(['session' => $session]);
    }

}
