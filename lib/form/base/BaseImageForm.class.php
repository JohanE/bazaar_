<?php

/**
 * Image form base class.
 *
 * @package    internetbazar
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseImageForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'itemid'       => new sfWidgetFormPropelChoice(array('model' => 'Item', 'add_empty' => false)),
      'path'         => new sfWidgetFormInput(),
      'imagetype_id' => new sfWidgetFormPropelChoice(array('model' => 'ImageType', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'Image', 'column' => 'id', 'required' => false)),
      'itemid'       => new sfValidatorPropelChoice(array('model' => 'Item', 'column' => 'id')),
      'path'         => new sfValidatorString(array('max_length' => 100)),
      'imagetype_id' => new sfValidatorPropelChoice(array('model' => 'ImageType', 'column' => 'id')),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorPropelUnique(array('model' => 'Image', 'column' => array('id'))),
        new sfValidatorPropelUnique(array('model' => 'Image', 'column' => array('itemid', 'path', 'imagetype_id'))),
      ))
    );

    $this->widgetSchema->setNameFormat('image[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Image';
  }


}
