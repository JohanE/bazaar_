<?php

/**
 * Category form base class.
 *
 * @package    internetbazar
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCategoryForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'supercategory_id' => new sfWidgetFormPropelChoice(array('model' => 'SuperCategory', 'add_empty' => true)),
      'price'            => new sfWidgetFormInput(),
      'sort_field'       => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorPropelChoice(array('model' => 'Category', 'column' => 'id', 'required' => false)),
      'supercategory_id' => new sfValidatorPropelChoice(array('model' => 'SuperCategory', 'column' => 'id', 'required' => false)),
      'price'            => new sfValidatorString(array('max_length' => 8)),
      'sort_field'       => new sfValidatorInteger(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Category', 'column' => array('id')))
    );

    $this->widgetSchema->setNameFormat('category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Category';
  }

  public function getI18nModelName()
  {
    return 'CategoryI18n';
  }

  public function getI18nFormClass()
  {
    return 'CategoryI18nForm';
  }

}
