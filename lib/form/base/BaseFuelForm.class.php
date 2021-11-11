<?php

/**
 * Fuel form base class.
 *
 * @package    internetbazar
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseFuelForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id' => new sfValidatorPropelChoice(array('model' => 'Fuel', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('fuel[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Fuel';
  }

  public function getI18nModelName()
  {
    return 'FuelI18n';
  }

  public function getI18nFormClass()
  {
    return 'FuelI18nForm';
  }

}
