<?php

/**
 * Item form.
 *
 * @package    form
 * @subpackage internetbazar_item
 * @version    SVN: $Id: sfPropelFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class ItemFormLogin extends BaseItemForm
{
  public function configure()
  {
     $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'slug'             => new sfWidgetFormInputHidden(),
      'password_login' => new sfWidgetFormInputPassword(),      
    ));
	
    #$this->offsetUnset('slug');
    #$this->offsetUnset('id');
    $this->offsetUnset('name');
    $this->offsetUnset('email');
    $this->offsetUnset('phone');
    $this->offsetUnset('title');
    $this->offsetUnset('body');
    $this->offsetUnset('price');
    $this->offsetUnset('created_at');
    $this->offsetUnset('updated_at');
    $this->offsetUnset('location_id');
    $this->offsetUnset('category_id');
    $this->offsetUnset('subcategory_id');
    $this->offsetUnset('milage_id');
    $this->offsetUnset('gearbox_id');
    $this->offsetUnset('yearmodel_id');
    $this->offsetUnset('fuel_id');
    $this->offsetUnset('room_id');
    $this->offsetUnset('length');
    $this->offsetUnset('area');
    $this->offsetUnset('rent');
    $this->offsetUnset('postalcode');

        
    $this->setValidators(array(
      'slug'             => new sfValidatorPropelChoice(array('model' => 'Item', 'column' => 'slug', 'required' => true)),
      'id'             => new sfValidatorPropelChoice(array('model' => 'Item', 'column' => 'id', 'required' => false)),
      'password_login'       => new sfValidatorString(array('required' => true), array('required'   => ErrorMsgHelper::getRequired(),
      )),      
    ));

    $this->widgetSchema->setNameFormat('item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
	
    // add a post validator
    $this->validatorSchema->setPostValidator(
      new sfValidatorCallback(array('callback' => array($this, 'doAdditionalValidation')))
    );


   
  }
  
  public function doAdditionalValidation($validator, $values)
  {    	  	
    $errorArr = array();     
    $item = ItemPeer::retrieveBySlug($values['slug']);        

    if($values['password_login'] != $item->getPassword())
      {
	$error = new sfValidatorError($validator, ErrorMsgHelper::getWrongPassword()); 
	$errorArr["password_login"] = $error;
      }
    else
      {
	// first reset the session in case of previous login (needed?)
	sfContext::getInstance()->getUser()->setAttribute('editmode', null);
	sfContext::getInstance()->getUser()->setAttribute('myitem', null);
	sfContext::getInstance()->getUser()->setAttribute('editmode', $item->getId());
      }
 		
    if(sizeof($errorArr) > 0)
      throw new sfValidatorErrorSchema($validator, $errorArr);	
    // everything is correct, return the clean values
    return $values;
  }
  
}
