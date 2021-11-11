<?php

/**
 * Subclass for performing query and update operations on the 'internetbazar_gearbox' table.
 *
 * 
 *
 * @package lib.model
 */ 
class GearboxPeer extends BaseGearboxPeer
{
  public static function getGearboxes()
  {
    $culture = sfContext::getInstance()->getUser()->getCulture();

    $c = new Criteria();
    $c->addAscendingOrderByColumn(GearboxI18nPeer::NAME);    
    return self::doSelectWithI18n($c, $culture);
  }

}
