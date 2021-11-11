<?php

/**
 * Subclass for performing query and update operations on the 'internetbazar_location' table.
 *
 * 
 *
 * @package lib.model
 */ 
class LocationPeer extends BaseLocationPeer
{
  static public function getLocations()
  {
    $culture = sfContext::getInstance()->getUser()->getCulture();
    $c = new Criteria();    
    $c->addAscendingOrderByColumn(LocationI18nPeer::NAME);    
    $return_list = self::doSelectWithI18n($c, $culture);

    // Ad a default value
    #$sub_loc = new SubLocation();
    #$choose = sfContext::getInstance()->getI18N()->__('Выбрать');    
    #$sub_loc->setName($choose);
    #array_unshift($return_list, $sub_loc);
    return $return_list;
  }

  // function for forms
  static public function getLocationsForForm()
  {
    $list   = self::getLocations();
    $keys   = array();
    $values = array();
    $ret_list = array();

    foreach($list as $subloc)
      {
	array_push($keys, $subloc->getId());
	array_push($values, $subloc->getName());
      }
    if(count($keys) > 0 && count($values) > 0)
      $ret_list = array_combine($keys, $values);
    
    return $ret_list;
  }
}
