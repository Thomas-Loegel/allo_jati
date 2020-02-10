<?php
class CommentsController extends Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->model = new Comments();
   }
   //delete comment
   public function deleteComment($id_movie)
   {
      $this->model->delComment($id_movie);
   }

   //render 
   public function index()
   {
      /*$OneComment = $this->model->getOneComment();
      $result = delComment($delId);
      $liaisonCom = $this->model->linkCommentWorks();//argument id movie
      $delete      = $this->model->delAllCommentFromMovie(1);//argument id movie*/
      $pageTwig = 'Comments/index.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render(["comments" => $comments, "OneComment" => $OneComment/*, "liaison" => $liaisonCom, "del" => $delete*/]);
   }
   //Supprime tous les commentaire liés à id_movie
   public function delAllComByMovie($id)
   {
      $tabCom = $this->model->linkCommentByMovie($id); 
      var_dump($tabCom);
      foreach ($tabCom as $k => $v) {
         $delId = $v['id_comment'];
         $this->model->delComment($delId);
      }
   }
   public function getAllCom()
   {
      $comments   = $this->model->getAllComments();
      $pageTwig = 'Comments/index.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render(["comments" => $comments]);
   }
   public function addComment($id_movie){
      /*session_start();
      var_dump($_SESSION['status']);
      if($_SESSION['status'] != null){
         $pseudo = $_SESSION['utilisateur'];

      } else {
         $_SESSION['tmpComment'] = $_POST['ControlText'];
         var_dump($_SESSION['tmpComment']);
      }*/
   }
}
/*(
      'SELECT comments.* 
      FROM movies, movie_comments, comments 
      WHERE movies.id_movie = 1 
      AND movies.id_movie = movie_comments.id_movie 
      AND comments.id_comment = movie_comments.id_comment');*/
