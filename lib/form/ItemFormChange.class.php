<?php

/**
 * Item form.
 *
 * @package    form
 * @subpackage internetbazar_item
 * @version    SVN: $Id: sfPropelFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class ItemFormChange extends BaseItemForm
{
  public function configure()
  {
    $id = sfContext::getInstance()->getRequest()->getParameter('id');        
    $item = ItemPeer::retrieveByPk($id);        
    $cat = $item->getCategory();    
    $sub_cats = SubCategoryPeer::getSubCategoriesByIdForForm ($cat->getId()); 


    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'name'           => new sfWidgetFormInput(),
      'email'          => new sfWidgetFormInput(),
      'phone'          => new sfWidgetFormInput(),
      'site'           => new sfWidgetFormInput(),
      'title'          => new sfWidgetFormInput(),
      'body'           => new sfWidgetFormTextarea(),            
      'price'          => new sfWidgetFormInput(),
      'location_id'    => new sfWidgetFormPropelSelect(array('model' => 'Location')),      
      'location_id'    => new sfWidgetFormSelect(array('choices' => LocationPeer::getLocationsForForm())),      
      'sublocation_id' => new sfWidgetFormSelect(array('choices' => array())),      
      'subcategory_id' => new sfWidgetFormSelect(array('choices' => $sub_cats)),      
      'milage_id'      => new sfWidgetFormPropelSelect(array('model' => 'Milage')),
      'gearbox_id'     => new sfWidgetFormPropelSelect(array('model' => 'Gearbox')),
      'yearmodel_id'   => new sfWidgetFormPropelSelect(array('model' => 'Yearmodel')),
      'fuel_id'        => new sfWidgetFormPropelSelect(array('model' => 'Fuel')),      
      'room_id'        => new sfWidgetFormSelect(array('choices' => RoomPeer::getRoomsForForm())),
      'mode_id'        => new sfWidgetFormPropelSelect(array('model' => 'Mode')),
      'length'         => new sfWidgetFormInput(),
      'area'           => new sfWidgetFormInput(),
      'rent'           => new sfWidgetFormInput(),
      'street'          => new sfWidgetFormInput(),
      'postalcode'     => new sfWidgetFormInput(),
      'file'           => new sfWidgetFormInputFile(),
    ));

    $this->offsetUnset('category_id');
    $this->offsetUnset('created_at');
    $this->offsetUnset('updated_at');
    
  $this->setValidators(array(
      'id'             => new sfValidatorPropelChoice(array('model' => 'Item', 'column' => 'id', 'required' => false)),
      'name'           => new sfValidatorAnd(array(
			  new sfValidatorString(array('max_length' => FormHelper::getNameMaxLength(), 'min_length' => FormHelper::getNameMinLength()), array(
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
      'mode_id'        => new sfValidatorPropelChoice(array('model' => 'Mode', 'column' => 'id', 'required' => true), array('required' => ErrorMsgHelper::getRequired(),)),
      'title'          => new sfValidatorString(array('required' => true, 'min_length' => 4, 'max_length' => '70'), array('required' => ErrorMsgHelper::getRequired(), 'min_length' => ErrorMsgHelper::getTooShort(), 'max_length' => ErrorMsgHelper::getTooLong(),)),      
      'body'           => new sfValidatorString(array('required' => true, 'min_length' => 8, 'max_length' => 2000), array('required' => ErrorMsgHelper::getRequired(), 'min_length' => ErrorMsgHelper::getTooShort(), 'max_length' => ErrorMsgHelper::getTooLong()) ),      
      'price'          => new sfValidatorInteger(array('required' => false), array('invalid' => ErrorMsgHelper::getNotInteger())),

      'location_id'    => new sfValidatorPropelChoice(array('model' => 'Location', 'column' => 'id', 'required' => true), array('required' => ErrorMsgHelper::getRequired(),)),
      'sublocation_id' => new sfValidatorPropelChoice(array('model' => 'SubLocation', 'column' => 'id', 'required' => true), array('required' => ErrorMsgHelper::getRequired(),)),
      'updated_at'     => new sfValidatorDateTime(array('required' => false)),
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
    
    $item = ItemPeer::retrieveByPk($values['id']);        
    $itemCatId = $item->getCategory()->getId();

    $values = FormHelper::cleanValues ($values);

    $errorArr = FormHelper::additionalValidation($values, $validator, $itemCatId); 
        
    if(sizeof($errorArr) > 0)
      throw new sfValidatorErrorSchema($validator, $errorArr);	
    // everything is correct, return the clean values
    return $values;
  }
  
}
