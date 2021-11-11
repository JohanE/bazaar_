<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

// create a new test browser
$browser = new sfTestBrowser();

// test item index page
$browser->
  get('/ru/contact/index')->
  isStatusCode(200)->
  isRequestParameter('module', 'contact')->
  isRequestParameter('action', 'index')->
  checkResponseElement('body', '!/This is a temporary page/');