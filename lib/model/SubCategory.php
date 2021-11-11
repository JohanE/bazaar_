<?php

/**
 * Subclass for representing a row from the 'internetbazar_subcategory' table.
 *
 * 
 *
 * @package lib.model
 */ 
class SubCategory extends BaseSubCategory
{
  
  // special for I18n
  public function __toString()
  {
    return parent::getName();
  }

  // Checks if supplied "name" is equal to a "different" subcategory,
  // i.e one defined in the function: getSpecialSubCategoriesArray
  public static function containsSpecialSubcategory($name)
  {
    $subcatArray = self::getSpecialSubCategoriesArray();
    foreach($subcatArray as $subcat)
      {
	if($subcat == trim($name))
	  {
	    return true;
	  }    
      }
    return false;
  }

  // return list of subcategories that are treated differently
  public static function getSpecialSubCategoriesArray()
  {
    return array("другое", "інше", "Другое", "Інше", "Другие", "другие", "Інші");
  }
 	
}
