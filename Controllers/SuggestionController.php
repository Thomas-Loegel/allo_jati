<?php

class SuggestionController extends Controller
{
   private $pseudo;
   private $email;
   private $textArea;
   private $file;

   public function __construct()
   {
      $this->twig = parent::getTwig();
      parent::__construct();
      $this->model = new Suggestion();
   }

   public function suggestion()
   {
      $suggestion   = $this->model->suggestion();
      $pageTwig = 'Suggestion/suggestion.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render(["suggestion" => $suggestion]);
   }

   public function addSuggestion()
   {
      $to = "somebody@example.com";
      $subject = "My subject";
      $txt = "Hello world!";  
      $headers = "From: webmaster@example.com" . "\r\n" .
      "CC: somebodyelse@example.com";

      $mail = mail($to,$subject,$txt,$headers);

      /*$pseudo = $_POST['pseudo'];
      $email = $_POST['email'];
      $textArea = $_POST['text'];
      $file = $_POST['file'];


       $result = mail('test@test.com', 'salut', 'je fais un test', 'From: webmaster@example.com');*/

      if ($mail){
         echo "thanx";

      }else{
         echo"nooooooooooooo";
      }
   }


}