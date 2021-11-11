<?php

class CustomerType extends BaseCustomerType
{
  const privat    = '1';
  const business  = '2';

  // special for I18n
  public function __toString()
  {
    return parent::getDescription();
  }
}
