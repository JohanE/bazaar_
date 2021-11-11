<?php

/**
 * Subclass for performing query and update operations on the 'internetbazar_subcategory' table.
 *
 * 
 *
 * @package lib.model
 */ 
class SubCategoryPeer extends BaseSubCategoryPeer
{
  static public function getSubCategoriesById($id)
  {
    $culture = sfContext::getInstance()->getUser()->getCulture();
    $c = new Criteria();
    $c->add(SubCategoryPeer::CATEGORY_ID, $id);    
    $c->addAscendingOrderByColumn(SubCategoryI18nPeer::NAME);    
    #return self::doSelectWithI18n($c, $culture);
    $list = self::doSelectWithI18n($c, $culture);
    $list = FormHelper::specialSort($list);
    return $list;
  }

  // function for forms
  static public function getSubCategoriesByIdForForm($id)
  {
    $list   = self::getSubCategoriesById ($id);
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
