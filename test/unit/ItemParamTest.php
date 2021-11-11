<?php
require_once dirname(__FILE__).'/../bootstrap/unit.php';

$t = new lime_test(32, new lime_output_color());

// test some mode values
$expected = array('locationId' => 'x10002', 'catId' => '1', 'mode_id' => '1,3', 'mode_id_1' => '1', 'mode_id_3' => '3');
$tt = array('loc' => 'x10002', 'cat' => '1', 'mode_id' => '1,3', 'mode_id_1' => '1', 'mode_id_3' => '3');
$myReq = new MyRequest($tt);
$t->is(Item::processSearchParams($myReq), $expected, 'testing item::processSearchparams modes 1');

// test some mode values 2
$expected = array('locationId' => 'x10002', 'catId' => '1', 'mode_id' => '12,32', 'mode_id_1' => '12', 'mode_id_3' => '32');
$tt = array('loc' => 'x10002', 'cat' => '1', 'mode_id' => '1,3', 'mode_id_1' => '12', 'mode_id_3' => '32');
$myReq = new MyRequest($tt);
$t->is(Item::processSearchParams($myReq), $expected, 'testing item::processSearchparams modes 2');

// test some mode values 3
$expected = array('locationId' => 'x10002', 'catId' => '1', 'mode_id' => '32', 'mode_id_1' => '32');
$tt = array('loc' => 'x10002', 'cat' => '1', 'mode_id' => '1', 'mode_id_1' => '32');
$myReq = new MyRequest($tt);
$t->is(Item::processSearchParams($myReq), $expected, 'testing item::processSearchparams modes 3');

// test some mode values 4
$expected = array('locationId' => 'x10002', 'catId' => '1', 'mode_id' => '33,45', 'mode_id_2' => '33', 'mode_id_3' => '45');
$tt = array('loc' => 'x10002', 'cat' => '1', 'mode_id' => '33,45', 'mode_id_2' => '33', 'mode_id_3' => '45');
$myReq = new MyRequest($tt);
$t->is(Item::processSearchParams($myReq), $expected, 'testing item::processSearchparams modes 4');

// test some mode values 5
$expected = array('locationId' => 'x10002', 'catId' => '1', 'mode_id' => '33,45,99', 'mode_id_2' => '33', 'mode_id_3' => '45','mode_id_4' => '99');
$tt = array('loc' => 'x10002', 'cat' => '1', 'mode_id' => '33,45,99', 'mode_id_2' => '33', 'mode_id_3' => '45','mode_id_4' => '99');

$myReq = new MyRequest($tt);
$t->is(Item::processSearchParams($myReq), $expected, 'testing item::processSearchparams modes 5');

// test some mode values 6
			      $expected = array('locationId' => 'x10002', 'catId' => '1', 'mode_id' => '77,33,45,99', 'mode_id_1' => '77', 'mode_id_2' => '33', 'mode_id_3' => '45','mode_id_4' => '99');
$tt = array('loc' => 'x10002', 'cat' => '1', 'mode_id' => '33,45,99', 'mode_id_1' => '77','mode_id_2' => '33', 'mode_id_3' => '45','mode_id_4' => '99');
$myReq = new MyRequest($tt);
$t->is(Item::processSearchParams($myReq), $expected, 'testing item::processSearchparams modes 6');


//test car params
$expected = array('locationId' => 'x10001', 'catId' => '1', 'mode_id' => '2,4', 'mode_id_2' => '2', 'mode_id_4' => '4',
	     'fuel_id' => '2', 'gearbox_id' => '1', 'milage_from' => '5000', 'milage_to' => '549999',
	     'price_from' => '5000', 'price_to' => 'x10004', 'yearmodel_from' => '1',
	     'yearmodel_to' => '30'
);

$tt = array('loc' => 'x10001', 'cat' => '1', 'mode_id' => '2,4', 'mode_id_2' => '2', 'mode_id_4' => '4',
	     'fuel_id' => '2', 'gearbox_id' => '1', 'milage_from' => '5000', 'milage_to' => '549999',
	     'pricefrom' => '5000', 'priceto' => 'x10004', 'yearmodel_from' => '1',
	     'yearmodel_to' => '30'
);
$myReq = new myRequest($tt);
$t->is(Item::processSearchParams($myReq), $expected, 'testing item::processSearchparams CAR');


//test boat params
$expected = array('locationId' => 'x10002', 'catId' => '11', 'mode_id' => '1,4', 'mode_id_1' => '1', 'mode_id_4' => '4',
	     'price_from' => '5000', 'price_to' => 'x10004', 'subcategory' => '44',
);

$tt = array('loc' => 'x10002', 'cat' => '11', 'mode_id' => '1,4', 'mode_id_1' => '1', 'mode_id_4' => '4',
	     'pricefrom' => '5000', 'priceto' => 'x10004', 'subcategory' => '44',
);
$myReq = new myRequest($tt);
$t->is(Item::processSearchParams($myReq), $expected, 'testing item::processSearchparams BOAT');

//test apartment params
$expected = array('locationId' => '15', 'catId' => '15', 'mode_id' => '1,4', 'mode_id_1' => '1', 'mode_id_4' => '4',
		  'price_from' => '5000', 'price_to' => 'x10004', 'room_from' => '1' , 'room_to' => '4',
		  'area_from' => '10', 'area_to' => '40',
);

$tt = array('loc' => '15', 'cat' => '15', 'mode_id' => '1,4', 'mode_id_1' => '1', 'mode_id_4' => '4',
		  'pricefrom' => '5000', 'priceto' => 'x10004', 'room_from' => '1' , 'room_to' => '4',
		  'area_from' => '10', 'area_to' => '40',
);
$myReq = new myRequest($tt);
$t->is(Item::processSearchParams($myReq), $expected, 'testing item::processSearchparams APARTMENT');


// Test faluty params and special params

// location id
$expected = 'location problem';
$tt = array('loc' => 'x15',);
$myReq = new myRequest($tt);
$t->is(Item::processSearchParams($myReq), $expected, 'testing item::processSearchparams bad location param');
// test special location param
$expected = array('locationId' =>  Category::whole_country_search, 'mode_id' => '1', 'mode_id_1' => '1');
$tt = array('loc' =>  Category::whole_country_search, 'mode_id' => '1', 'mode_id_1' => '1');
$myReq = new myRequest($tt);
$t->is(Item::processSearchParams($myReq), $expected, 'testing item::processSearchparams special location param 1');

// test special location param 2
$expected = array('locationId' =>  Category::adjacent_province_search, 'mode_id' => '1', 'mode_id_1' => '1');
$tt = array('loc' =>  Category::adjacent_province_search, 'mode_id' => '1', 'mode_id_1' => '1');
$myReq = new myRequest($tt);
$t->is(Item::processSearchParams($myReq), $expected, 'testing item::processSearchparams special location param 2');

// faulty category id
$expected = 'catid problem';
$tt = array('cat' => 'x15',);
$myReq = new myRequest($tt);
$t->is(Item::processSearchParams($myReq), $expected, 'testing item::processSearchparams faulty category id');


// faulty sub category id
$expected = 'subcategory problem';
$tt = array('subcategory' => 'x15',);
$myReq = new myRequest($tt);
$t->is(Item::processSearchParams($myReq), $expected, 'testing item::processSearchparams faulty subcat id');

// test special category param
$expected = array('subcategory' =>  Category::full_category_search, 'mode_id' => '1', 'mode_id_1' => '1');
$tt = array('subcategory' =>  Category::full_category_search, 'mode_id' => '1', 'mode_id_1' => '1');
$myReq = new myRequest($tt);
$t->is(Item::processSearchParams($myReq), $expected, 'testing item::processSearchparams special subcategory param');

// faulty price_from
$expected = 'price From problem';
$tt = array('pricefrom' => 'x15',);
$myReq = new myRequest($tt);
$t->is(Item::processSearchParams($myReq), $expected, 'testing item::processSearchparams faulty price from');
// faulty price_to
$expected = 'price To problem';
$tt = array('priceto' => 'x15',);
$myReq = new myRequest($tt);
$t->is(Item::processSearchParams($myReq), $expected, 'testing item::processSearchparams faulty price to');

// special price param
$expected = array('price_to' =>  Category::price_more_than, 'mode_id' => '1', 'mode_id_1' => '1');
$tt = array('priceto' =>  Category::price_more_than, 'mode_id' => '1', 'mode_id_1' => '1');
$myReq = new myRequest($tt);
$t->is(Item::processSearchParams($myReq), $expected, 'testing item::processSearchparams special price param');


// faulty year model from
$expected = 'yearmodel from problem';
$tt = array('yearmodel_from' => 'x15',);
$myReq = new myRequest($tt);
$t->is(Item::processSearchParams($myReq), $expected, 'testing item::processSearchparams year model from faulty');

$tt = array('yearmodel_from' => ' ',);
$myReq = new myRequest($tt);
$t->is(Item::processSearchParams($myReq), $expected, 'testing item::processSearchparams yearmodel from faulty 2');

//year model to
$expected = 'yearmodel to problem';
$tt = array('yearmodel_to' => 'x15',);
$myReq = new myRequest($tt);
$t->is(Item::processSearchParams($myReq), $expected, 'testing item::processSearchparams year model to faulty');

//gearbox
$expected = 'gearbox problem';
$tt = array('gearbox_id' => 'x15',);
$myReq = new myRequest($tt);
$t->is(Item::processSearchParams($myReq), $expected, 'testing item::processSearchparams gearbox faulty');

// fuel_id
$expected = 'fuel id problem';
$tt = array('fuel_id' => 'x15',);
$myReq = new myRequest($tt);
$t->is(Item::processSearchParams($myReq), $expected, 'testing item::processSearchparams fuel id faulty');

//milage
$expected = 'milage from problem';
$tt = array('milage_from' => 'x15',);
$myReq = new myRequest($tt);
$t->is(Item::processSearchParams($myReq), $expected, 'testing item::processSearchparams milagefrom id faulty');

$expected = 'milage to problem';
$tt = array('milage_to' => 'x15',);
$myReq = new myRequest($tt);
$t->is(Item::processSearchParams($myReq), $expected, 'testing item::processSearchparams milage to id faulty');

// room
$expected = 'room from problem';
$tt = array('room_from' => 'x15',);
$myReq = new myRequest($tt);
$t->is(Item::processSearchParams($myReq), $expected, 'testing item::processSearchparams room from faulty');

$expected = 'room to problem';
$tt = array('room_to' => 'x15',);
$myReq = new myRequest($tt);
$t->is(Item::processSearchParams($myReq), $expected, 'testing item::processSearchparams room to faulty');

//area
$expected = 'area to problem';
$tt = array('area_to' => 'x15',);
$myReq = new myRequest($tt);
$t->is(Item::processSearchParams($myReq), $expected, 'testing item::processSearchparams area to faulty');

$expected = 'area from problem';
$tt = array('area_from' => 'x15',);
$myReq = new myRequest($tt);
$t->is(Item::processSearchParams($myReq), $expected, 'testing item::processSearchparams area from faulty');

// special area param
$expected = array('area_to' =>  Category::area_more_than, 'mode_id' => '1', 'mode_id_1' => '1');
$tt = array('area_to' =>  Category::area_more_than, 'mode_id' => '1', 'mode_id_1' => '1');
$myReq = new myRequest($tt);
$t->is(Item::processSearchParams($myReq), $expected, 'testing item::processSearchparams special area param');

//sort
$expected = 'sort problem';
$tt = array('sort' => 'x15',);
$myReq = new myRequest($tt);
$t->is(Item::processSearchParams($myReq), $expected, 'testing item::processSearchparams sort faulty');

//adtype_id
$expected = 'adtype id problem';
$tt = array('adtype_id' => 'x15',);
$myReq = new myRequest($tt);
$t->is(Item::processSearchParams($myReq), $expected, 'testing item::processSearchparams adtype faulty');
?>
