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
      $suggestion  = $this->model->suggestion();
      $pageTwig = 'Suggestion/suggestion.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render(["suggestion" => $suggestion]);
   }

   public function addSuggestion()
   {
      $pseudo = $_POST['pseudo'];
      $email = $_POST['email'];
      $textArea = $_POST['text'];
      $file = $_POST['file'];

      if ($_SERVER['SERVER_NAME'] == 'localhost'){
         
         $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 25))
            ->setUsername('0cf32673dea69d')
            ->setPassword('50f544d056b8b2');
      }  else{
            $transport = new Swift_SendmailTransport();
         }
         $mailer = new Swift_Mailer($transport);
      
         $message = (new Swift_Message('Suggestion site Allo_Jati'))
            ->setFrom([$email => $pseudo])
            ->setTo(['receiver@suggestion.org', 'allo_jati@suggestion.org' => 'A name'])
            ->setBody($textArea.$file);

         $result = $mailer->send($message);
         
         if ($result){
            $ok =  'merci!!!!!';
                    
         }else{
            $ok =  'errrorrrrr';

      }
      $pageTwig = 'Suggestion/suggestion.html.twig';
      $template = $this->twig->load($pageTwig);
      echo $template->render(["ok" =>$ok ]);
   }          
}


