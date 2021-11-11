<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * IBMail filter form base class.
 *
 * @package    internetbazar
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseIBMailFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'email'         => new sfWidgetFormFilterInput(),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'sendstatus_id' => new sfWidgetFormPropelChoice(array('model' => 'Sendstatus', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'email'         => new sfValidatorPass(array('required' => false)),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'sendstatus_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Sendstatus', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('ib_mail_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'IBMail';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'email'         => 'Text',
      'created_at'    => 'Date',
      'sendstatus_id' => 'ForeignKey',
    );
  }
}
