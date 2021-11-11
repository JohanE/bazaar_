<?php
  /*
   * This helper takes the incoming param array and loops through it 
   * to make a parameter string to be used when linking between pages (paging).
   * The if/elseif sections are for special cases where the param name and the 
   * form name don't match (for some reason or another, guess it would be better
   * if they all matched)
   */
function getUrl($params)
{	
  $retstr = "";
  $keys = array_keys($params);

  
  foreach ($keys as $key)
    {
      if($key == "catId")
	$retstr .= "&amp;cat=".$params[$key];
      elseif($key == "locationId")
	$retstr .= "&amp;loc=".$params[$key];
      elseif($key == "price_from")
	$retstr .= "&amp;pricefrom=".$params[$key];
      elseif($key == "price_to")
	$retstr .= "&amp;priceto=".$params[$key];
      else
	$retstr .= "&amp;".$key."=".urlencode($params[$key]);
    }
  
  return $retstr;
}
?>