<?php
class ArtsController extends Controller
{
   private $id_works;
   private $type;
   private $title;
   private $year;
   private $style;

   public function __construct()
   {
      $this->twig = parent::getTwig();
      parent::__construct();
      $this->model = new Works();
   }
   /** Setter*/ 

   public function setType($value)
   {
      $this->type = $value;
   }
   public function setTitle($value)
   {
      $this->title = $value;
   }
   public function setYear($value)
   {
      $this->year = $value;
   }
   public function setStyle($value)
   {
      $this->style = $value;
   }

   /** Getter*/ 

   public function getType()
   {
      return $this->type;
   }
   public function getTitle()
   {
      return $this->title;
   }
   public function getYear()
   {
      return $this->year;
   }
   public function getStyle()
   {
      return $this->style;
   }
}
