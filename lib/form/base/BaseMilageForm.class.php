<?php

/**
 * Milage form base class.
 *
 * @package    internetbazar
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseMilageForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'    => new sfWidgetFormInputHidden(),
      'value' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'    => new sfValidatorPropelChoice(array('model' => 'Milage', 'column' => 'id', 'required' => false)),
      'value' => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('milage[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Milage';
  }

  public function getI18nModelName()
  {
    return 'MilageI18n';
  }

  public function getI18nFormClass()
  {
    return 'MilageI18nForm';
  }

}
