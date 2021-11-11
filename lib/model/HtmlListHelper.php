<?php

class HtmlListHelper
{
  public static function Alternate($one, $two)
  {
    self::$alternateRow = !self::$alternateRow;
    return self::$alternateRow ? $one : $two;
  }

  public static function getCategoryName($item) 
  {
    $returnValue = CategoryPeer::retrieveByPk($item->getCategoryId())->getName();
    if($item->getSubcategoryId() != null)
      {
	$subcatname = SubCategoryPeer::retrieveByPk($item->getSubcategoryId())->getName();
	if(!SubCategory::containsSpecialSubcategory($subcatname))
	  $returnValue = $subcatname;	  
      }

    return $returnValue;
  }
 
  private static $alternateRow = true;
}

?>