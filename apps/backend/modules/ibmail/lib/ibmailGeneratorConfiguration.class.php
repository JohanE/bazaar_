<?php

/**
 * ibmail module configuration.
 *
 * @package    internetbazar
 * @subpackage ibmail
 * @author     Your name here
 * @version    SVN: $Id: configuration.php 12474 2008-10-31 10:41:27Z fabien $
 */
class ibmailGeneratorConfiguration extends BaseIbmailGeneratorConfiguration
{
  public function getFilterDefaults() {
    
    return array('sendstatus_id' => 2);
    
  }

}
