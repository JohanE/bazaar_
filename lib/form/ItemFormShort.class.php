<?php

/**
 * Item form.
 *
 * @package    form
 * @subpackage internetbazar_item
 * @version    SVN: $Id: sfPropelFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class ItemFormShort extends BaseItemForm
{
  public function configure()
  {

    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'password_again' => new sfWidgetFormInputPassword(),
      'password' => new sfWidgetFormInputPassword(),
    ));

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
      'id'             => new sfValidatorPropelChoice(array('model' => 'Item', 'column' => 'id', 'required' => false)),
      'password'       => new sfValidatorString(array('min_length' => 4, 'max_length' => '10', 'required' => true), array(
        'required'   => ErrorMsgHelper::getRequired(),
        'min_length' => ErrorMsgHelper::getTooShortPw(),
	'max_length' => ErrorMsgHelper::getTooLong(),
      )),
      'password_again'=> new sfValidatorString(array('min_length' => 4, 'max_length' => '10', 'required' => true), array(
        'required'   => ErrorMsgHelper::getRequired(),
        'min_length' => ErrorMsgHelper::getTooShortPw(),
	'max_length' => ErrorMsgHelper::getTooLong(),
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
    
    if($values['password'] != $values['password_again'])
      {
	$error = new sfValidatorError($validator, ErrorMsgHelper::getPasswordsMismatch()); 
	$errorArr["password"] = $error;
      }
 		
    if(sizeof($errorArr) > 0)
      throw new sfValidatorErrorSchema($validator, $errorArr);	
    // everything is correct, return the clean values
    return $values;
  }
  
}
