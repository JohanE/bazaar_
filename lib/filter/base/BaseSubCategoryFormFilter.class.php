<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * SubCategory filter form base class.
 *
 * @package    internetbazar
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseSubCategoryFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'category_id' => new sfWidgetFormPropelChoice(array('model' => 'Category', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'category_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Category', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('sub_category_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SubCategory';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'category_id' => 'ForeignKey',
    );
  }
}
