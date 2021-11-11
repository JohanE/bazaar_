<?php

/**
 * Mode form base class.
 *
 * @package    internetbazar
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseModeForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id' => new sfValidatorPropelChoice(array('model' => 'Mode', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('mode[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Mode';
  }

  public function getI18nModelName()
  {
    return 'ModeI18n';
  }

  public function getI18nFormClass()
  {
    return 'ModeI18nForm';
  }

}
