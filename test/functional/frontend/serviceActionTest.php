<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

// create a new test browser
$browser = new sfTestBrowser();

// test service index page
$browser->
  get('/ru/service/index')->
  isStatusCode(200)->
  isRequestParameter('module', 'service')->
  isRequestParameter('action', 'index')->
  checkResponseElement('body', '!/This is a temporary page/');