<?php

function getSubCategories($subCatId, $formCatId)
{				  
  $c = new Criteria();
  $c->add(SubCategoryPeer::CATEGORY_ID, $formCatId);
  $subcats = SubCategoryPeer::doSelect($c);
		
  
  $ret_str = "<select class='custom' name='item[subcategory_id]' id='item_subcategory_id'><option value=''>". __('Выбрать')."</option>";
 
  foreach ($subcats as $subcat)
    {
      if ($subCatId == $subcat->getId())
	$ret_str .= "<option selected value='" . $subcat->getId() . "'>" . $subcat->getName() . "</option>";
      else
	$ret_str .= "<option value='" . $subcat->getId() . "'>" . $subcat->getName() . "</option>";
    }		  	
  $ret_str .= "</select>";
  return $ret_str;
}

function getCategories($catId, $formCatId)
{
  // To display the selected value correct in case of input validation problems
  if($formCatId)
    $catId = $formCatId;
  
  $supercategories = SuperCategoryPeer::getSuperCategories();
  $ret_str = "<select class='custom' name='item[category_id]' id='item_category_id'><option value=''>" . __('Выбрать категорию') . "</option>";
  
  foreach ($supercategories as $supercategory)
    {      
      $ret_str .= "<option value='' class='optgroup'>" . $supercategory->getName() . "</option>";
      $categories = $supercategory->getCategories();
      foreach ($categories as $category)
	{
	  if ($catId == $category->getId())
	    $ret_str .= "<option selected value='" . $category->getId() . "'>" . $category->getName() . "</option>";
	  else
	    $ret_str .= "<option value='" . $category->getId() . "'>" . $category->getName() . "</option>";
	}
    }
  
  $ret_str .= "</select>";
  return $ret_str;
  
}


?>