<?php

/**
 * Subclass for representing a row from the 'internetbazar_fuel' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Fuel extends BaseFuel
{  
  // special for I18n
  public function __toString()
  {
    return parent::getName();
  }
}
