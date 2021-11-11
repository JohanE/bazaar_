<?php

/**
 * Subclass for representing a row from the 'internetbazar_gearbox' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Gearbox extends BaseGearbox
{

  // special for I18n
  public function __toString()
  {
    return parent::getName();
  }
}
