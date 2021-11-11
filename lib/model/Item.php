<?php

/**
 * Class for representing a row from the 'internetbazar_item' table.
 *
 *
 * @package lib.model
 */ 
class Item extends BaseItem
{
  // Overriding the delete function
  public function delete(PropelPDO $con = null)
  {
    if ($this->isDeleted()) {
      throw new PropelException("This object has already been deleted.");
    }
    
    if ($con === null) {
      $con = Propel::getConnection(ItemPeer::DATABASE_NAME);
    }
    
    try {
      $con->beginTransaction();
      // Delete images ////////
      foreach ($this->getImages() as $image)
	{
	  $image->delete();
	}
      
      ItemPeer::doDelete($this, $con);
      $this->setDeleted(true);
      $con->commit();
    } catch (PropelException $e) {
      $con->rollBack();
      throw $e;
    }
  }


  // copies contents of one item object to another
  // category_id is not included
  public static function copySessionToItem($item, $tempItem) 
  {
    // Reset the item, using values from session
    $item->setName($tempItem->getName());
    $item->setEmail($tempItem->getEmail());
    $item->setPhone($tempItem->getPhone());
    $item->setMode($tempItem->getMode());
    $item->setSite($tempItem->getSite());
    $item->setTitle($tempItem->getTitle());
    $item->setPrice($tempItem->getPrice());
    $item->setBody($tempItem->getBody());
    $item->setLocation($tempItem->getLocation());
    $item->setSubLocation($tempItem->getSubLocation());
    $item->setCategory($tempItem->getCategory());
    $item->setSubCategory($tempItem->getSubCategory());
    $item->setLength($tempItem->getLength());
    $item->setRoom($tempItem->getRoom());
    $item->setArea($tempItem->getArea());
    $item->setRent($tempItem->getRent());
    $item->setStreet($tempItem->getStreet());
    $item->setPostalcode($tempItem->getPostalcode());
    $item->setMilage($tempItem->getMilage());
    $item->setGearbox($tempItem->getGearbox());
    $item->setYearmodel($tempItem->getYearmodel());
    $item->setFuel($tempItem->getFuel());
  }

  // creates a temporary item object, can be used to store in a session for instance
  public static function makeTempItem($form, $catId) 
  {
    $myitem = new Item();
    $myitem->setName($form['name']->getValue());
    $myitem->setEmail($form['email']->getValue());
    $myitem->setPhone($form['phone']->getValue());
    $myitem->setTitle($form['title']->getValue());
    $myitem->setPrice($form['price']->getValue());
    $myitem->setSite($form['site']->getValue());

    $myitem->setMode(ModePeer::retrieveByPk($form['mode_id']->getValue()));

    $myitem->setBody(FormHelper::cleanBodyValue($form['body']->getValue()));
    $myitem->setLocation(LocationPeer::retrieveByPk($form['location_id']->getValue()));
    $myitem->setSubLocation(SubLocationPeer::retrieveByPk($form['sublocation_id']->getValue()));
    $myitem->setCategory(CategoryPeer::retrieveByPk($catId));
    $myitem->setSubCategory(SubCategoryPeer::retrieveByPk($form['subcategory_id']->getValue()));
    $myitem->setLength($form['length']->getValue());
    $myitem->setRoom(RoomPeer::retrieveByPk($form['room_id']->getValue()));
    $myitem->setArea($form['area']->getValue());
    $myitem->setRent($form['rent']->getValue());
    $myitem->setStreet($form['street']->getValue());
    $myitem->setPostalcode($form['postalcode']->getValue());
    $myitem->setMilage(MilagePeer::retrieveByPk($form['milage_id']->getValue()));
    $myitem->setGearbox(GearboxPeer::retrieveByPk($form['gearbox_id']->getValue()));
    $myitem->setYearmodel(YearmodelPeer::retrieveByPk($form['yearmodel_id']->getValue()));
    $myitem->setFuel(FuelPeer::retrieveByPk($form['fuel_id']->getValue()));

    return $myitem;
  }
  
  // Override
  public function save(PropelPDO $con = null)
  {
    // The created at attribute should only be set once (first save)
    
    if (!$this->getCreatedAt())
      {		
	$this->setCreatedAt(time());	
      }
    // The updated at attribute should be updated every save
    $this->setUpdatedAt(time());

    return parent::save($con);
  }

  // Override
  public function setTitle($v)
  {

    // Also set slug here
    $this->setSlug($v);
    // And set the title 
    parent::setTitle($v);
  }

  /* 
   *   
   */
  public function setSlug($v)
  {
    # Check for previous identical slugs, add sequence 
    # in case of previous identical slug, slug must be unique
    $slugCandidate = SlugHelper::slugify($v);
    if(ItemPeer::slugExists($slugCandidate, $this->id))
      {
	$slugCandidate .= '-' . rand(10000, 99999);
      }

    // And set the title 
    parent::setSlug($slugCandidate);
  }
  

  public function getNumberOfImages()
  {
    return count($this->getImages());
  }

  public function getExtraImages()
  {

    $c = new Criteria();
    $c->add(ImagePeer::ITEMID, $this->id);
    $c->add(ImagePeer::IMAGETYPE_ID, Image::extra);    
    $images = ImagePeer::doSelect($c);
    return $images;

  }


  // Used by edit section, retrieves all extra images
  // regardless of temp or not
  public function getExtraImagesFull()
  {
    $c = new Criteria();
    $c->add(ImagePeer::ITEMID, $this->id);
    $arg_array = array(Image::extra, Image::temp_extra);
    $c->add(ImagePeer::IMAGETYPE_ID, $arg_array, Criteria::IN);
    $images = ImagePeer::doSelect($c);
    return $images;

  }

  public function hasExtraImagesFull()
  {
    if(count($this->getExtraImagesFull()) > 0)
      return true;
  }

  public function hasRegularImage()
  {
    if($this->getRegularImage() != null)
      return true;

    return false;
  }

  public function hasExtraImages()
  {
    if(count($this->getExtraImages()) > 0)
      return true;
  }

  public function hasTempImageRegular()
  {
    if($this->getTempImageRegular() != null)
      return true;

    return false;
  }

  public function hasTempImagesAdditional()
  {
    if(count($this->getTempImagesAdditional()) > 0)
      return true;
    return false;
  }

  public function getTempImageRegular()
  {
    foreach($this->getImages() as $image)
      {
	if($image->getImagetypeId() == Image::temp_regular)
	  {
	    return $image;
	    break;
	  }
      }
    return null;
  }

  public function getTempImagesAdditional()
  {
    $returnImage = array();
    foreach($this->getImages() as $image)
      {
	if($image->getImagetypeId() == Image::temp_extra)
	  {
	    array_push($returnImage, $image);	    
	  }
      }

    return $returnImage;

  }


  public function getRegularImage()
  {
    $returnImage = array();
    foreach($this->getImages() as $image)
      {
	if($image->getImagetypeId() == Image::regular)
	  {
	    array_push($returnImage, $image);
	    break;
	  }
      }

    return (count($returnImage) > 0) ? $returnImage[0] : null;

  }

  public static function processSearchParams ($request)
  {
    $showImages     = $request->getParameter('show_images');
    $locationId     = $request->getParameter('loc');
    $catId          = $request->getParameter('cat');
    $searchStr      = trim($request->getParameter('searchstr'));
    $subcat         = $request->getParameter('subcategory');
    $priceFrom      = $request->getParameter('pricefrom');
    $priceTo        = $request->getParameter('priceto');
    $yearmodelFrom  = $request->getParameter('yearmodel_from');
    $yearmodelTo    = $request->getParameter('yearmodel_to');

    $milageFrom     = $request->getParameter('milage_from');
    $milageTo       = $request->getParameter('milage_to');
    $gearboxId      = $request->getParameter('gearbox_id');
    $fuelId         = $request->getParameter('fuel_id');
    $roomFrom       = $request->getParameter('room_from');
    $roomTo         = $request->getParameter('room_to');
    $areaTo         = $request->getParameter('area_to');
    $areaFrom       = $request->getParameter('area_from');
    $sort           = $request->getParameter('sort');    
    $adtypeId       = $request->getParameter('adtype_id');
    $maxPerPage   = $request->getParameter('max_per_page');

    // Check params
    if($catId != null && !is_numeric($catId))
      {	
	return $params['input_error'] = 'catid problem';
      }
    if($locationId != null && !is_numeric($locationId))
      {	
	// Add exception for constant(s)
	if (!Category::isLocationConstant($locationId))
	  return $params['input_error'] = 'location problem';
      }
    if($subcat != null && !is_numeric($subcat)) 
      {	
	// Add exception for constant(s)
	if (!Category::isSubCategoryConstant($subcat))
	return $params['input_error'] = 'subcategory problem';
      }
    if($priceFrom != null && !is_numeric($priceFrom)) 
      {	
	// Add exception for constant(s)
	if (!Category::isPriceConstant($priceFrom))
	  return $params['input_error'] = 'price From problem';
      }
    if($priceTo != null && !is_numeric($priceTo)) 
      {		
	// Add exception for constant(s)
	if (!Category::isPriceConstant($priceTo))
	  return $params['input_error'] = 'price To problem';
      }
    if($gearboxId != null && !is_numeric($gearboxId)) 
      {		
	  return $params['input_error'] = 'gearbox problem';
      }

    if($fuelId != null && !is_numeric($fuelId)) 
      {		
	  return $params['input_error'] = 'fuel id problem';
      }

    if($yearmodelFrom != null && !is_numeric($yearmodelFrom)) 
      {	
	return $params['input_error'] = 'yearmodel from problem';
      }
    if($yearmodelTo != null && !is_numeric($yearmodelTo)) 
      {		
	return $params['input_error'] = 'yearmodel to problem';
      }
    if($milageFrom != null && !is_numeric($milageFrom)) 
      {		
	return $params['input_error'] = 'milage from problem';
      }
    if($milageTo != null && !is_numeric($milageTo)) 
      {		
	return $params['input_error'] = 'milage to problem';
      }
    if($roomFrom != null && !is_numeric($roomFrom)) 
      {			
	return $params['input_error'] = "room from problem";
      }
    if($roomTo != null && !is_numeric($roomTo)) 
      {		
	return $params['input_error'] = "room to problem";
      }
    if($areaTo != null && !is_numeric($areaTo)) 
      {	
	if($areaTo != Category::area_more_than)
	  return $params['input_error'] = 'area to problem';
      }
    if($areaFrom != null && !is_numeric($areaFrom)) 
      {		
	return $params['input_error'] = 'area from problem';
      }
    if($sort != null && !is_numeric($sort)) 
      {			
	return $params['input_error'] = 'sort problem';
      }
    if($adtypeId != null && !is_numeric($adtypeId))
      {	
	return $params['input_error'] = 'adtype id problem';
      }
    if($maxPerPage != null && !is_numeric($maxPerPage))
      {	
	return $params['max_per_page'] = 'max per page problem';
      }


    $params = array();    
    if($locationId != null)
      $params['locationId']     = $locationId;    
    if($catId != null)
      $params['catId']          = $catId;
    if($searchStr != null)
      $params['searchstr']      = $searchStr;
    if($subcat != null)
      $params['subcategory']    = $subcat;
    if($priceFrom != null)
      $params['price_from']     = $priceFrom;
    if($priceTo != null)
      $params['price_to']       = $priceTo;
    if($yearmodelFrom != null)
      $params['yearmodel_from'] = $yearmodelFrom;
    if($yearmodelTo != null)
      $params['yearmodel_to']   = $yearmodelTo;
    if($milageFrom != null)
      $params['milage_from']    = $milageFrom;
    if($milageTo != null)
      $params['milage_to']      = $milageTo;
    if($gearboxId != null)
      $params['gearbox_id']     = $gearboxId;
    if($fuelId != null)
      $params['fuel_id']        = $fuelId;
    if($roomFrom != null)
      $params['room_from']      = $roomFrom;
    if($roomTo != null)
      $params['room_to']        = $roomTo;
    if($areaTo != null)
      $params['area_to']        = $areaTo;
    if($areaFrom != null)
      $params['area_from']      = $areaFrom;        
    if($sort != null)
      $params['sort']           = $sort;
    if($adtypeId != null)
      $params['adtype_id']      = $adtypeId;
    if($maxPerPage != null)
      $params['max_per_page']   = $maxPerPage;
    if($showImages != null)
      $params['show_images']   = $showImages;
    // Add mode_id, what modes to search for
    $params = self::getModes($request, $params);

    return $params;
  }
  
  // Adds the DEFAULT mode params to the params array, this happens
  // normally the first time the user enters the index page
  static private function addDefaultModeParams($params, $mode_str)
  {
    $mode_array = explode(',', $mode_str);
    $count = 1;
    foreach($mode_array as $mode)
      {
	$params['mode_id_' . $count++] = $mode;
      }

    return $params;

  }

  /* 
   * function that build a colon separated string of modes
   * to be used later when building search criterias. I.e
   * to search for buy/sell/rent type of ads.
   * origin are the radio buttons on index page named "mode_id_1" etc
   * see table internetbazar_mode for availabe modes as well as constants in Mode class, 
   * typically mode_id_1 = selling, mode_id_2 = buying,
   * mode_id_3 = renting, mode_id_4 = want to rent
   * also see template "search_narrow.php" where the actual form in created
   */
  static private function getModes($request, $params)
  {
    $ret = "";
    $sell         = $request->getParameter('mode_id_1');
    $buy          = $request->getParameter('mode_id_2');
    $rent         = $request->getParameter('mode_id_3');
    $want_to_rent = $request->getParameter('mode_id_4');

    if($sell != "") 
      {
	$ret .= "$sell,";
	$params['mode_id_1'] = $sell;
      }
    if($buy != "")
      {
	$ret .= "$buy,";
	$params['mode_id_2'] = $buy;
      }
    if($rent != "")
      {
	$ret .= "$rent,";
	$params['mode_id_3'] = $rent;
      }
    if($want_to_rent != "")
      {
	$ret .= "$want_to_rent,";
	$params['mode_id_4'] = $want_to_rent;
      }

    $last = strrpos($ret, ",");

    # remove trailing delimiter if one exists
    if($ret != "" && $last == (strlen($ret) -1))
      {
	$ret = substr($ret, 0, $last);	
      }

    //if nothing was selected, use default values from the Mode class
    if($ret == "")
      {
	$ret = ModePeer::getDefaultModesString();
	# also add default params of the type "mode_id_x"
	$params = self::addDefaultModeParams($params, $ret);
      }
    
    $params['mode_id'] = $ret;
    return $params;

  }

  public function __toString()
  {
    return $this->title;
  }

}
