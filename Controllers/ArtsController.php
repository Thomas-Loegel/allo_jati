<?php

class Arts 
{
   private $id_oeuvres;
   private $type;
   private $titre;
   private $annee;
   private $genre;

   
   public function __construct($id_oeuvres,$type,$titre,$annee,$genre)
   {
      $this->id_oeuvres = $id_oeuvres;
      $this->type = $type;
      $this->titre = $titre;
      $this->annee = $annee;
      $this->genre = $genre;
   }
   public function __getType(){
      return $this->type;
   }
   public function __setType($value){
      $this->type=$value;
   }

   public function __getTitre(){
      return $this->titre;
   }
   public function __setTitre($value){
      $this->titre=$value;
   }

   public function __getAnnee(){
      return $this->annee;
   }
   public function __setAnnee($value){
      $this->annee=$value;
   }

   public function __getGenre(){
      return $this->genre;
   }
   public function __setGenre($value){
      $this->genre=$value;
   }

}