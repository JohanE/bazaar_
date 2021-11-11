<?php

/**
 * SuperCategory form base class.
 *
 * @package    internetbazar
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseSuperCategoryForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'sort_field' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'SuperCategory', 'column' => 'id', 'required' => false)),
      'sort_field' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('super_category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SuperCategory';
  }

  public function getI18nModelName()
  {
    return 'SuperCategoryI18n';
  }

  public function getI18nFormClass()
  {
    return 'SuperCategoryI18nForm';
  }

}
