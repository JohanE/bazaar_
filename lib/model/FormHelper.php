<?php
  
/**
 * Helper for form validation and cleaning
 *
 * 
 * @author: Johan Edlund
 * @package lib.model
 */ 
class FormHelper
{

  // This function is for resorting search results of sublocation, subcategory etc
  // Can be used for every list containing classes with a getName and a getId function
  // This makes sure "drugoe" and "inshe" (etc) are last in list if they exist
  static public function specialSort($list)
  {
    $keys   = array();
    $values = array();
    $ret_list = array();
    $common_index = -1;
    $ret_list = array();

    foreach($list as $subloc)
      {
	if(in_array(ltrim($subloc->getName()), SubCategory::getSpecialSubCategoriesArray()))
	  $common_index = $subloc->getId();
	array_push($keys, $subloc->getId());
	array_push($values, $subloc);
      }
    if(count($keys) > 0 && count($values) > 0)
      $ret_list = array_combine($keys, $values);

    // If one of the special key words were found
    // move it to the end of a new list and return this list
    if($common_index != -1)
      {
	$temp = $ret_list[$common_index]; 
	unset($ret_list[$common_index]);
	array_push($ret_list, $temp);
	return array_values($ret_list);
      }
    // return normal list means nothing needed to be done
    return $list;
  }

  // used mainly to remove html tags
  public static function cleanValues($values)
  {
    $values['body'] = self::cleanBodyValue ($values['body']);    
    return $values;
  }

  // strip html code from "body" field
  public static function cleanBodyValue($value)
  {
    $value = strip_tags($value);
    $value = ltrim($value);    
    return $value;
  }
  
  // Minimum length of the name field
  public static function getNameMinLength()
  {
    return "3";
  }

  // Max length of the name field
  public static function getNameMaxLength()
  {
    return "52";
  }

  /* 
   Examines whether a string contains mails or not 
   This is based on the regexp found in the symfony class: 
   */
  public static function containsMail($str)
  {
    // The text part can't contain email(s)
    if(preg_match("/\w*([^@\s]+)@((?:[-a-z0-9]+\.)+[a-z]{2,})\w*/i", $str))
      {
	return true;
      }    
    return false;
  }



  /* 
   Examines whether a string contains url(s) or not 
   This is based on the regexp found in the symfony class: 
    '~^(https?|ftps?):// ( ([a-z0-9-]+\.)+[a-z]{2,6} | \d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}) (/?|/\S+) $~ix'
   */
  public static function containsUrl($str)
  {
    // The text part can't contain email(s)
    if(preg_match("/\w*((https?|ftps?):\/\/)?([a-z0-9-]+\.)+[a-z]{2,6}(\/?|\/\S+)\w*/i", $str))
      {
	return true;
      }    
    return false;
  }

  // Checks for occurances of forbidden words
  public static function containsForbidden($str)
  {

    $myforbidden_str = sfConfig::get('app_forbidden_str');  
    if(preg_match("/\w*($myforbidden_str)\w*/ui", $str))
      {
	return true;
      }    
    return false;
  }

 // The phone part can't contain anything but numbers and: ( ) + - , ; and white space
 private static function invalidPhone($str)
  {
    if(preg_match("/[^0-9\-\+\(\)\,\;\,\s]/", trim($str)))
      {
	return true;
      }    
    return false;
  }



  public static function additionalValidation($values, $validator, $itemCatId)
  {

    $errorArr = array(); 

    // The phone part can't contain anything but numbers and: ( ) + - , ;
    if(self::invalidPhone($values['phone']))
      {
	$error = new sfValidatorError($validator, ErrorMsgHelper::getPhoneError()); 
	$errorArr["phone"] = $error;    
      }    

    // The phone part can't contain email(s) or links
    if(self::containsMail($values['phone']))
      {
	$error = new sfValidatorError($validator, ErrorMsgHelper::getNameError()); 
	$errorArr["phone"] = $error;    
      }    
    if(self::containsUrl($values['phone']))
      {
	$error = new sfValidatorError($validator, ErrorMsgHelper::getNameError()); 
	$errorArr["phone"] = $error;    
      }    

    
    // The name/firma part can't contain email(s) or links
    if(self::containsMail($values['name']))
      {
	$error = new sfValidatorError($validator, ErrorMsgHelper::getNameError()); 
	$errorArr["name"] = $error;    
      }    
    if(self::containsUrl($values['name']))
      {
	$error = new sfValidatorError($validator, ErrorMsgHelper::getNameError()); 
	$errorArr["name"] = $error;    
      }    

    // The text/body part can't contain url(s)
    if(self::containsUrl($values['body']))
      {
	$error = new sfValidatorError($validator, ErrorMsgHelper::getBodyError()); 
	$errorArr["body"] = $error;    
      }    

    if(self::containsUrl($values['title']))
      {
	$error = new sfValidatorError($validator, ErrorMsgHelper::getBodyError()); 
	$errorArr["title"] = $error;    
      }    

    // The title part can't forbidden words
    if(self::containsForbidden($values['title']))
      {
	$error = new sfValidatorError($validator, ErrorMsgHelper::getForbiddenwordsError()); 
	$errorArr["title"] = $error;    
      }    

    // The title part can't contain email(s)
    if(self::containsMail($values['title']))
      {
	$error = new sfValidatorError($validator, ErrorMsgHelper::getBodyError()); 
	$errorArr["title"] = $error;    
      }    

    // The text part can't contain email(s)
    if(self::containsMail($values['body']))
      {
	$error = new sfValidatorError($validator, ErrorMsgHelper::getBodyError()); 
	$errorArr["body"] = $error;    
      }    
    
    if($itemCatId == sfConfig::get('app_boat-cat-val')) //is it a boat?
      {	  	
	if(!$values['length']) 
	  {		 		 		  
	    $error = new sfValidatorError($validator, ErrorMsgHelper::getRequired()); 
	    $errorArr["length"] = $error;
	  }				  		  
      } 
    else if($itemCatId == sfConfig::get('app_car-cat-val')) //is it a car?
      {
	
	if(!$values['milage_id']) 
	  {		 		  
	    $error = new sfValidatorError($validator, ErrorMsgHelper::getRequired());  
	    $errorArr["milage_id"] = $error;					
	  }
	if(!$values['gearbox_id']) 
	  {		 		  
	    $error = new sfValidatorError($validator, ErrorMsgHelper::getRequired());     	
	    $errorArr["gearbox_id"] = $error;	
	  }	
	if(!$values['fuel_id']) 
	  {		 		  
	    $error = new sfValidatorError($validator, ErrorMsgHelper::getRequired());    
	    $errorArr["fuel_id"] = $error;	
	  }
	if(!$values['yearmodel_id']) 
	  {		 		  
	      $error = new sfValidatorError($validator, ErrorMsgHelper::getRequired());    
	      $errorArr["yearmodel_id"] = $error;	
	  }
	
      }
    else if($itemCatId == sfConfig::get('app_motorcycle-cat-val')) //is it a mc ?
      {
	if(!$values['yearmodel_id']) 
	  {		 		  
	    $error = new sfValidatorError($validator, ErrorMsgHelper::getRequired());    
	    $errorArr["yearmodel_id"] = $error;	
	  }
      }
    else if($itemCatId == sfConfig::get('app_apartment-cat-val') || 
	    $itemCatId == sfConfig::get('app_house-cat-val')) //is it an apartment or house
      {
	
	if(!$values['room_id']) 
	  {		 		  
	    $error = new sfValidatorError($validator, ErrorMsgHelper::getRequired());  
	    $errorArr["room_id"] = $error;					
	  }
	
      }
    
    // special check for subcategories 
    if($itemCatId && !$values['subcategory_id']) 
      {		
	if(Category::hasSubCategory($itemCatId))
	  {
	    $error = new sfValidatorError($validator, ErrorMsgHelper::getRequired()); 
	    $errorArr["subcategory_id"] = $error;
	  }
      }



    return $errorArr;
    
  }

}

?>
