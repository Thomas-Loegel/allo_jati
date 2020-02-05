<?php

class MediasController extends Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->model = new Medias();
   }
   //render Posters
   public function index()
   {
      $posters = $this->model->getAllPosters();
      $pictures = $this->model->getAllPictures();
      $pageTwig = 'Medias/index.html.twig';
      $template = $this->twig->load($pageTwig);

      echo $template->render(["posters" => $posters, "pictures" => $pictures]);
   }
}
