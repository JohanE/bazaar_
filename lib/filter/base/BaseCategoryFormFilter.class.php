<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Category filter form base class.
 *
 * @package    internetbazar
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCategoryFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'supercategory_id' => new sfWidgetFormPropelChoice(array('model' => 'SuperCategory', 'add_empty' => true)),
      'price'            => new sfWidgetFormFilterInput(),
      'sort_field'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'supercategory_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SuperCategory', 'column' => 'id')),
      'price'            => new sfValidatorPass(array('required' => false)),
      'sort_field'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('category_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Category';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'supercategory_id' => 'ForeignKey',
      'price'            => 'Text',
      'sort_field'       => 'Number',
    );
  }
}
