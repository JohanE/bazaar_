<?php

/**
 * Gearbox form base class.
 *
 * @package    internetbazar
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseGearboxForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id' => new sfValidatorPropelChoice(array('model' => 'Gearbox', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('gearbox[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Gearbox';
  }

  public function getI18nModelName()
  {
    return 'GearboxI18n';
  }

  public function getI18nFormClass()
  {
    return 'GearboxI18nForm';
  }

}
