<?php

class WorksController extends ArtsController
{
   private $abstract;
   private $picture;
   private $time;

   public function __construct()
   {
      $this->twig = parent::getTwig();
      parent::__construct();
      $this->model = new Works();
   }

   /**Setter */
   public function setAbstract($value)
   {
      $this->abstract = $value;
   } 
   public function setTime($value)
   {
      $this->time = $value;
   }
   public function setPicture($value)
   {
      $this->picture = $value;
   }

   /**Getter */
   public function getAbstract($value)
   {
      return $this->abstract;
   }
   public function getTime($value)
   {
      return $this->time;
   }
   public function getPicture($value)
   {
      return $this->picture;
   }
   /**Function*/
   public function create()
   {

   }
   public function change()
   {

   }
   public function delete()
   {

   }

   /**  Affichage du template*/
   public function index()
   {
      $result = $this->model->getAllFilms();
      $pageTwig = 'Works/index.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render(["result" => $result]);
   }
   public function showmovie(int $id_works) {
      $pageTwig = 'Works/ShowFilm.html.twig';
      $template = $this->twig->load($pageTwig);
      $result = $this->model->getOneExemple($id_works);
      echo $template->render(["result" => $result]);
  }
}
