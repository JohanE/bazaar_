<?php

function getSubLocations($subLocId, $formLocationId)
{				  
  $c = new Criteria();
  $c->add(SubLocationPeer::LOCATION_ID, $formLocationId);
  $sublocations = SubLocationPeer::doSelect($c);
		
  $ret_str = "<select name='item[sublocation_id]' class='custom' id='item_sublocation_id'>";

  foreach ($sublocations as $sublocation)
    {
      if ($subLocId == $sublocation->getId())
	$ret_str .= "<option selected value='" . $sublocation->getId() . "'>" . $sublocation->getName() . "</option>";
      else
	$ret_str .= "<option value='" . $sublocation->getId() . "'>" . $sublocation->getName() . "</option>";
    }		  	
  $ret_str .= "</select>";
  return $ret_str;
  
}
?>