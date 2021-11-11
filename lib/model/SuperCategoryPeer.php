<?php

/**
 * Subclass for performing query and update operations on the 'internetbazar_supercategory' table.
 *
 * 
 *
 * @package lib.model
 */ 
class SuperCategoryPeer extends BaseSuperCategoryPeer
{
 static public function getSupercategories()
  {   
    $culture = sfContext::getInstance()->getUser()->getCulture();
    $c = new Criteria();
    $c->addAscendingOrderByColumn(SuperCategoryPeer::SORT_FIELD);    
    return self::doSelectWithI18n($c, $culture);
  }

 static public function getCategories($supercatId)
  {   
    $culture = sfContext::getInstance()->getUser()->getCulture();
    $c = new Criteria();
    $c->add(CategoryPeer::SUPERCATEGORY_ID, $supercatId);
    $c->addAscendingOrderByColumn(CategoryPeer::SORT_FIELD);    
    return CategoryPeer::doSelectWithI18n($c, $culture);
  }

}
