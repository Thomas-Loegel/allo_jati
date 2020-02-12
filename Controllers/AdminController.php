<?php

class AdminController extends UsersController
{
   public function __construct()
   {
      $this->twig = parent::getTwig();
   }

   public function admin()
   {
     $pageTwig = 'Admin/admin.html.twig';
     $template = $this->twig->load($pageTwig);
     echo $template->render();
   }
}
