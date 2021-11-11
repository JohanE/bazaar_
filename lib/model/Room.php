<?php

/**
 * Subclass for representing a row from the 'internetbazar_room' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Room extends BaseRoom
{
  // special for I18n
  public function __toString()
  {
    return parent::getName();
  }
}
