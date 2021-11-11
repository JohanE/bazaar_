<?php

/**
 * CustomerTypeI18n form base class.
 *
 * @package    internetbazar
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCustomerTypeI18nForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'culture'            => new sfWidgetFormInputHidden(),
      'description'        => new sfWidgetFormInput(),
      'plural_description' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorPropelChoice(array('model' => 'CustomerType', 'column' => 'id', 'required' => false)),
      'culture'            => new sfValidatorPropelChoice(array('model' => 'CustomerTypeI18n', 'column' => 'culture', 'required' => false)),
      'description'        => new sfValidatorString(array('max_length' => 50)),
      'plural_description' => new sfValidatorString(array('max_length' => 50)),
    ));

    $this->widgetSchema->setNameFormat('customer_type_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CustomerTypeI18n';
  }


}
