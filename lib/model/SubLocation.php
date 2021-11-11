<?php

class SubLocation extends BaseSubLocation
{

  // special for I18n
  public function __toString()
  {
    return parent::getName();
  }
  
}
