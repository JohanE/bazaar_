<?php

/**
 * SuperCategory form.
 *
 * @package    form
 * @subpackage internetbazar_supercategory
 * @version    SVN: $Id: sfPropelFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class SuperCategoryForm extends BaseSuperCategoryForm
{
  public function configure()
  {
    $this->embedI18n(array('ru', 'uk'));
    $this->widgetSchema->setLabel('ru', 'Russian');
    $this->widgetSchema->setLabel('uk', 'Ukrainian');
  }
}
