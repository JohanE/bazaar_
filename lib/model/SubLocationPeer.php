<?php

class SubLocationPeer extends BaseSubLocationPeer
{

  static public function getSubLocationsById($id)
  {
    $culture = sfContext::getInstance()->getUser()->getCulture();
    $c = new Criteria();    
    $c->add(SubLocationPeer::LOCATION_ID, $id);    
    $c->addAscendingOrderByColumn(SubLocationI18nPeer::NAME);    
    $list =  self::doSelectWithI18n($c, $culture);
    $list = FormHelper::specialSort($list);  
    return $list;
  }

  // function for forms
  static public function getSubLocationsByIdForForm($id)
  {
    $list   = self::getSubLocationsById ($id);
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
