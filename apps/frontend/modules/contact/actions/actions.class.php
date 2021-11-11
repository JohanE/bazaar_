<?php

/**
 * contact actions.
 *
 * @package    internetbazar
 * @subpackage contact
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class contactActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    
  }

  public function executeTest(sfWebRequest $request)
  {
    
  }

 public function executeContactMailAjax(sfWebRequest $request)
  {  	   
    // Security check    
    $this->forward404Unless($this->getRequest()->isXmlHttpRequest());

    $sender_email = ltrim($this->getRequestParameter('sender_email'));
    $sender_name  = ltrim($this->getRequestParameter('sender_name'));
    $subject = ltrim($this->getRequestParameter('subject'));
    $mailBody    = ltrim($this->getRequestParameter('text_content'));

    $mailto = sfConfig::get('app_contact_mail');
    $error = false;

     // create response object
    $json = array();
    $json['error'] = array();

    if($sender_name == null)
      {
	$json['error']['sender_name'] = 'sender name missing!';
	$error = true;
      }
    if($sender_email == null)
      {
	$json['error']['sender_email'] = 'The sender email is missing!';
	$error = true;
      }
    if($subject == null)
      {
	$json['error']['subject'] = 'The subject is missing!';
	$error = true;
      }
    if($mailBody == null)
      {
	$json['error']['mailBody'] = 'The text content is missing!';
	$error = true;
      }

    try {
      MailHelper::checkCorrectMailAddress($sender_email);
    } catch (MalformedEmailException $ex) 
	{
	  $json['error']['sender_mail'] = 'The sender mail adress is missing or invalid:'.$ex->getMessage();
	  $error = true;
	}

    try {
      MailHelper::checkCorrectMailAddress($mailto);
    } catch (MalformedEmailException $ex) 
	{
	  sfContext::getInstance()->getLogger()->info("---------- invalid email: ".$mailto.": " . $ex->getMessage());
	  $json['error']['system_mail'] = 'The system mail adress is missing or invalid';
	  $error = true;
	}
    
    if(!$error)
      {
	$mailBody .= "<br><br>от: " . $sender_name;
	try 
	  {
	    MailHelper::sendMail($sender_email, $mailto, $subject, nl2br($mailBody), MailHelper::getMailSendUser(), MailHelper::getMailSendPassword());
	  }
	catch(EmailTransferException $e)
	  {	    
	    sfContext::getInstance()->getLogger()->info("---------- Failed to send mail to: " .$mailto. " , ". $e->getMessage());
	    $json['error']['send'] = 'There was an error sending the mail! ' . $e->getMessage();	    
	  }
      }  

    $this->getResponse()->setHttpHeader('Content-Type','application/json; charset=utf-8');
    return $this->renderText(json_encode($json));  
  }


}
