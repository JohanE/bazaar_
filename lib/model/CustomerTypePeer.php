<?php

class CustomerTypePeer extends BaseCustomerTypePeer
{
  public static function getCustomerTypes()
  {
    $culture = sfContext::getInstance()->getUser()->getCulture();

    $c = new Criteria();
    $c->addAscendingOrderByColumn(CustomerTypeI18nPeer::DESCRIPTION);    
    return self::doSelectWithI18n($c, $culture);
  }

  // function for forms
  static public function getCustomerTypesForForm()
  {
    $list   = self::getCustomerTypes();
    $keys   = array();
    $values = array();
    $ret_list = array();

    foreach($list as $type)
      {
	array_push($keys, $type->getId());
	array_push($values, $type->getDescription());
      }
    if(count($keys) > 0 && count($values) > 0)
      $ret_list = array_combine($keys, $values);
    
    return $ret_list;
  }
}
