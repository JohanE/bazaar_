<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * SubLocation filter form base class.
 *
 * @package    internetbazar
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseSubLocationFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'location_id' => new sfWidgetFormPropelChoice(array('model' => 'Location', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'location_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Location', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('sub_location_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SubLocation';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'location_id' => 'ForeignKey',
    );
  }
}
