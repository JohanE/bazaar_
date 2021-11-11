<?php

/**
 * Subclass for representing a row from the 'internetbazar_status' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Status extends BaseStatus
{  
  const submitted = '2';
  const approved  = '4';
  const rejected  = '5';
  const deleted   = '6';

  public function __toString()
  {
    return (string) $this->description;
  }
}
