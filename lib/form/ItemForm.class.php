<?php

/**
 * Item form.
 *
 * @package    form
 * @subpackage internetbazar_item
 * @version    SVN: $Id: sfPropelFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class ItemForm extends BaseItemForm
{  

  const default_site = 'http://';
  

  public function configure()
  {

    $choose = sfContext::getInstance()->getI18N()->__('Выбрать');    
  
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'name'           => new sfWidgetFormInput(),
      'email'          => new sfWidgetFormInput(),
      'phone'          => new sfWidgetFormInput(),
      'title'          => new sfWidgetFormInput(),
      'site'           => new sfWidgetFormInput(),
      'body'           => new sfWidgetFormTextarea(),            
      'price'          => new sfWidgetFormInput(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
      'valid_until'     => new sfWidgetFormDateTime(),
      'mode_id'        => new sfWidgetFormPropelSelect(array('model' => 'Mode')),
      'customertype_id'=> new sfWidgetFormPropelSelect(array('model' => 'CustomerType')),
      'location_id'    => new sfWidgetFormSelect(array('choices' => LocationPeer::getLocationsForForm())),
      'sublocation_id' => new sfWidgetFormPropelSelect(array('model' => 'SubLocation', 'add_empty' => $choose)),
      'category_id'    => new sfWidgetFormPropelSelect(array('model' => 'Category', 'add_empty' => '')),
      'subcategory_id' => new sfWidgetFormPropelSelect(array('model' => 'SubCategory', 'add_empty' => $choose)),
      'milage_id'      => new sfWidgetFormPropelSelect(array('model' => 'Milage', 'add_empty' => $choose)),
      'gearbox_id'     => new sfWidgetFormPropelSelect(array('model' => 'Gearbox', 'add_empty' => $choose)),
      'yearmodel_id'   => new sfWidgetFormPropelSelect(array('model' => 'Yearmodel', 'add_empty' => $choose)),
      'fuel_id'        => new sfWidgetFormPropelSelect(array('model' => 'Fuel', 'add_empty' => $choose)),
      'room_id'        => new sfWidgetFormSelect(array('choices' => RoomPeer::getRoomsForForm())),
      'length'         => new sfWidgetFormInput(),
      'area'           => new sfWidgetFormInput(),
      'rent'           => new sfWidgetFormInput(),
      'street'         => new sfWidgetFormInput(),
      'postalcode'     => new sfWidgetFormInput(),
      'file'           => new sfWidgetFormInputFile(),
      'file2'          => new sfWidgetFormInputFile(),

    ));
    
  $this->setValidators(array(
      'id'             => new sfValidatorPropelChoice(array('model' => 'Item', 'column' => 'id', 'required' => false)),
      'name'           => new sfValidatorAnd(array(
			  new sfValidatorString(array('max_length' => FormHelper::getNameMaxLength(),'min_length' => FormHelper::getNameMinLength()), array(
			 'required'   => ErrorMsgHelper::getRequired(),	
			 'max_length' => ErrorMsgHelper::getTooLong(),	
                         'min_length' => ErrorMsgHelper::getTooShort(),)),
		       new sfValidatorRegex(array('pattern' => '/^[\D\d]+$/'), array('invalid' => 'Invalid name')),
				  ),array('required' => true), array('required' => ErrorMsgHelper::getRequired())),
      'email'          => new sfValidatorEmail(array('required' => true), array(
			  'required'   => ErrorMsgHelper::getRequired(),
			  'invalid' => ErrorMsgHelper::getInvalidEmail(),
      )),            
      'phone'          => new sfValidatorString(array('required' => false, 'max_length' => '60'), array('max_length' => ErrorMsgHelper::getTooLong())),
      'site'          => new sfValidatorUrl(array('required' => false, 'max_length' => '60'), array('max_length' => ErrorMsgHelper::getTooLong(), 'invalid' => ErrorMsgHelper::getInvalidUrl())),
      'title'          => new sfValidatorString(array('required' => true, 'min_length' => 4, 'max_length' => '70'), array('required' => ErrorMsgHelper::getRequired(), 'min_length' => ErrorMsgHelper::getTooShort(), 'max_length' => ErrorMsgHelper::getTooLong(),)),      
      'body'           => new sfValidatorString(array('required' => true, 'min_length' => 8, 'max_length' => 2000), array('required' => ErrorMsgHelper::getRequired(), 'min_length' => ErrorMsgHelper::getTooShort(), 'max_length' => ErrorMsgHelper::getTooLong()) ),      
      'price'          => new sfValidatorInteger(array('required' => false), array('invalid' => ErrorMsgHelper::getNotInteger())),
      'created_at'     => new sfValidatorDateTime(array('required' => false)),
      'updated_at'     => new sfValidatorDateTime(array('required' => false)),
      'valid_until'     => new sfValidatorDateTime(array('required' => false)),
      'mode_id'        => new sfValidatorPropelChoice(array('model' => 'Mode', 'column' => 'id', 'required' => true), array('required' => ErrorMsgHelper::getRequired(),)),
      'customertype_id'=> new sfValidatorPropelChoice(array('model' => 'CustomerType', 'column' => 'id', 'required' => true), array('required' => ErrorMsgHelper::getRequired(),)),
      'location_id'    => new sfValidatorPropelChoice(array('model' => 'Location', 'column' => 'id', 'required' => true), array('required' => ErrorMsgHelper::getRequired(),)),
      'sublocation_id' => new sfValidatorPropelChoice(array('model' => 'SubLocation', 'column' => 'id', 'required' => true), array('required' => ErrorMsgHelper::getRequired(),)),
      'category_id'    => new sfValidatorPropelChoice(array('model' => 'Category', 'column' => 'id', 'required' => true), array('required' => ErrorMsgHelper::getRequired(),)),
      'subcategory_id' => new sfValidatorPropelChoice(array('model' => 'SubCategory', 'column' => 'id', 'required' => false)),
      'milage_id'      => new sfValidatorPropelChoice(array('model' => 'Milage', 'column' => 'id', 'required' => false)),
      'gearbox_id'     => new sfValidatorPropelChoice(array('model' => 'Gearbox', 'column' => 'id', 'required' => false)),
      'yearmodel_id'   => new sfValidatorPropelChoice(array('model' => 'Yearmodel', 'column' => 'id', 'required' => false)),
      'fuel_id'        => new sfValidatorPropelChoice(array('model' => 'Fuel', 'column' => 'id', 'required' => false)),
      'room_id'        => new sfValidatorPropelChoice(array('model' => 'Room', 'column' => 'id', 'required' => false)),
      'length'         => new sfValidatorInteger(array('required' => false)),
      'street'          => new sfValidatorString(array('required' => false, 'min_length' => 4)),
      'area'           => new sfValidatorInteger(array('required' => false)),
      'rent'           => new sfValidatorInteger(array('required' => false)),
      'postalcode'     => new sfValidatorInteger(array('required' => false)),
      'file'           => new sfValidatorFile(array('required' => false,
						    'max_size' => '4194304',
						    'mime_types' => array('image/jpeg','image/png','image/gif')),array('mime_types' => ErrorMsgHelper::getMime())),
      'file2'          => new sfValidatorFile(array('required' => false,
						    'max_size' => '4194304',
						    'mime_types' => array('image/jpeg','image/png','image/gif') )),
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

    // clean the 'site' in case it isn't used
    if($values['site'] == self::default_site)
      $values['site'] = null;

    
    $values = FormHelper::cleanValues ($values);

    $errorArr = FormHelper::additionalValidation($values, $validator, $values['category_id']); 
    
    if(sizeof($errorArr) > 0)
      throw new sfValidatorErrorSchema($validator, $errorArr);	
    // everything is correct, return the clean values
    return $values;
  }
  
}
