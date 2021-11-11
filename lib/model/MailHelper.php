<?php

/**
 * Class for handling emails
 * @author     Johan Edlund
 *
 * @package lib.model
 */ 

class MalformedEmailException extends Exception { }
class EmailTransferException extends Exception { }

class MailHelper
{
  public static function checkCorrectMailAddress ($address)
  {
    $v = new sfValidatorSchema(array('email' => new sfValidatorEmail()));
    try
      {
	$clean = $v->clean(array('email' => $address));
      }
    catch (sfValidatorError $e)
      {
	// Handle validation error and message here	
	throw new MalformedEmailException ("Invalid email address");	
      }
  }

  // Set mail user and passwd on conncetion object (credentials)
  private static function setConnectionCredentials ($connection, $user, $passwd)
  {
    $connection->setUsername($user);
    $connection->setPassword($passwd);
  }

  public static function getMailUser ()
  {
    return "internetbazar@gmail.com";
  }

  public static function getMailPassword ()
  {
    return "yrax52123";
  }

  public static function getMailUserX ()
  {
    return "bazaradm@gmail.com";
  }

  public static function getMailPasswordX ()
  {
    return "A_m34Xccv12";
  }


 public static function getMailSendUser ()
  {
    return sfConfig::get('app_mailsenduser');
  }

  public static function getMailSendPassword ()
  {
    return sfConfig::get('app_mailsendpasswd');
  }

  public static function sendMail($mailFrom, $mailto, $subject, $mailBody, $user, $password)
  {
    $mailer = null;
    try
      {			
	$connection = self::getConnection();
	self::setConnectionCredentials($connection, $user, $password);
 
	$mailer = new Swift($connection);
	// Create the mailer and message objects
	#$mailer = new Swift(new Swift_Connection_SMTP());
	$message = new Swift_Message($subject, $mailBody, 'text/html');

	// Send
	$mailer->send($message, $mailto, $mailFrom);
	$mailer->disconnect();
      }
    catch (Exception $e)
      {
	if($mailer != null)
	  $mailer->disconnect();	
	# If there is an error try to send the mail locally
	self::sendMailLocal($mailFrom, $mailto, $subject, $mailBody, $e->getMessage());
	#throw new EmailTransferException ("There was an error while trying to send the email");
      }
  }

  
  public static function sendMailLocal($mailFrom, $mailto, $subject, $mailBody, $prevError)
  {
    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    // Additional headers
    $headers .= 'To: <'.$mailto.'>' . "\r\n";
    $headers .= 'From: <'.$mailFrom.'>' . "\r\n";
    // Mail it
    $success = mail($mailto, $subject, $mailBody, $headers);
    if($success == false)
      throw new EmailTransferException ("There was an error while trying to send the email - locally:" . " , first error:" . $prevError);
   
  }


  public static function getRejectSubject()
  {
    return sfConfig::get('app_mail_reject_subject');
  }

  public static function getRemoveSubject()
  {
    return "Ваше объявление удалено";
  }

  public static function getApproveSubject()
  {
    return sfConfig::get('app_mail_approve_subject');
  }

  public static function getMailFrom()
  {
    return "noreply@internetbazar.com.ua";
  }

  public static function getConnection()
  {
    # set smtp server and port
    $connection = new Swift_Connection_SMTP('smtp.gmail.com', '465', Swift_Connection_SMTP::ENC_SSL);         
    return $connection;
  }

  public static function getReminderSubject() {
    return "срок вашего объявления истекает скоро";
  }

  public static function getReminderBody($valid_until, $passwd, $url, $title) {
    $ret_str = sprintf("срок вашего объявления ($title) истекает %s<br>
Для того, чтобы продлить объявление, нажмите на ссылку ниже. Введите свой пароль и нажмите \"Ok\". После этого вы можете продлить объявление, нажав на кнопку \"продлить объявление\"
<br><br>
Ваш пароль: %s <br><br>%s", $valid_until, $passwd, $url, $title);
    return $ret_str;
  }


  public static function makeTipBody($name, $id)
  {
    $ret_str = sfConfig::get('app_request_mail_tip');
    $ret_str = str_replace("{placeholder1}", $name, $ret_str);
    $ret_str = str_replace("{placeholder2}", self::makeAdSlugUrl($id), $ret_str);

    return $ret_str;
  }

  public static function getTipSubject()
  {
    $ret_str = sfConfig::get('app_mail_tip_subject');
    return $ret_str;
  }

  public static function getRequestSubject($name)
  {
    $ret_str = sfConfig::get('app_mail_request_subject');
    $ret_str = str_replace("{placeholder1}", $name, $ret_str);
    return $ret_str;
  }

  public static function makeSubmitBody()
  {
    $ret_str = sfConfig::get('app_submit_mail_body');
   
    return $ret_str;
  }
  
  public static function makeRequestBody ($productName, $senderName, $senderMail, $text, $id)
  {
    $ret_str = sfConfig::get('app_request_mail_body');
    $ret_str = str_replace("{placeholder1}", $senderName, $ret_str);
    $ret_str = str_replace("{placeholder2}", $productName, $ret_str);
    $ret_str = str_replace("{placeholder3}", $senderMail, $ret_str);
    $ret_str = str_replace("{placeholder4}", nl2br($text), $ret_str);
    $ret_str = str_replace("{placeholder5}", self::makeAdSlugUrl($id), $ret_str);

    return $ret_str;    
  }

  public static function makeApproveBody ($id, $passwd, $valid_until)
  {
    $ret_str = sfConfig::get('app_approve_mail_body');
    $ret_str = str_replace("{placeholder1}", $passwd, $ret_str);
    $ret_str = str_replace("{placeholder2}", self::makeAdUrl($id)."<br>", $ret_str);
    $ret_str = str_replace("{placeholder3}", $valid_until, $ret_str);
    return $ret_str;
  }

  public static function makeRejectionBody ($id, $passwd, $comment)
  {
    $ret_str = sfConfig::get('app_reject_mail_body');

    $ret_str = str_replace("{placeholder1}",  self::getRulesUrl(), $ret_str);

    if($comment != null && ltrim($comment) != "")
      $ret_str = str_replace("{placeholder2}", $comment, $ret_str);
    // If no comment was supplied, remove the placeholder
    $ret_str = str_replace("{placeholder2}", "", $ret_str);

    $ret_str = str_replace("{placeholder3}", $passwd, $ret_str);
    $ret_str = str_replace("{placeholder4}", self::makeChangeAdUrl($id), $ret_str);

    return $ret_str;
  }

  public static function makeRemovalBody ($date, $title) 
  {
    $ret_str = sprintf("<i>Не отвечайте на это сообщение!</i><br><br>Объявление, %s, удалено.
      Срок объявления истек %s <br><br>С уважением, Internetbazar", $title, $date);
    return $ret_str;
  }

  public static function makeRemoveBody ($id, $comment, $title)
  {
    $ret_str = sfConfig::get('app_remove_mail_body');    
    $ret_str = str_replace("{placeholder1}",  self::getRulesUrl(), $ret_str);
    $ret_str = str_replace("{placeholder3}", $title, $ret_str);
    if($comment != null && ltrim($comment) != "")
      $ret_str = str_replace("{placeholder2}", $comment, $ret_str);
    // If no comment was supplied, remove the placeholder
    $ret_str = str_replace("{placeholder2}", "", $ret_str);    
    return $ret_str;
  }

  public static function getPasswdSubject()
  {
    return sfConfig::get('app_mail_passwd_subject');
  }

  public static function makePasswdBody($passwd, $itemId)
  {
    $body = sfConfig::get('app_mail_passwd_body');
    $body = str_replace("{placeholder}", $passwd, $body);        
    $body = str_replace("{placeholder2}", self::makeChangeAdUrl($itemId), $body);        
    return $body;
  }

  public static function makeChangeAdUrl ($id)
  {   
    return "http://www.internetbazar.com.ua/ru/item/login/id/".$id;
  }  

  public static function makeAdSlugUrl ($slug)
  {
    $url = sfConfig::get('app_item_slug_url');
    $url = str_replace("{placeholder}", $slug, $url);        
    return $url;
  }

  public static function makeAdUrl ($id)
  {
    $url = sfConfig::get('app_item_url');
    $url = str_replace("{placeholder}", $id, $url);        
    return $url;
  }

  public static function getPromotionBody ()
  {   
    return sfConfig::get('app_promotion_body');
  }

  public static function getPromotionSubject ()
  {   
    return sfConfig::get('app_promotion_subject');
  }

  public static function getRulesUrl ()
  {   
    return sfConfig::get('app_rules_url');
  }

  
}
