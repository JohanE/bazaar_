<?php

class ItemSlugify extends sfPropelBaseTask
{
  protected function configure()
  {
    $this->namespace = 'maintenance';
    $this->name = 'itemslugify';
    $this->briefDescription = 'Slugifing items';

    $this->detailedDescription = <<<EOF
The [mailtasks:sender|INFO] just sends mails natively :
 
  [php symfony mailtasks:sender] 
EOF;

  }
 
  protected function execute($arguments = array(), $options = array())
  {
    // your code here
    $this->log('maintenance:itemslugify');
    
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = Propel::getConnection();    
    # 
    ItemPeer::slugifyItems();
  }
}

?>
