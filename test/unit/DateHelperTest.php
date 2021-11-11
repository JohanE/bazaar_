<?php

include(dirname(__FILE__).'/../bootstrap/Propel.php');

$t = new lime_test(10, new lime_output_color());

$expected = "02-февраля-2010";
$thedate = "2010-02-02";
$t->is(DateHelper::getFormattedDate($thedate), $expected, 'testing DateHelper::getFormattedDate()');

$expected = "15-апреля-2010";
$thedate = "2010-04-15";
$t->is(DateHelper::getFormattedDate($thedate), $expected, 'testing DateHelper::getFormattedDate()');

$expected = "22-октября-2011";
$thedate = "2011-10-22";
$t->is(DateHelper::getFormattedDate($thedate), $expected, 'testing DateHelper::getFormattedDate()');

$expected = "01-января-2010";
$thedate = "2010-01-01";
$t->is(DateHelper::getFormattedDate($thedate), $expected, 'testing DateHelper::getFormattedDate()');

$expected = "23-декабря-2010";
$thedate = "2010-12-23";
$t->is(DateHelper::getFormattedDate($thedate), $expected, 'testing DateHelper::getFormattedDate()');

$expected = "02-02-2010";
$thedate = "2010-02-02";
$t->is(DateHelper::getFormattedDateSimple($thedate), $expected, 'testing DateHelper::getFormattedDateSimple()');

$todaysDate = date("Y-m-d");
$endDate = DateHelper::getEndDate();
$t->ok($endDate > $todaysDate, 'check that end date is greater than todays date');

$today = DateHelper::getTodaysDate();
$pattern = '/[0-9]{4}-[0-9]{2}-[0-9]{2}';
$result = preg_match($pattern . "/i", $today);
$t->ok($result,  'testing DateHelper::getTodaysDate() , check that a valid date was returned');

$thedate = "2010-02-02";
$resultDate = DateHelper::createValidUntilByDate($thedate);
$t->ok($resultDate > new DateTime("now"), 'testing DateHelper::createValidUntilByDate()');

$dateArg1 = new DateTime('2010-04-02');
$dateArg2 = new DateTime('2010-06-09');
$result = DateHelper::getDateDiffInMonths($dateArg1, $dateArg2);
$expected = "2";
$t->is($result, $expected, 'testing DateHelper::getDateDiffInMonths()');

?>