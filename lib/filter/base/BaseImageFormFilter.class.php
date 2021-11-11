<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Image filter form base class.
 *
 * @package    internetbazar
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseImageFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'itemid'       => new sfWidgetFormPropelChoice(array('model' => 'Item', 'add_empty' => true)),
      'path'         => new sfWidgetFormFilterInput(),
      'imagetype_id' => new sfWidgetFormPropelChoice(array('model' => 'ImageType', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'itemid'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Item', 'column' => 'id')),
      'path'         => new sfValidatorPass(array('required' => false)),
      'imagetype_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'ImageType', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('image_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Image';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'itemid'       => 'ForeignKey',
      'path'         => 'Text',
      'imagetype_id' => 'ForeignKey',
    );
  }
}
