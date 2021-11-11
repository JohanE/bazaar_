<?php

/**
 * CustomerType form base class.
 *
 * @package    internetbazar
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCustomerTypeForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id' => new sfValidatorPropelChoice(array('model' => 'CustomerType', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('customer_type[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CustomerType';
  }

  public function getI18nModelName()
  {
    return 'CustomerTypeI18n';
  }

  public function getI18nFormClass()
  {
    return 'CustomerTypeI18nForm';
  }

}
