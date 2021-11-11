<?php

/**
 * Yearmodel form base class.
 *
 * @package    internetbazar
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseYearmodelForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'    => new sfWidgetFormInputHidden(),
      'value' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'    => new sfValidatorPropelChoice(array('model' => 'Yearmodel', 'column' => 'id', 'required' => false)),
      'value' => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('yearmodel[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Yearmodel';
  }

  public function getI18nModelName()
  {
    return 'YearmodelI18n';
  }

  public function getI18nFormClass()
  {
    return 'YearmodelI18nForm';
  }

}
