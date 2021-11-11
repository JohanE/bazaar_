<?php

class ItemTestFunctional extends sfTestFunctional
{
  public function loadData()
  {
    $loader = new sfPropelData();
    $loader->setDeleteCurrentData(true); 
    $loader->loadData(sfConfig::get('sf_root_dir').'/data/fixtures');
 
    return $this;
  }
}
?>