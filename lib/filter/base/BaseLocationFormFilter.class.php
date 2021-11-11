<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Location filter form base class.
 *
 * @package    internetbazar
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseLocationFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'connected_to' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'connected_to' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('location_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Location';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'connected_to' => 'Text',
    );
  }
}
