<?php

/**
 * item module configuration.
 *
 * @package    internetbazar
 * @subpackage item
 * @author     Your name here
 * @version    SVN: $Id: configuration.php 12474 2008-10-31 10:41:27Z fabien $
 */
class itemGeneratorConfiguration extends BaseItemGeneratorConfiguration
{
  public function getFilterDefaults() {
    
    return array('status_id' => Status::submitted);
    
  }
  
}
