<?php

/**
 * Subclass for performing query and update operations on the 'internetbazar_fuel' table.
 *
 * 
 *
 * @package lib.model
 */ 
class FuelPeer extends BaseFuelPeer
{
 public static function getFuelTypes()
  {
    $culture = sfContext::getInstance()->getUser()->getCulture();

    $c = new Criteria();
    $c->addAscendingOrderByColumn(FuelI18nPeer::NAME);    
    return self::doSelectWithI18n($c, $culture);
  }

}
