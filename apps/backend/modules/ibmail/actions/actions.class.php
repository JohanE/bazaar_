<?php

require_once dirname(__FILE__).'/../lib/ibmailGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/ibmailGeneratorHelper.class.php';

/**
 * ibmail actions.
 *
 * @package    internetbazar
 * @subpackage ibmail
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class ibmailActions extends autoIbmailActions
{
  public function executeBatchSend(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');
    
    $mails = IBMailPeer::retrieveByPks($ids);    

    $problem = "";

    foreach ($mails as $mail)
      {
	$mail_body   = MailHelper::getPromotionBody();
	$sender_email = MailHelper::getMailFrom();
	$mail_subject = MailHelper::getPromotionSubject();

	try 
	  {
	    // send mails
	    $sendstatus = SendstatusPeer::retrieveByPk(1);
	    MailHelper::sendMailContactTest($sender_email, $mail->getEmail(), $mail_subject, nl2br($mail_body));
	    // change status to "sent"
	    $mail->setSendstatus($sendstatus);
	    $mail->save();
	  }
	catch(EmailTransferException $e)
	  {
	    $problem = $e->getMessage();
	  }	
      }
 
    $this->getUser()->setFlash('notice', 'The selected mails have been sent. problem:' .$problem);
    
    $this->redirect('@ib_mail');
  }

}
