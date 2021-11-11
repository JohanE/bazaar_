<?php

/**
 * Item form base class.
 *
 * @package    internetbazar
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseItemForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                         => new sfWidgetFormInputHidden(),
      'name'                       => new sfWidgetFormInput(),
      'email'                      => new sfWidgetFormInput(),
      'phone'                      => new sfWidgetFormInput(),
      'title'                      => new sfWidgetFormInput(),
      'body'                       => new sfWidgetFormInput(),
      'site'                       => new sfWidgetFormInput(),
      'price'                      => new sfWidgetFormInput(),
      'created_at'                 => new sfWidgetFormDateTime(),
      'approved_at'                => new sfWidgetFormDateTime(),
      'valid_until'                => new sfWidgetFormDateTime(),
      'updated_at'                 => new sfWidgetFormDateTime(),
      'password'                   => new sfWidgetFormInput(),
      'slug'                       => new sfWidgetFormInput(),
      'status_id'                  => new sfWidgetFormPropelChoice(array('model' => 'Status', 'add_empty' => true)),
      'mode_id'                    => new sfWidgetFormPropelChoice(array('model' => 'Mode', 'add_empty' => true)),
      'customertype_id'            => new sfWidgetFormPropelChoice(array('model' => 'CustomerType', 'add_empty' => true)),
      'location_id'                => new sfWidgetFormPropelChoice(array('model' => 'Location', 'add_empty' => false)),
      'sublocation_id'             => new sfWidgetFormPropelChoice(array('model' => 'SubLocation', 'add_empty' => true)),
      'category_id'                => new sfWidgetFormPropelChoice(array('model' => 'Category', 'add_empty' => false)),
      'subcategory_id'             => new sfWidgetFormPropelChoice(array('model' => 'SubCategory', 'add_empty' => true)),
      'milage_id'                  => new sfWidgetFormPropelChoice(array('model' => 'Milage', 'add_empty' => true)),
      'gearbox_id'                 => new sfWidgetFormPropelChoice(array('model' => 'Gearbox', 'add_empty' => true)),
      'yearmodel_id'               => new sfWidgetFormPropelChoice(array('model' => 'Yearmodel', 'add_empty' => true)),
      'fuel_id'                    => new sfWidgetFormPropelChoice(array('model' => 'Fuel', 'add_empty' => true)),
      'room_id'                    => new sfWidgetFormPropelChoice(array('model' => 'Room', 'add_empty' => true)),
      'length'                     => new sfWidgetFormInput(),
      'area'                       => new sfWidgetFormInput(),
      'street'                     => new sfWidgetFormInput(),
      'rent'                       => new sfWidgetFormInput(),
      'postalcode'                 => new sfWidgetFormInput(),
      'nr_of_expiration_reminders' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                         => new sfValidatorPropelChoice(array('model' => 'Item', 'column' => 'id', 'required' => false)),
      'name'                       => new sfValidatorString(array('max_length' => 100)),
      'email'                      => new sfValidatorString(array('max_length' => 100)),
      'phone'                      => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'title'                      => new sfValidatorString(array('max_length' => 100)),
      'body'                       => new sfValidatorString(array('max_length' => 2000)),
      'site'                       => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'price'                      => new sfValidatorInteger(),
      'created_at'                 => new sfValidatorDateTime(array('required' => false)),
      'approved_at'                => new sfValidatorDateTime(array('required' => false)),
      'valid_until'                => new sfValidatorDateTime(array('required' => false)),
      'updated_at'                 => new sfValidatorDateTime(array('required' => false)),
      'password'                   => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'slug'                       => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'status_id'                  => new sfValidatorPropelChoice(array('model' => 'Status', 'column' => 'id', 'required' => false)),
      'mode_id'                    => new sfValidatorPropelChoice(array('model' => 'Mode', 'column' => 'id', 'required' => false)),
      'customertype_id'            => new sfValidatorPropelChoice(array('model' => 'CustomerType', 'column' => 'id', 'required' => false)),
      'location_id'                => new sfValidatorPropelChoice(array('model' => 'Location', 'column' => 'id')),
      'sublocation_id'             => new sfValidatorPropelChoice(array('model' => 'SubLocation', 'column' => 'id', 'required' => false)),
      'category_id'                => new sfValidatorPropelChoice(array('model' => 'Category', 'column' => 'id')),
      'subcategory_id'             => new sfValidatorPropelChoice(array('model' => 'SubCategory', 'column' => 'id', 'required' => false)),
      'milage_id'                  => new sfValidatorPropelChoice(array('model' => 'Milage', 'column' => 'id', 'required' => false)),
      'gearbox_id'                 => new sfValidatorPropelChoice(array('model' => 'Gearbox', 'column' => 'id', 'required' => false)),
      'yearmodel_id'               => new sfValidatorPropelChoice(array('model' => 'Yearmodel', 'column' => 'id', 'required' => false)),
      'fuel_id'                    => new sfValidatorPropelChoice(array('model' => 'Fuel', 'column' => 'id', 'required' => false)),
      'room_id'                    => new sfValidatorPropelChoice(array('model' => 'Room', 'column' => 'id', 'required' => false)),
      'length'                     => new sfValidatorInteger(array('required' => false)),
      'area'                       => new sfValidatorInteger(array('required' => false)),
      'street'                     => new sfValidatorString(array('max_length' => 90, 'required' => false)),
      'rent'                       => new sfValidatorInteger(array('required' => false)),
      'postalcode'                 => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'nr_of_expiration_reminders' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Item', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Item';
  }


}
