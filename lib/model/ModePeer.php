<?php

class ModePeer extends BaseModePeer
{
  // Gets all the mode ids from the system
  // Will be used as default values if nothing was selected
  static public function getDefaultModesString()
  {
    # Try to log, and return a mode string 
    # if it fails, that means it is a test and we have to get out data
    # from the test db instead
    try {
      sfContext::getInstance()->getLogger()->info(" ");
      return Mode::sell.','.Mode::buy.','.Mode::to_rent.','.Mode::whish_to_rent;
    } catch (Exception $ex) {

    }  

    $c = new Criteria();
    $modes = self::doSelect($c);
    
    $ret_str = "";
    foreach($modes as $mode)
      {
	$ret_str .= $mode->getId() . ',';
      }

    # remove trailing delimiter if one exists
    $last = strrpos($ret_str, ",");
    if($ret_str != "" && $last == (strlen($ret_str) -1))
      {
	$ret_str = substr($ret_str, 0, $last);	
      }

    return $ret_str;
  }
}
