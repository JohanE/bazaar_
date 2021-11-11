<?php

class MailSenderTask extends sfPropelBaseTask
{
  protected function configure()
  {
    $this->namespace = 'mailtasks';
    $this->name = 'sender';
    $this->briefDescription = 'Sends mails..';

    $this->detailedDescription = <<<EOF
The [mailtasks:sender|INFO] just sends mails natively :
 
  [php symfony mailtasks:sender] 
EOF;

  }
 
  protected function execute($arguments = array(), $options = array())
  {
    // your code here
    $this->log('mailtasks:sender');
    
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = Propel::getConnection();

    $query = 'SELECT MAX(a.id) AS min FROM internetbazar_ibmail a,internetbazar_sendstatus b ';
    $query .= 'where a.sendstatus_id = 2';
    #$query = sprintf($query, IBMailPeer::ID, IBMailPeer::TABLE_NAME, SendstatusPeer::TABLE_NAME);
    echo "----------------- query :" . $query . "\n";
    $statement = $connection->prepare($query);
    $statement->execute();
    $resultset = $statement->fetch(PDO::FETCH_OBJ);
    $min = $resultset->min;

    $current_ibmail = IBMailPeer::retrieveByPk($min);
    if(!$current_ibmail)
      exit;

    echo "----------------- current mail = " , $current_ibmail->getEmail() . "\n";
    $mail_body   = MailHelper::getPromotionBody();
    $sender_email = MailHelper::getMailFrom();
    $mail_subject = MailHelper::getPromotionSubject();
    $problem = "";
    $mail_subject = "Украинский портал объявлений - Internetbazar";
    $mail_body = "Добрый день, <br>Internetbazar предоставляет Вам возможность бесплатно разместить или найти частные объявления и объявления фирм, например: бу авто, недвижимость, мебель, бытовая и электро техника и многое другое со всей Украины.<br><br>http://www.internetbazar.com.ua/<br><br>Заходите, посмотрите и пользуйтесь, Вам обязательно понравится.<br><br>С уважением, Internetbazar";
    
	$sender_email = "noreply@internetbazar.com.ua";


    $to = $current_ibmail->getEmail();
    // subject
    $subject = 'Украинский портал объявлений - Internetbazar';
    
    // message
    $message = $mail_body;

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'To: <'.$to.'>' . "\r\n";
$headers .= 'From: Олег Кульчицький<'.$sender_email.'>' . "\r\n";




// Mail it
 $success = mail($to, $subject, $message, $headers);
 // Change status to "sent", if successful send
 if($success)
   {
     $sendstatus = SendstatusPeer::retrieveByPk(1);  
     $current_ibmail->setSendstatus($sendstatus);
     $current_ibmail->save();
     echo "mail sent to " . $to . "\n";
   }
 else
   {
     echo "Could not send mail..\n";
   }   
  }
}

?>
