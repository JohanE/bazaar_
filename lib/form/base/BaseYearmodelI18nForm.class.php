<?php

/**
 * YearmodelI18n form base class.
 *
 * @package    internetbazar
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseYearmodelI18nForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'culture' => new sfWidgetFormInputHidden(),
      'name'    => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorPropelChoice(array('model' => 'Yearmodel', 'column' => 'id', 'required' => false)),
      'culture' => new sfValidatorPropelChoice(array('model' => 'YearmodelI18n', 'column' => 'culture', 'required' => false)),
      'name'    => new sfValidatorString(array('max_length' => 50)),
    ));

    $this->widgetSchema->setNameFormat('yearmodel_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'YearmodelI18n';
  }


}
