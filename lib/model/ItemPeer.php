<?php

/**
 * Subclass for performing query and update operations on the 'internetbazar_item' table.
 *
 * 
 *
 * @package lib.model
 */ 
class ItemPeer extends BaseItemPeer
{  
  static public function retrieveBySlug ($slug)
  {
    $criteria = new Criteria();
    $criteria->add(ItemPeer::SLUG, $slug);
    return self::doSelectOne($criteria);
  }

  static public function slugExists ($slug, $itemId)
  {
    $item = self::retrieveBySlug($slug);
    if($item && $item->getId() != $itemId)
      return true;

    return false;
  }

  static public function getItemsBySearchParams($params, $locationId, $defaultStatus, $todaysDate)
  {
    $criteria = new Criteria();
    
    if(isset($params['locationId']))
      {	
	if (!Category::isLocationConstant($params['locationId']))	
	  $criteria->add(ItemPeer::LOCATION_ID, $params['locationId']);    
	
	if($params['locationId'] == Category::adjacent_province_search)
	  {
	    $location = LocationPeer::retrieveByPk($locationId);	  
	    $criteria->add(ItemPeer::LOCATION_ID,$location->getConnectedtoArr(), Criteria::IN);	
	  }	
      }
    else
      $criteria->add(ItemPeer::LOCATION_ID, $locationId);

    if(isset($params['catId']))
      $criteria->add(ItemPeer::CATEGORY_ID, $params['catId']);
    if(isset($params['searchstr']))
      $criteria->add(ItemPeer::TITLE, '%'.$params['searchstr'].'%', Criteria::LIKE);
    if(isset($params['subcategory']) && !Category::isSubCategoryConstant($params['subcategory']))
      $criteria->add(ItemPeer::SUBCATEGORY_ID, $params['subcategory']);
    
    if(isset($params['price_to']) && !Category::isPriceConstant($params['price_to']))
      {	
	$criteria->add(ItemPeer::PRICE,$params['price_to'], Criteria::LESS_EQUAL);     
      }
    if(isset($params['price_from']) && !Category::isPriceConstant($params['price_from'])) {
      $criteria->addAnd(ItemPeer::PRICE, $params['price_from'], Criteria::GREATER_EQUAL);     
    } 

    if(isset($params['gearbox_id'])) {
      $criteria->add(ItemPeer::GEARBOX_ID, $params['gearbox_id']);     
    } 

    if(isset($params['fuel_id'])) {
      $criteria->add(ItemPeer::FUEL_ID, $params['fuel_id']);     
    } 
    // Car yearmodel
    if(isset($params['yearmodel_from']) || isset($params['yearmodel_to']) )
      {	
	$both = (isset($params['yearmodel_from']) && isset($params['yearmodel_to'])) ? true : false;
	$onlyFrom = (isset($params['yearmodel_from']) && !isset($params['yearmodel_to'])) ? true : false;
	$onlyTo = (!isset($params['yearmodel_from']) && isset($params['yearmodel_to'])) ? true : false;
	$criteria->addJoin(YearmodelPeer::ID, ItemPeer::YEARMODEL_ID);
		
	if($onlyFrom)
	  {
	    $yearmodel = YearmodelPeer::retrieveByPk($params['yearmodel_from']);
	    $criteria->add(YearModelPeer::VALUE, $yearmodel->getValue(), Criteria::GREATER_EQUAL);
	  }
	elseif ($onlyTo)
	  {
	    $yearmodel = YearmodelPeer::retrieveByPk($params['yearmodel_to']);
	    $criteria->add(YearModelPeer::VALUE, $yearmodel->getValue(), Criteria::LESS_EQUAL);
	  }
	elseif($both) //else, do range
	  {
	    $yearmodelTo   = YearmodelPeer::retrieveByPk($params['yearmodel_to']);
	    $yearmodelFrom = YearmodelPeer::retrieveByPk($params['yearmodel_from']);
	    $criteria->add(YearModelPeer::VALUE, $yearmodelFrom->getValue(), Criteria::GREATER_EQUAL);
	    $criteria->addAnd(YearModelPeer::VALUE, $yearmodelTo->getValue(), Criteria::LESS_EQUAL);
	  }
	
      }

    // Car milage
    if(isset($params['milage_from']) || isset($params['milage_to']))
      {
	$both = (isset($params['milage_from']) && isset($params['milage_to'])) ? true : false;
	$onlyFrom = (isset($params['milage_from']) && !isset($params['milage_to'])) ? true : false;
	$onlyTo = (!isset($params['milage_from']) && isset($params['milage_to'])) ? true : false;
	$criteria->addJoin(MilagePeer::ID, ItemPeer::MILAGE_ID);
		
	if($onlyFrom)
	  {	    
	    $criteria->add(MilagePeer::VALUE, $params['milage_from'], Criteria::GREATER_EQUAL);
	  }
	elseif ($onlyTo)
	  {	   
	    $criteria->add(MilagePeer::VALUE,$params['milage_to'], Criteria::LESS_EQUAL);
	  }
	elseif($both) //else, do range
	  {
	    $criteria->add(MilagePeer::VALUE, $params['milage_from'], Criteria::GREATER_EQUAL);
	    $criteria->addAnd(MilagePeer::VALUE,$params['milage_to'], Criteria::LESS_EQUAL);
	  }
	
      }

// Apartment rooms
    if(isset($params['room_from']) || isset($params['room_to']))
      {

	$both = (isset($params['room_from']) && isset($params['room_to'])) ? true : false;
	$onlyFrom = (isset($params['room_from']) && !isset($params['room_to'])) ? true : false;
	$onlyTo = (!isset($params['room_from']) && isset($params['room_to'])) ? true : false;
	$criteria->addJoin(RoomPeer::ID, ItemPeer::ROOM_ID);
		
	if($onlyFrom)
	  {	   
	    $room = RoomPeer::retrieveByPk($params['room_from']);
	    $criteria->add(RoomPeer::VALUE, $room->getValue(), Criteria::GREATER_EQUAL);	
	  }
	elseif ($onlyTo)
	  {	   
	    $room = RoomPeer::retrieveByPk($params['room_to']);
	    $criteria->add(RoomPeer::VALUE, $room->getValue(), Criteria::LESS_EQUAL);
	  }
	elseif($both) //else, do range
	  {
	    $room_to   = RoomPeer::retrieveByPk($params['room_to']);
	    $room_from = RoomPeer::retrieveByPk($params['room_from']);
	    $criteria->add(RoomPeer::VALUE, $room_from->getValue(), Criteria::GREATER_EQUAL);
	    $criteria->addAnd(RoomPeer::VALUE,$room_to->getValue(), Criteria::LESS_EQUAL);
	  }
	
      }

    // Apartment area
    if(isset($params['area_from']) || isset($params['area_to']))
      {
	// Special case if "more than" is selected
	if(isset($params['area_to']))
	  {
	    if($params['area_to'] == Category::area_more_than)
	      $params['area_to'] = null;
	  }
	$both = (isset($params['area_from']) && isset($params['area_to'])) ? true : false;
	$onlyFrom = (isset($params['area_from']) && !isset($params['area_to'])) ? true : false;
	$onlyTo = (!isset($params['area_from']) && isset($params['area_to'])) ? true : false;
			
	if($onlyFrom)
	  {	   
	    $criteria->add(ItemPeer::AREA, $params['area_from'], Criteria::GREATER_EQUAL);
	  }
	elseif ($onlyTo)
	  {	   
	    $criteria->add(ItemPeer::AREA, $params['area_to'], Criteria::LESS_EQUAL);
	  }
	elseif($both) //else, do range
	  {
	    $criteria->add(ItemPeer::AREA, $params['area_from'], Criteria::GREATER_EQUAL);
	    $criteria->addAnd(ItemPeer::AREA,$params['area_to'], Criteria::LESS_EQUAL);
	  }	
      }
    
    // Only show approved ads
    $criteria->add(ItemPeer::STATUS_ID, $defaultStatus);

    // Apply mode parameters, display ads for buying, selling, etc...
    if($params['mode_id'])
      {
	$arg_array = explode(',', $params['mode_id']);
	$criteria->add(ItemPeer::MODE_ID, $arg_array, Criteria::IN);
      }

    // Narrow down by customer type, if selected
    if(isset($params['adtype_id']))
      $criteria->add(ItemPeer::CUSTOMERTYPE_ID, $params['adtype_id']);

    // Dont show ads that are too old
    $criteria->add(ItemPeer::VALID_UNTIL, $todaysDate, Criteria::GREATER_EQUAL);

    // Order by stuff goes here
    if(isset($params['sort'])) {
      $criteria->add(ItemPeer::PRICE, 0, Criteria::GREATER_THAN);
      $criteria->addAscendingOrderByColumn(ItemPeer::PRICE); 
      sfContext::getInstance()->getLogger()->info("----------  Sort by price -----------------");
    }
    else
      $criteria->addDescendingOrderByColumn(ItemPeer::CREATED_AT); 

    #return self::doSelect($criteria);
    return $criteria;
  }

 public static function getAreaFrom()
  {
    $thelist = self::getAreaTo();
    array_pop($thelist);
    return $thelist;					
  }

  public static function getAreaTo()
  {
    $more = sfContext::getInstance()->getI18N()->__(PriceHandler::moreThan);
    $thelist = array();
    array_push($thelist, new InfoCarrier('25', '25'));					          
    array_push($thelist, new InfoCarrier('35', '35'));					          
    array_push($thelist, new InfoCarrier('50', '50'));	       
    array_push($thelist, new InfoCarrier('60', '60'));					          
    array_push($thelist, new InfoCarrier('70', '70'));					          
    array_push($thelist, new InfoCarrier('80','80'));					          
    array_push($thelist, new InfoCarrier('90','90'));					          
    array_push($thelist, new InfoCarrier('100','100'));					          
    array_push($thelist, new InfoCarrier('125','125'));	       
    array_push($thelist, new InfoCarrier('150', '150'));
    array_push($thelist, new InfoCarrier('175', '175'));
    array_push($thelist, new InfoCarrier('200', '200'));
    array_push($thelist, new InfoCarrier($more . ' 200', Category::area_more_than));
    return $thelist;					
  }

  // Gets all "invalid" items, i.e items that are too old when comparing
  // todays date and the valid_until date
  // A status should also be supplied, for example "approved" status
  public static function getInvalidItems($todaysDate, $status_id, $max = 500) 
  { 
    $criteria = new Criteria();
    $criteria->add(ItemPeer::VALID_UNTIL, $todaysDate, Criteria::LESS_THAN);
    $criteria->add(ItemPeer::STATUS_ID, $status_id);
    $criteria->setLimit($max);
    $items = ItemPeer::doSelect($criteria);
    return $items;
  }

  // Removes all "invalid" items 
  public static function removeInvalidItems($todaysDate, $status_id, $max = null)
  {
    $items = self::getInvalidItems($todaysDate, $status_id, $max);
    foreach($items as $item)
      {
	# Try and mail the ad creator about the removal, the remove it
	  try 
	{
	  MailHelper::sendMail(MailHelper::getMailFrom(), $item->getEmail(),
			       MailHelper::getRemoveSubject(), 
			       MailHelper::makeRemovalBody(DateHelper::getFormattedDateSimple($item->getValidUntil()), $item->getTitle()),
			       MailHelper::getMailUserX(), MailHelper::getMailPasswordX());	    
	} catch(EmailTransferException $e)
	    {
	      echo "mail error: " . $e->getMessage();
	    } 
	$item->delete();
      }
  }

  # Check for old items (according to the 'valid_until' field). 
  # Check against a date (typically todays date), and the same date plus 2 weeks
  # to see if the item is about to expire. This is then used to remind items who are to become expired.
  # only get those who havent already been reminded
  public static function getItemsToBecomeExpired($theDate, $status_id, $max = 2000) 
  { 
    $prolongedDate = new DateTime($theDate);
    # create another date 2 weeks in the future compared to the initial date
    $prolongedDate->modify("+14 day");
    $prolongedDateString = $prolongedDate->format("Y-m-d"); 
    $criteria = new Criteria();
    $criteria->add(ItemPeer::VALID_UNTIL, $theDate, Criteria::GREATER_THAN);
    $criteria->addAnd(ItemPeer::VALID_UNTIL, $prolongedDateString, Criteria::LESS_THAN);
    $criteria->addAnd(ItemPeer::STATUS_ID, $status_id);
    $criteria->addAnd(ItemPeer::NR_OF_EXPIRATION_REMINDERS, null, Criteria::ISNULL);

    $criteria->setLimit($max);    
    $items = ItemPeer::doSelect($criteria);
    return $items;
  } 


  // Gets all "old" items, i.e unfinished items that should be deleted
  public static function getOldItems($status_id = null, $max = 400) 
  { 
    # create a date that is about 4 months old
    $olderdate = date('Y-m-d', mktime(0, 0, 0, date("m") , date("d") - 114, date("Y")));
    $c = new Criteria();
    # get items older than "olderdate" (ca 4 months)
    $c->add(ItemPeer::CREATED_AT, $olderdate, Criteria::LESS_EQUAL);
    $c->add(ItemPeer::STATUS_ID, $status_id);
    $c->setLimit($max);
    $items = ItemPeer::doSelect($c);
    return $items;
  }

  // Removes all "old" items 
  public static function removeOldItems($status_id = null)
  {
    $items = self::getOldItems($status_id);
    foreach($items as $item)
      {
	$item->delete();
      }
  } 

  // Gets all items with status = deleted
  public static function getDeletedItems($status_id = null, $max = 400) 
  {
    # This line is only to make it more testable
    # since status ids may differ depending on test environment
    $current_status = ($status_id == null) ? Status::deleted : $status_id;
    $c = new Criteria();
    $c->add(ItemPeer::STATUS_ID, $current_status);
    $c->setLimit($max);
    $items = ItemPeer::doSelect($c);
    return $items;
  }

  // Removes all items with status = deleted  
  public static function removeDeletedItems($status_id = null)
  {
    $items = self::getDeletedItems($status_id);
    foreach($items as $item)
      {
        # Try and mail the ad creator about the removal, the remove it
	try 
	  {
	    MailHelper::sendMail(MailHelper::getMailFrom(), $item->getEmail(),
				 MailHelper::getRemoveSubject(), 
				 MailHelper::makeRemovalBody(DateHelper::getFormattedDateSimple($item->getValidUntil()), $item->getTitle()),
				 MailHelper::getMailUser(), MailHelper::getMailPassword());
	  } catch(EmailTransferException $e)
	      {
		echo "mail error: " . $e->getMessage();
	      } 
        # remove the ad
	$item->delete();
      }
  }

  # used by task to slugify all items in a batch type job 
  public static function slugifyItems($max = 400) 
  {
    $c = new Criteria();
    $c->setLimit($max);
    $items = ItemPeer::doSelect($c);
    foreach($items as $item)
      {
	$item->setSlug(SlugHelper::slugify($item->getTitle()));
	$item->save();
      }
  } 
}
