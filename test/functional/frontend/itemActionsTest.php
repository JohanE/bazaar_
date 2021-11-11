<?php

#include(dirname(__FILE__).'/../../bootstrap/Propel.php');
include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfBrowser());
$loader = new sfPropelData();
$loader->loadData(sfConfig::get('sf_root_dir').'/data/fixtures');

// test start page
$browser->
  get('/ru/')->
  isStatusCode(200)->
  checkResponseElement('body', '!/This is a temporary page/');

// test item index page
$browser->
  get('/ru/item/index')->
  isStatusCode(200)->
  isRequestParameter('module', 'item')->
  isRequestParameter('action', 'index')->  
  checkResponseElement('body', '!/This is a temporary page/');

// test smthng
$max = 8;
$browser->info('1 - The index page')->
  get('/ru/item/index/loc/77')->
  info('  1.2 - Only %s jobs are listed for a category')->
  with('response')->
checkElement('#infoSection', 'hej')
;