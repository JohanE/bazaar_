<?php

/**
 * Yearmodel form.
 *
 * @package    form
 * @subpackage internetbazar_yearmodel
 * @version    SVN: $Id: sfPropelFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class YearmodelForm extends BaseYearmodelForm
{
  public function configure()
  {
    $this->embedI18n(array('ru', 'uk'));
    $this->widgetSchema->setLabel('ru', 'Russian');
    $this->widgetSchema->setLabel('uk', 'Ukrainian');
  }
}
