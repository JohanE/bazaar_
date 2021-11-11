<?php

class ItemMaintenance extends sfPropelBaseTask
{
  protected function configure()
  {
    $this->namespace = 'maintenance';
    $this->name = 'itemcleaner';
    $this->briefDescription = 'Cleaning up old items';

    $this->detailedDescription = <<<EOF
The [mailtasks:sender|INFO] just sends mails natively :
 
  [php symfony mailtasks:sender] 
EOF;

  }
 
  protected function execute($arguments = array(), $options = array())
  {
    $this->log('maintenance:itemcleaner');
    
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = Propel::getConnection();    
    # remove 'deleted' items
    ItemPeer::removeDeletedItems();
    # remove 'old' items with status "submitted", "deleted", "rejected" or no status at all
    ItemPeer::removeOldItems();
    ItemPeer::removeOldItems(Status::submitted);
    ItemPeer::removeOldItems(Status::deleted);
    ItemPeer::removeOldItems(Status::rejected);

    # remove invalid items, i.e items that that are too old (valid_until column)
    ItemPeer::removeInvalidItems(DateHelper::getTodaysDate(), Status::approved);
  }
}

?>
