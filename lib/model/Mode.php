<?php

class Mode extends BaseMode
{
 const sell          = '1';
 const buy           = '2';
 const to_rent       = '3';
 const whish_to_rent = '4';

 // special for I18n
 
 public function __toString()
 {
   return parent::getDescription();
 }

  // A list of mode types to be used on the search page
  static function getModesArray($params)
  {
    $full_array = array('sell' => Mode::sell, 'buy' => Mode::buy, 'to_rent' => Mode::to_rent, 'whish_to_rent' => Mode::whish_to_rent);

    return $full_array;
  }


}
