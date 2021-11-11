<?php

include(dirname(__FILE__).'/../bootstrap/Propel.php');
 
$t = new lime_test(40, new lime_output_color());

$t->comment('---first test--- get an item (by peer/criteria) and see that ist is not null');
$firstitem = ItemPeer::doSelectOne(new Criteria());
$t->ok($firstitem);

$t->comment('-- try creating an item from a custom create function, and save it');
$item = create_item();
$t->ok($item);
////// Test Save ///////////
$item->save();
$t->is($item->getName(), 'Bazar Test', '-- just check that the name was ok');
$t->isnt($item->getCustomerType(), null, '-- check that the customer type is not null');
$t->isnt($item->getCategory(), null, '-- check that the category is not null');
$t->isnt($item->getStatus(), null, '-- check that the status is not null');
$t->isnt($item->getMode(), null, '-- check that the mode is not null');
$t->isnt($item->getLocation(), null, '-- check that the location is not null');
$t->isnt($item->getSubLocation(), null, '-- check that the sub location is not null');
$t->isnt($item->getEmail(), null, '-- check that the email is not null');
$t->isnt($item->getPhone(), null, '-- check that the phone is not null');
$t->isnt($item->getArea(), null, '-- check that the area is not null');
$t->isnt($item->getTitle(), null, '-- check that the titlr is not null');
$t->isnt($item->getBody(), null, '-- check that the body is not null');
$t->isnt($item->getPrice(), null, '-- check that the price is not null');
$t->isnt($item->getSite(), null, '-- check that the site is not null');
$t->isnt($item->getCreatedAt(), null, '-- check that created at is not null');
$t->is($item->getApprovedAt(), null, '-- check that approved at IS null (is set in admin/backend)');
$t->isnt($item->getPassword(), null, '-- check that password is not null');
$t->isnt($item->getMilage(), null, '-- check that milage is not null');
$t->isnt($item->getGearbox(), null, '-- check that gearbox is not null');
$t->isnt($item->getYearmodel(), null, '-- check that yearmodel is not null');
$t->isnt($item->getFuel(), null, '-- check that fuel is not null');
$t->isnt($item->getRoom(), null, '-- check that room is not null');
$t->isnt($item->getLength(), null, '-- check that length is not null');
$t->isnt($item->getStreet(), null, '-- check that street is not null');
$t->isnt($item->getRent(), null, '-- check that rent is not null');
$t->isnt($item->getPostalcode(), null, '-- check that postal code is not null');
$t->isnt($item->getSlug(), null, '-- check that slug is not null');
$currentItemId = $item->getId();
$t->comment('-- Item id is --' . $currentItemId);
$item = ItemPeer::retrieveByPk($currentItemId);
$t->isnt($item, null, '-- check that current item is not null');

// create a 2nd item, test that slug is working
$item2 = create_item();
$t->ok($item2);
////// Test Save ///////////
$item2->save();
$t->isnt($item2->getSlug(), null, '-- check that slug is not null for the new item');
$t->comment('-- Comparing the slug for the 2 different items, item1 slug=' .$item->getSlug().' item2 slug='.$item2->getSlug());

//create 3 images, and connect them to the current item id
$image1 = create_image(array('itemid' => $currentItemId));
$image2 = create_image(array('itemid' => $currentItemId));
$image3 = create_image(array('itemid' => $currentItemId));
// were the images created ok?
$t->ok($image1, 'first image ok');
$t->ok($image2, '2nd image ok');
$t->ok($image3, '3rd image ok');
// get the image ids to be used later
$imageId1 = $image1->getId();
$imageId2 = $image2->getId();
$imageId3 = $image3->getId();

// delete item
$item->delete();
// Make sure the item is really deleted
$myitem = ItemPeer::retrieveByPk($currentItemId);
$t->is($myitem, null, '-- check that the deleted item is null');
// make sure that the images are deleted as well
$t->is($myitem, null, '-- check that the deleted items images are null');
$myFirstImage = ImagePeer::retrieveByPk($imageId1);
$mySecondImage = ImagePeer::retrieveByPk($imageId2);
$myThirdImage = ImagePeer::retrieveByPk($imageId3);
$t->is($myFirstImage, null, '-- check that the deleted item first image is null');
$t->is($mySecondImage, null, '-- check that the deleted item 2nd image is null');
$t->is($myThirdImage, null, '-- check that the deleted item 3rd image is null');

function create_image($defaults = array())
{
  static $image_type = null;
 
  if (is_null($image_type))
  {
    $image_type = ImageTypePeer::doSelectOne(new Criteria());
  }
 
  $image = new Image();
  $image->fromArray(array_merge(array(
    'imagetype_id'  => $image_type,
    'path'      => '/02/myimage.png',
  ), $defaults), BasePeer::TYPE_FIELDNAME);
 
  return $image;
}

function create_item($defaults = array())
{
  static $category = null;
  static $status = null;
  static $mode = null;
  static $customertype = null;  
  static $location = null;
  static $sublocation = null;
  static $milage = null;
  static $gearbox = null;
  static $yearmodel = null;
  static $fuel = null;
  static $room = null;

  if (is_null($room))
  {
    $room = RoomPeer::doSelectOne(new Criteria());
  } 

  if (is_null($fuel))
  {
    $fuel = FuelPeer::doSelectOne(new Criteria());
  } 

  if (is_null($yearmodel))
  {
    $yearmodel = YearmodelPeer::doSelectOne(new Criteria());
  } 

  if (is_null($gearbox))
  {
    $gearbox = GearboxPeer::doSelectOne(new Criteria());
  }

  if (is_null($milage))
  {
    $milage = MilagePeer::doSelectOne(new Criteria());
  }

  if (is_null($customertype))
  {
    $customertype = CustomerTypePeer::doSelectOne(new Criteria());
  }

  if (is_null($category))
  {
    $category = CategoryPeer::doSelectOne(new Criteria());
  }

  if (is_null($status))
  {
    $status = StatusPeer::doSelectOne(new Criteria());
  }

  if (is_null($mode))
  {
    $mode = ModePeer::doSelectOne(new Criteria());
  }
  
  if (is_null($location))
  {
    $location = LocationPeer::doSelectOne(new Criteria());
  }

  if (is_null($sublocation))
  {
    $c = new Criteria();    
    $c->add(SubLocationPeer::LOCATION_ID, $location->getId());    
    $sublocation = SubLocationPeer::doSelectOne($c);
  }       

  $item = new Item();
  $item->fromArray(array_merge(array(
    'category_id'  => $category->getId(),
    'name'      => 'Bazar Test',
    'email'     => 'Senior@Tester.se',
    'location_id'     => $location->getId(),
    'sublocation_id'  => $sublocation->getId(),
    'phone'  => '23423442',
    'title' => 'Just a test item',
    'body' => 'Just a test body',
    'price' => '1231',
    'site' => 'http://www.thesite.com',
    'password' => 'secret',
    'area' => '234',
    'fuel_id'        => $fuel->getId(),
    'gearbox_id'        => $gearbox->getId(),
    'status_id'        => $status->getId(),
    'mode_id'        => $mode->getId(),
    'room_id'        => $room->getId(),
    'length'         => '23',
    'street'         => 'gatan 23',
    'postalcode'         => '3453455',
    'rent'         => '234234',
    'milage_id'        => $milage->getId(),
    'yearmodel_id'        => $yearmodel->getId(),
    'customertype_id' => $customertype->getId(),
  ), $defaults), BasePeer::TYPE_FIELDNAME);
 
  return $item;
}


?>