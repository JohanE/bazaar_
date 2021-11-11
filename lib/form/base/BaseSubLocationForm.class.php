<?php

/**
 * SubLocation form base class.
 *
 * @package    internetbazar
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseSubLocationForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'location_id' => new sfWidgetFormPropelChoice(array('model' => 'Location', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'SubLocation', 'column' => 'id', 'required' => false)),
      'location_id' => new sfValidatorPropelChoice(array('model' => 'Location', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('sub_location[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SubLocation';
  }

  public function getI18nModelName()
  {
    return 'SubLocationI18n';
  }

  public function getI18nFormClass()
  {
    return 'SubLocationI18nForm';
  }

}
