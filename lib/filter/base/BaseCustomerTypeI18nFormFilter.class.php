<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * CustomerTypeI18n filter form base class.
 *
 * @package    internetbazar
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCustomerTypeI18nFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'description'        => new sfWidgetFormFilterInput(),
      'plural_description' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'description'        => new sfValidatorPass(array('required' => false)),
      'plural_description' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('customer_type_i18n_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CustomerTypeI18n';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'ForeignKey',
      'culture'            => 'Text',
      'description'        => 'Text',
      'plural_description' => 'Text',
    );
  }
}
