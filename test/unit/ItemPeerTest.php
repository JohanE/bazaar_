<?php

include(dirname(__FILE__).'/../bootstrap/Propel.php');

$t = new lime_test(46, new lime_output_color());

$t->comment('---first test--- get an item (by peer/criteria) and see that ist is not null');
$item = ItemPeer::doSelectOne(new Criteria());
$t->ok($item);

$t->comment('---first test--- get an item (by peer/criteria) and see that ist is not null');
$deletedStatusId = TestHelper::getStatusByName('deleted');
$t->comment('----' . $deletedStatusId->getId());

# test for getItemsToBecomeExpired
$approvedStatusId = TestHelper::getStatusByName('approved');
$submittedStatusId = TestHelper::getStatusByName('submitted');

#$criteria = ItemPeer::getItemsToBecomeExpired("2010-11-01", $approvedStatusId->getId());
#print_r($criteria->toString());

$items = ItemPeer::getItemsToBecomeExpired("2010-11-01", $approvedStatusId->getId());
$t->is(count($items), 40, '-- Check that getReminderItems retuns the expected result ');
$items = ItemPeer::getItemsToBecomeExpired("2010-08-01", $approvedStatusId->getId());
$t->is(count($items), 10, '-- Check that getReminderItems retuns the expected result ');


# test for deleted items
$items = ItemPeer::getOldItems($deletedStatusId->getId());
$t->is(count($items), 31, '-- Check that getOldItems(statusId) returns 10 hits for status=deleted ');

$items = ItemPeer::getDeletedItems($deletedStatusId->getId());
$t->is(count($items), 31, '-- Checking that number of deleted items is same as in test data');

# Test with limit
$items = ItemPeer::getDeletedItems($deletedStatusId->getId(), 20);
$t->is(count($items), 20, '-- Same as above but now with limit arg ');

# test to see that there are items with no status
$items = ItemPeer::getOldItems();
$t->is(count($items), 11, '-- Check that getOldItems() returns 11 hits for when no status is supplied ');


# try and delete items

ItemPeer::removeDeletedItems($deletedStatusId->getId());

# now they should all be gone
$items = ItemPeer::getDeletedItems($deletedStatusId->getId());
$t->is($items, null, '-- Check that all items were deleted ');

# test getOldItems
# call getOldItems with status argument, this one will return a different list
$items = ItemPeer::getOldItems($submittedStatusId->getId());
$t->is(count($items), 10, '-- Check that getOldItems(statusId) returns 10 hits for status=submitted ');

# try and delete old items without status
ItemPeer::removeOldItems();
# now check that they are really gone
$items = ItemPeer::getOldItems();
$t->is($items, null, '-- Check that old items without statuses were deleted');
# Check that statuses with statuses were not deleted
$items = ItemPeer::getOldItems($submittedStatusId->getId());
$t->isnt($items, null, '-- Check that old items with statuses were not deleted');
# now delete old items WITH statuses
ItemPeer::removeOldItems($submittedStatusId->getId());
# now check that they are really gone
$items = ItemPeer::getOldItems($submittedStatusId->getId());
$t->is($items, null, '-- Check that old items without statuses were deleted');

# test retrieve by slug
$item = ItemPeer::retrieveBySlug('powertool-100');
$t->isnt($item, null, '-- Check retireve by slug ');

# test slugexists
$slugExists = ItemPeer::slugExists('powertool-100');
$t->is($slugExists, true, '-- Test slugExists ');

# test get by slug
$t->comment(' get an item by retrieveBySlug, see that it isnt null');
$item = ItemPeer::retrieveBySlug('powertool-100');
$t->ok($item);

# test of slugExists
# this one should exist
$t->comment('test of slugExists, a real one');
$result = ItemPeer::slugExists('powertool-100');
$t->ok($result);
# this one should not exist
$t->comment('test of slugExists, fake one');
$result = ItemPeer::slugExists('powertool-100-foobar');
$t->is($result, false,' check that the fake slug does not exist');

# now try saving the item with slug "powertool-100"
# after save, the slug should be the same
$item->save();
$t->is($item->getSlug(), "powertool-100", '-- Test slug ');

# get another item, set its title to previous, however that slug should
# get the same slug value since that one is occupied
$nextItem = ItemPeer::retrieveBySlug('powertool-101');
$nextItem->setTitle("powertool-100"); #this also sets the slug
$nextItem->save();
$t->isnt($nextItem->getSlug(), "powertool-100", '--- test for slug');

###### test default params (its here since this particular param test may
###### require db-connection
// test some paramter values 3, no mode id(s) supplied
$sell_mode = TestHelper::getMode ('sell');
$buy_mode = TestHelper::getMode ('buy');
$rent_mode = TestHelper::getMode ('to_rent');
$whish_to_rent = TestHelper::getMode ('whish_to_rent');

$expected = array('locationId' => 'x10002', 'catId' => '1', 'mode_id' => "$sell_mode,$buy_mode,$rent_mode,$whish_to_rent", 'mode_id_1' => $sell_mode, 'mode_id_2' => $buy_mode, 'mode_id_3' => $rent_mode, 'mode_id_4' => $whish_to_rent);
$tt = array('loc' => 'x10002', 'cat' => '1');
$myReq = new MyRequest($tt);
$t->is(Item::processSearchParams($myReq), $expected, 'testing item::processSearchparams with default mode ids');



# make a default test variable for status
$defaultStatus = TestHelper::getDefaultStatus();
# make a test date to be used in the tests
$today="2010-01-01";
######### first seach ############
# Try to make a first full search, only location is set to full mode (the whole country)
$tt = array('loc' => 'x10001', 'cat' => '', );
$myReq = new MyRequest($tt);
$params = Item::processSearchParams($myReq);
$criteria = ItemPeer::getItemsBySearchParams($params, '2', $defaultStatus, $today);    
$t->comment('-- checking that criteria is ok --');
$t->ok($criteria);

$items = ItemPeer::doSelect($criteria);
$t->is(count($items), 182, 'testing search::full search from test db, nothing selected except location');

######### 2nd seach ############
# Try to narrow down the search somewhat using modes "sell" and "buy" only
# add some more test data

$tt1 = array('loc' => 'x10001', 'cat' => '', 'mode_id' => $sell_mode.','.$buy_mode, 
	    'mode_id_1' => $sell_mode, 'mode_id_2' => $buy_mode,	    
);
$myReq = new MyRequest($tt1);
$params = Item::processSearchParams($myReq);
$criteria = ItemPeer::getItemsBySearchParams($params, '2', $defaultStatus, $today);    
$items = ItemPeer::doSelect($criteria);
$t->is(count($items), 162, 'testing search::mode search: buy & sell only');
# Check some params as well
$t->is($params['locationId'], 'x10001', 'testing a search param: locationId');
$t->is($params['mode_id'], $sell_mode.','.$buy_mode, 'testing a search param: modeId');
$t->is($params['mode_id_1'], $sell_mode, 'testing a search param: mode_id_x (sell)');
$t->is($params['mode_id_2'], $buy_mode, 'testing a search param: mode_id_x (buy)');

######### CAR seach ############
# Search for cars, default modes, every oblast'
$car_category = TestHelper::getCategoryByName ('легковые автомобили');
$tt = array('loc' => 'x10001', 'cat' => $car_category, 
);
$myReq = new MyRequest($tt);
$params = Item::processSearchParams($myReq);
$criteria = ItemPeer::getItemsBySearchParams($params, '2', $defaultStatus, $today);    
$items = ItemPeer::doSelect($criteria);
$t->is(count($items), 40, 'testing  search: cars 1 (all cars)');

#### CAR / PRICE SEARCH #####################################################
$tt = array('loc' => 'x10001', 'cat' => $car_category, 'pricefrom' => '10000', 'priceto' => '20000', 
);
$myReq = new MyRequest($tt);
$params = Item::processSearchParams($myReq);
$criteria = ItemPeer::getItemsBySearchParams($params, '2', $defaultStatus, $today);    
$items = ItemPeer::doSelect($criteria);
$t->is(count($items), 20, 'testing  search: cars, price search 1: 10000 - 20 000');

#### CAR / PRICE SEARCH #####################################################
$tt = array('loc' => 'x10001', 'cat' => $car_category, 'priceto' => '30000', 
);
$myReq = new MyRequest($tt);
$params = Item::processSearchParams($myReq);
$criteria = ItemPeer::getItemsBySearchParams($params, '2', $defaultStatus, $today);    
$items = ItemPeer::doSelect($criteria);
$t->is(count($items), 20, 'testing  search: cars, price search 2: up to 30 000');

#### CAR / YEARMODEL SEARCH #####################################################
# narrow down car search, only show cars with yearmodel_from 1987
$yearmodel_1987 = TestHelper::getYearmodelIdByValue('1987');
$tt = array('loc' => 'x10001', 'cat' => $car_category, 'yearmodel_from' => $yearmodel_1987, 
);
$myReq = new MyRequest($tt);
$params = Item::processSearchParams($myReq);
$criteria = ItemPeer::getItemsBySearchParams($params, '2', $defaultStatus, $today);    
$items = ItemPeer::doSelect($criteria);
$t->is(count($items), 10, 'testing  search: cars, year model from 1987');

#### CAR / YEARMODEL SEARCH #####################################################
# narrow down car search, only show cars with yearmodel_to 1985
$yearmodel_1985 = TestHelper::getYearmodelIdByValue('1985');
$tt = array('loc' => 'x10001', 'cat' => $car_category, 'yearmodel_to' => $yearmodel_1985, 
);
$myReq = new MyRequest($tt);
$params = Item::processSearchParams($myReq);
$criteria = ItemPeer::getItemsBySearchParams($params, '2', $defaultStatus, $today);    
$items = ItemPeer::doSelect($criteria);
$t->is(count($items), 20, 'testing search: cars, year model to 1985');

#### CAR / YEARMODEL SEARCH #####################################################
# narrow down car search, only show cars with yearmodel from 1983 and to 1990 
$yearmodel_1983 = TestHelper::getYearmodelIdByValue('1983');
$yearmodel_1990 = TestHelper::getYearmodelIdByValue('1990');
$tt = array('loc' => 'x10001', 'cat' => $car_category, 'yearmodel_from' => $yearmodel_1983, 
	    'yearmodel_to' => $yearmodel_1990, 
);
$myReq = new MyRequest($tt);
$params = Item::processSearchParams($myReq);
$criteria = ItemPeer::getItemsBySearchParams($params, '2', $defaultStatus, $today);    
$items = ItemPeer::doSelect($criteria);
$t->is(count($items), 20, 'testing  search: cars, year model from 1983 to 1990');

#### CAR / MILAGE SEARCH #####################################################
# narrow down car search, only show cars with milage from 15 000

$tt = array('loc' => 'x10001', 'cat' => $car_category, 'milage_from' => '15000', 
);
$myReq = new MyRequest($tt);
$params = Item::processSearchParams($myReq);
$criteria = ItemPeer::getItemsBySearchParams($params, '2', $defaultStatus, $today);    
$items = ItemPeer::doSelect($criteria);
$t->is(count($items), 20, 'testing  search: cars, milage from 15000');


#### CAR / MILAGE SEARCH #####################################################
# narrow down car search, only show cars with milage up to 14999

$tt = array('loc' => 'x10001', 'cat' => $car_category, 'milage_to' => '14999', 
);
$myReq = new MyRequest($tt);
$params = Item::processSearchParams($myReq);
$criteria = ItemPeer::getItemsBySearchParams($params, '2', $defaultStatus, $today);    
#$t->comment("criteria: " .print_r($criteria->toString()));
$items = ItemPeer::doSelect($criteria);
$t->is(count($items), 20, 'testing  search: cars, milage to 14999');

#### CAR / MILAGE SEARCH #####################################################
# narrow down car search, only show cars with milage range

$tt = array('loc' => 'x10001', 'cat' => $car_category, 'milage_from' => '10000', 'milage_to' => '19999', 
);
$myReq = new MyRequest($tt);
$params = Item::processSearchParams($myReq);
$criteria = ItemPeer::getItemsBySearchParams($params, '2', $defaultStatus, $today);    
$items = ItemPeer::doSelect($criteria);
$t->is(count($items), 20, 'testing  search: cars milage range');

#### CAR / GEARBOX SEARCH #####################################################
# narrow down car search, only show cars with certain gearbox type
$gearbox = TestHelper::getGearboxByName ('механическое');
$tt = array('loc' => 'x10001', 'cat' => $car_category, 'gearbox_id' => $gearbox,
);
$myReq = new MyRequest($tt);
$params = Item::processSearchParams($myReq);
$criteria = ItemPeer::getItemsBySearchParams($params, '2', $defaultStatus, $today);    
$items = ItemPeer::doSelect($criteria);
$t->is(count($items), 20, 'testing  search: cars gearbox');

#### CAR / FUEL SEARCH #####################################################
# narrow down car search, only show cars with certain fuel type
$fuel = TestHelper::getFuelByName ('бензин');
$tt = array('loc' => 'x10001', 'cat' => $car_category, 'fuel_id' => $fuel,
);
$myReq = new MyRequest($tt);
$params = Item::processSearchParams($myReq);
$criteria = ItemPeer::getItemsBySearchParams($params, '2', $defaultStatus, $today);    
$items = ItemPeer::doSelect($criteria);
$t->is(count($items), 20, 'testing  search: cars fuel id');

#### ITEM SEARCH , SPECIFIC LOCATION #######################################
# narrow down search, only show items from the oblast' of Vinnitskaja
$location = TestHelper::getLocationByName ('Винницкая область');
$tt = array('loc' => $location, 'cat' => '',
);
$myReq = new MyRequest($tt);
$params = Item::processSearchParams($myReq);
$criteria = ItemPeer::getItemsBySearchParams($params, '2', $defaultStatus, $today);    
$items = ItemPeer::doSelect($criteria);
$t->is(count($items), 27,'testing  search: location = Vinnitskaja');

#### ITEM SEARCH, BY CUSTOMER TYPE  #######################################
$customer_type = TestHelper::getCustomertypeByName ('Объявлениe фирм');
$tt = array('loc' => $location, 'cat' => '', 'adtype_id' => $customer_type,
);
$myReq = new MyRequest($tt);
$params = Item::processSearchParams($myReq);
$criteria = ItemPeer::getItemsBySearchParams($params, '2', $defaultStatus, $today);    
$items = ItemPeer::doSelect($criteria);
$t->is(count($items), 10, 'testing  search: customer type = firma and place=Vinnitskaja');

#### ITEM SEARCH, BOATS AND SUBCATEGORY #######################################
$boat = TestHelper::getCategoryByName ('корабли, катера, яхты, лодки');
$subcat = TestHelper::getSubCategoryByName ('Яхты');
$tt = array('loc' => 'x10001', 'cat' => $boat, 'subcat' => $subcat, 
);
$myReq = new MyRequest($tt);
$params = Item::processSearchParams($myReq);
$criteria = ItemPeer::getItemsBySearchParams($params, '2', $defaultStatus, $today);    
$items = ItemPeer::doSelect($criteria);
$t->is(count($items), 5, 'testing  search: all boats with sub category = yacht');

#### ITEM SEARCH, APARTMENT  #######################################
$apartment = TestHelper::getCategoryByName ('квартиры');
$tt = array('loc' => 'x10001', 'cat' => $apartment, 
);
$myReq = new MyRequest($tt);
$params = Item::processSearchParams($myReq);
$criteria = ItemPeer::getItemsBySearchParams($params, '2', $defaultStatus, $today);    
$items = ItemPeer::doSelect($criteria);
$t->is(count($items), 2, 'testing  search: all apartments');

#### ITEM SEARCH, APARTMENT ROOM  #################################
$room_from = TestHelper::getRoomByName ('2');
$room_to = TestHelper::getRoomByName ('5');
$tt = array('loc' => 'x10001', 'cat' => $apartment, 'room_from' => $room_from,
	    'room_to' => $room_to,
);
$myReq = new MyRequest($tt);
$params = Item::processSearchParams($myReq);
$criteria = ItemPeer::getItemsBySearchParams($params, '2', $defaultStatus, $today);    
$items = ItemPeer::doSelect($criteria);
$t->is(count($items), 2, 'testing  search: apartments room from 2 to 5');

#### ITEM SEARCH, APARTMENT AREA  #################################
$area_from = '50';
$area_to = '125';

$tt = array('loc' => 'x10001', 'cat' => $apartment, 'area_from' => $area_from,
	    'area_to' => $area_to,
);
$myReq = new MyRequest($tt);
$params = Item::processSearchParams($myReq);
$criteria = ItemPeer::getItemsBySearchParams($params, '2', $defaultStatus, $today);    
$items = ItemPeer::doSelect($criteria);
$t->is(count($items), 2, 'testing  search: apartments area from 50 to 125');

## test of getInvalidItems
$todaysDate = "2010-01-01";
$items = ItemPeer::getInvalidItems($todaysDate, $approvedStatusId->getId());
$t->is(count($items), 12, '-- Test of getInvalidItems function ');

# test of removeInvalidItems
ItemPeer::removeInvalidItems($todaysDate, $approvedStatusId->getId());
# now number of invalid items should be 0, since they were deleted
$items = ItemPeer::getInvalidItems($todaysDate, $approvedStatusId->getId());
$t->is(count($items), 0, '-- Number of invalid items should now be 0 ');
?>