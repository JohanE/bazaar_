<?php

/**
 * Subclass for performing query and update operations on the 'internetbazar_yearmodel' table.
 *
 * 
 *
 * @package lib.model
 */ 
class YearmodelPeer extends BaseYearmodelPeer
{
 static public function getYearmodelsFrom()
  {   
    $culture = sfContext::getInstance()->getUser()->getCulture();
    $c = new Criteria();
    $c->addAscendingOrderByColumn(YearmodelI18nPeer::NAME);    
    return self::doSelectWithI18n($c, $culture);
  }

 static public function getYearmodelsTo()
  {
    $fromArray = self::getYearmodelsFrom();
    if(count($fromArray > 0))
      array_shift($fromArray);
    return $fromArray;
  }
}
