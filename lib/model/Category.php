<?php

/**
 * Subclass for representing a row from the 'internetbazar_category' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Category extends BaseCategory
{
  const whole_country_search     = 'x10001';
  const adjacent_province_search = 'x10002';
  const full_category_search     = 'x10003';
  const price_more_than          = 'x10004';
  const area_more_than           = 'x10005';

  // special for I18n
  public function __toString()
  {
    return parent::getName();
  }
  
  public static function hasSubCategory($catId)
  {
    $c = new Criteria();
    $c->add(SubCategoryPeer::CATEGORY_ID, $catId);
    $subcats = SubCategoryPeer::doSelect($c);

    if(sizeof($subcats) > 0)
      return true;				
    return false;
  }

  public static function isPriceConstant($price)
  {

    if (in_array($price, array(self::price_more_than)))
      return true;

    return false;
  }

  public static function isSubCategoryConstant($catId)
  {

    if (in_array($catId, array(self::full_category_search)))
      return true;

    return false;
  }

  public static function isLocationConstant($locationId)
  {

    if (in_array($locationId, array(self::whole_country_search, self::adjacent_province_search)))
      return true;

    return false;
  }
  
  public static function getCategoryName ($catId)
  {
    
    if($catId == sfConfig::get('app_car-cat-val')) //Is it a car?
      return "car-cat-val";
    if($catId == sfConfig::get('app_boat-cat-val')) //Is it a boat?
      return "boat-cat-val";
    if($catId == sfConfig::get('app_apartment-cat-val')) //Is it an apartment?
      return "apartment-cat-val";
    if($catId == sfConfig::get('app_motorcycle-cat-val')) //Is it a mc
      return "motorcycle-cat-val";
    if($catId == sfConfig::get('app_house-cat-val')) //Is it a house
      return "house-cat-val";

  }
  
}
