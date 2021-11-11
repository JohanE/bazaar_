<?php

/**
 * Subclass for representing a row from the 'internetbazar_supercategory' table.
 *
 * 
 *
 * @package lib.model
 */ 
class SuperCategory extends BaseSuperCategory
{

  // special for I18n
  public function __toString()
  {
    return parent::getName();
  }


  public function getCategories()
  {
    return SuperCategoryPeer::getCategories($this->id);
  }
}
