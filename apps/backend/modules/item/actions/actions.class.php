<?php

require_once dirname(__FILE__).'/../lib/itemGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/itemGeneratorHelper.class.php';

/**
 * item actions.
 *
 * @package    internetbazar
 * @subpackage item
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class itemActions extends autoItemActions
{
 public function executeListPreview(sfWebRequest $request)
  {
    $this->item = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->item);
  }

 public function executeListApprove(sfWebRequest $request)
 {
   $item = $this->getRoute()->getObject();
   // Set status to approved
   $mystatus = StatusPeer::retrieveByPk(Status::approved);        
   $item->setStatus($mystatus);    

   // The valid_until attribute should only be set once (first approve occation)    
   if (!$item->getValidUntil())
     {		
       $item->setValidUntil(DateHelper::getEndDate());	
     }

   // The approved at attribute should only be set once (first approve occation)    
   if (!$item->getApprovedAt())
     {		
       $item->setApprovedAt(time());	
     }

   // Save the item
   $item->save();    

   $this->getUser()->setFlash('notice', 'The item was approved.'); 
   // Mail to user
   try 
     {
       MailHelper::sendMail(MailHelper::getMailFrom(),$item->getEmail(), MailHelper::getApproveSubject(), 
			    MailHelper::makeApproveBody($item->getId(), $item->getPassword(), 
			    DateHelper::getFormattedDate($item->getValidUntil())),MailHelper::getMailUser(), 
			    MailHelper::getMailPassword());
     }
   catch(EmailTransferException $e)
     {
       $this->getUser()->setFlash('notice', 'The item (id='.$item->getId().') was approved. But the MAIL could NOT be sent! If the problem appears several times contact admin. U can try to approve it again, look it up under the approve filter.!'); 
       $this->logMessage("------------------------- COULD NOT SEND MAIL: " .$e->getMessage() );
     }
   
   $this->redirect('@item');

 }

 public function executeListReject2(sfWebRequest $request)
 {
   $itemid = $request->getParameter('item[id]'); #$this->getRoute()->getObject();
   $rejection_comment = $request->getParameter('rejection_comment');

   $item = ItemPeer::retrieveByPk($itemid);        
   // Set status to submitted
   $mystatus = StatusPeer::retrieveByPk(Status::rejected);        
   $item->setStatus($mystatus);    

   // Save the item
   $item->save();    

   $this->getUser()->setFlash('notice', 'The item was rejected.'); 

   // Mail to user
   try 
     {
       MailHelper::sendMail(MailHelper::getMailFrom(), $item->getEmail(), MailHelper::getRejectSubject(), MailHelper::makeRejectionBody($item->getId(), $item->getPassword(), $rejection_comment), MailHelper::getMailUser(), MailHelper::getMailPassword());
     }
   catch(EmailTransferException $e)
     {
       $this->getUser()->setFlash('notice', 'The item (id='.$item->getId().') was rejected. But the MAIL could NOT be sent!U can try to reject it again, go to the rejected filter. Contact admin if the problem persists.'); 
     }
   
   $this->redirect('@item');

 }

 public function executeListRemove2(sfWebRequest $request)
 {
   $itemid = $request->getParameter('item[id]'); #$this->getRoute()->getObject();
   $rejection_comment = $request->getParameter('rejection_comment');

   $item = ItemPeer::retrieveByPk($itemid);        
   // Set status to deleted
   $mystatus = StatusPeer::retrieveByPk(Status::deleted);        
   $item->setStatus($mystatus);    

   // Save the item
   $item->save();    

   $this->getUser()->setFlash('notice', 'The item was taken off the site.'); 

   // Mail to user
   try 
     {
       MailHelper::sendMail(MailHelper::getMailFrom(), $item->getEmail(), MailHelper::getRemoveSubject(), MailHelper::makeRemoveBody($item->getId(), $rejection_comment, $item->getTitle()), MailHelper::getMailUser(), MailHelper::getMailPassword());
     }
   catch(EmailTransferException $e)
     {
       $this->getUser()->setFlash('notice', 'Uvaga! The item (id='.$item->getId().') was rejected. But the MAIL could NOT be sent. U can try to delete it again by going to the deleted filter. Contact admin if the problem persists!'); 
     }
   
   $this->redirect('@item');

 }

 public function executeListReject(sfWebRequest $request)
 {
   $this->item = $this->getRoute()->getObject();
   $this->form = $this->configuration->getForm($this->item);
 }

 public function executeListRemove(sfWebRequest $request)
 {
   $this->item = $this->getRoute()->getObject();
   $this->form = $this->configuration->getForm($this->item);
 }


}
