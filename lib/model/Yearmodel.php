<?php

/**
 * Subclass for representing a row from the 'internetbazar_yearmodel' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Yearmodel extends BaseYearmodel
{
  // special for I18n
  public function __toString()
  {
    return parent::getName();
  }
}
