<?php

/**
 * Subclass for 
performing query and update operations on the 'internetbazar_room' table.
 *
 * 
 *
 * @package lib.model
 */ 
class RoomPeer extends BaseRoomPeer
{
  public static function getRoomsTo()
  {
    $culture = sfContext::getInstance()->getUser()->getCulture();

    $c = new Criteria();
    $c->addAscendingOrderByColumn(RoomI18nPeer::NAME);    
    return self::doSelectWithI18n($c, $culture);
  }

  public static function getRoomsFrom()
  {
    $objects = self::getRoomsTo();
    if(count($objects) > 1)
      {
	array_pop($objects);
      }    
    return $objects;
  }

  // Functions used for forms
  static public function getRooms()
  {
    $culture = sfContext::getInstance()->getUser()->getCulture();
    $c = new Criteria();    
    $c->addAscendingOrderByColumn(RoomI18nPeer::NAME);    
    $return_list = self::doSelectWithI18n($c, $culture);
    return $return_list;
  }

  // function for forms
  static public function getRoomsForForm()
  {
    $choose = sfContext::getInstance()->getI18N()->__('Выбрать');
    $list   = self::getRooms();
    $keys   = array();
    $values = array();
    $ret_list = array();
    //add the default option ("pick")
    array_push($values, $choose);
    array_push($keys, "");
    
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
