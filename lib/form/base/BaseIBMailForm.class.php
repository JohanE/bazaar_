<?php

/**
 * IBMail form base class.
 *
 * @package    internetbazar
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseIBMailForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'email'         => new sfWidgetFormInput(),
      'created_at'    => new sfWidgetFormDateTime(),
      'sendstatus_id' => new sfWidgetFormPropelChoice(array('model' => 'Sendstatus', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorPropelChoice(array('model' => 'IBMail', 'column' => 'id', 'required' => false)),
      'email'         => new sfValidatorString(array('max_length' => 100)),
      'created_at'    => new sfValidatorDateTime(array('required' => false)),
      'sendstatus_id' => new sfValidatorPropelChoice(array('model' => 'Sendstatus', 'column' => 'id', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'IBMail', 'column' => array('email')))
    );

    $this->widgetSchema->setNameFormat('ib_mail[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'IBMail';
  }


}
