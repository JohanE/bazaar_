<?php

/**
 * Subclass for representing a row from the 'internetbazar_location' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Location extends BaseLocation
{
  // special for I18n
  public function __toString()
  {
    return parent::getName();
  }

  // Override
  public function getConnectedtoArr()
  {
    // Get connected location id's
    $var = $this->connected_to;
    // we need to ad the current, regular location id as well
    $var = (strlen($var) > 0) ? $var . ";".$this->id : $var;
    // the string is semicolon separated so we need to make it in to an array
    $ids = explode (";", $var);
    return $ids;
  }

  public static function getLocation($locationId)
  { 
    $location = LocationPeer::retrieveByPk($locationId);   
    if($location == null)
      {
	$tempLoc = new Location();
	$tempLoc->setId(0);
	$tempLoc->setName('no location found');
	return $tempLoc;
      }
    return $location;
  }

}
