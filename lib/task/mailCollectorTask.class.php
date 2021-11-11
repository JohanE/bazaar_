<?php

class MailCollectorTask extends sfPropelBaseTask
{
  protected function configure()
  {
    $this->namespace = 'mailtasks';
    $this->name = 'collect';
    $this->briefDescription = 'Inserts mails into table';

    $this->detailedDescription = <<<EOF
The [mailtasks:collect|INFO] task manages the process of storing mails for u
      Call it with one param whick is the path to a textfile containing mails, one on each row :
 
  [php symfony mailtasks:collect path_to_txt_file|INFO] 
EOF;

    $this->addArgument('path', sfCommandArgument::REQUIRED, 'The path to the mail file');
#    $this->addOption('check', null, sfCommandOption::PARAMETER_REQUIRED, 'Checks stuff before inserting', false);


  }
 
  protected function execute($arguments = array(), $options = array())
  {
    // your code here
    $this->log('mailtasks:collect');
    $this->log('----------- Here comes the argument:--------' . $arguments['path']. '  ' .count($options));
    $mailarr = array();
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = Propel::getConnection();

    try {
      $myFile = $arguments['path'];
      $fh = fopen($myFile, 'r');

      while(!feof($fh))
	{
	  $theData = fgets($fh);
	  $theData = trim($theData);
	  array_push($mailarr, $theData);
	}
      fclose($fh);
      $this->log('theData = ' . $theData . ' length of txt = '.strlen($theData));
      $this->log('size of arr = ' . count($mailarr));
    } catch (Exception $e) {
      $this->log('... Could not open file...' .$e->getMessage());
    } 

    foreach($mailarr as $themail)
      {
	$validMail = false;
	try {
	  MailHelper::checkCorrectMailAddress($themail);
	  $validMail = true;
	} catch (MalformedEmailException $ex) 
	    {	      
	      $this->log('... Mail format error...' .' mail='. $themail . ' ' .$ex->getMessage());
	    }

	if($validMail) 
	  {
	    # Begin inserting mail(s) here
	    try {

	      #$sendstatus = new Sendstatus();
	      $sendstatus = SendstatusPeer::retrieveByPk(2);
	      
	      $ibmail = new IBMail();
	      $ibmail->setEmail($themail);
	      $ibmail->setSendstatus($sendstatus);
	      $ibmail->save();

	      
	      $this->log('inserted into table, ' . $themail);
	    } catch (Exception $e) {
	      $this->log('Could NOT insert into table '.$e->getMessage());
	    } 
	  }
      }

  }
}

?>