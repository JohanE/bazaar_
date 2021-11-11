<?php

class ItemReminder extends sfPropelBaseTask
{
  protected function configure()
  {
    $this->namespace = 'maintenance';
    $this->name = 'itemreminder';
    $this->briefDescription = 'Reminding items to become expired';

    $this->detailedDescription = <<<EOF
The [mailtasks:sender|INFO] just sends mails natively :
 
  [php symfony mailtasks:sender] 
EOF;

  }
 
  protected function execute($arguments = array(), $options = array())
  {
    $this->log('maintenance:itemreminder');
    
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = Propel::getConnection();    
    # get a list of items to be reminded
    $theDate = DateHelper::getTodaysDate();

    $items = ItemPeer::getItemsToBecomeExpired($theDate, Status::approved);
    foreach($items as $item)
      {
	echo "item: " . $item . "\n";

	try 
	  {
	    MailHelper::sendMail(MailHelper::getMailFrom(), $item->getEmail(),
				 MailHelper::getReminderSubject(), 
				 MailHelper::getReminderBody(DateHelper::getFormattedDate($item->getValidUntil()), 
							     $item->getPassword(), MailHelper::makeChangeAdUrl($item->getId()), $item->getTitle()), 
				 MailHelper::getMailUserX(), MailHelper::getMailPasswordX());

	    $item->setNrOfExpirationReminders('1'); 
	    $item->save();
	  }
    
	catch(EmailTransferException $e)
	  {
	    echo "error: " . $e->getMessage();
	  }   
      }

  }
}

?>
