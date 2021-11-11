<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Item filter form base class.
 *
 * @package    internetbazar
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseItemFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                       => new sfWidgetFormFilterInput(),
      'email'                      => new sfWidgetFormFilterInput(),
      'phone'                      => new sfWidgetFormFilterInput(),
      'title'                      => new sfWidgetFormFilterInput(),
      'body'                       => new sfWidgetFormFilterInput(),
      'site'                       => new sfWidgetFormFilterInput(),
      'price'                      => new sfWidgetFormFilterInput(),
      'created_at'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'approved_at'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'valid_until'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'password'                   => new sfWidgetFormFilterInput(),
      'slug'                       => new sfWidgetFormFilterInput(),
      'status_id'                  => new sfWidgetFormPropelChoice(array('model' => 'Status', 'add_empty' => true)),
      'mode_id'                    => new sfWidgetFormPropelChoice(array('model' => 'Mode', 'add_empty' => true)),
      'customertype_id'            => new sfWidgetFormPropelChoice(array('model' => 'CustomerType', 'add_empty' => true)),
      'location_id'                => new sfWidgetFormPropelChoice(array('model' => 'Location', 'add_empty' => true)),
      'sublocation_id'             => new sfWidgetFormPropelChoice(array('model' => 'SubLocation', 'add_empty' => true)),
      'category_id'                => new sfWidgetFormPropelChoice(array('model' => 'Category', 'add_empty' => true)),
      'subcategory_id'             => new sfWidgetFormPropelChoice(array('model' => 'SubCategory', 'add_empty' => true)),
      'milage_id'                  => new sfWidgetFormPropelChoice(array('model' => 'Milage', 'add_empty' => true)),
      'gearbox_id'                 => new sfWidgetFormPropelChoice(array('model' => 'Gearbox', 'add_empty' => true)),
      'yearmodel_id'               => new sfWidgetFormPropelChoice(array('model' => 'Yearmodel', 'add_empty' => true)),
      'fuel_id'                    => new sfWidgetFormPropelChoice(array('model' => 'Fuel', 'add_empty' => true)),
      'room_id'                    => new sfWidgetFormPropelChoice(array('model' => 'Room', 'add_empty' => true)),
      'length'                     => new sfWidgetFormFilterInput(),
      'area'                       => new sfWidgetFormFilterInput(),
      'street'                     => new sfWidgetFormFilterInput(),
      'rent'                       => new sfWidgetFormFilterInput(),
      'postalcode'                 => new sfWidgetFormFilterInput(),
      'nr_of_expiration_reminders' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'                       => new sfValidatorPass(array('required' => false)),
      'email'                      => new sfValidatorPass(array('required' => false)),
      'phone'                      => new sfValidatorPass(array('required' => false)),
      'title'                      => new sfValidatorPass(array('required' => false)),
      'body'                       => new sfValidatorPass(array('required' => false)),
      'site'                       => new sfValidatorPass(array('required' => false)),
      'price'                      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'approved_at'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'valid_until'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'password'                   => new sfValidatorPass(array('required' => false)),
      'slug'                       => new sfValidatorPass(array('required' => false)),
      'status_id'                  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Status', 'column' => 'id')),
      'mode_id'                    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Mode', 'column' => 'id')),
      'customertype_id'            => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CustomerType', 'column' => 'id')),
      'location_id'                => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Location', 'column' => 'id')),
      'sublocation_id'             => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SubLocation', 'column' => 'id')),
      'category_id'                => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Category', 'column' => 'id')),
      'subcategory_id'             => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SubCategory', 'column' => 'id')),
      'milage_id'                  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Milage', 'column' => 'id')),
      'gearbox_id'                 => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Gearbox', 'column' => 'id')),
      'yearmodel_id'               => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Yearmodel', 'column' => 'id')),
      'fuel_id'                    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Fuel', 'column' => 'id')),
      'room_id'                    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Room', 'column' => 'id')),
      'length'                     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'area'                       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'street'                     => new sfValidatorPass(array('required' => false)),
      'rent'                       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'postalcode'                 => new sfValidatorPass(array('required' => false)),
      'nr_of_expiration_reminders' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Item';
  }

  public function getFields()
  {
    return array(
      'id'                         => 'Number',
      'name'                       => 'Text',
      'email'                      => 'Text',
      'phone'                      => 'Text',
      'title'                      => 'Text',
      'body'                       => 'Text',
      'site'                       => 'Text',
      'price'                      => 'Number',
      'created_at'                 => 'Date',
      'approved_at'                => 'Date',
      'valid_until'                => 'Date',
      'updated_at'                 => 'Date',
      'password'                   => 'Text',
      'slug'                       => 'Text',
      'status_id'                  => 'ForeignKey',
      'mode_id'                    => 'ForeignKey',
      'customertype_id'            => 'ForeignKey',
      'location_id'                => 'ForeignKey',
      'sublocation_id'             => 'ForeignKey',
      'category_id'                => 'ForeignKey',
      'subcategory_id'             => 'ForeignKey',
      'milage_id'                  => 'ForeignKey',
      'gearbox_id'                 => 'ForeignKey',
      'yearmodel_id'               => 'ForeignKey',
      'fuel_id'                    => 'ForeignKey',
      'room_id'                    => 'ForeignKey',
      'length'                     => 'Number',
      'area'                       => 'Number',
      'street'                     => 'Text',
      'rent'                       => 'Number',
      'postalcode'                 => 'Text',
      'nr_of_expiration_reminders' => 'Number',
    );
  }
}
