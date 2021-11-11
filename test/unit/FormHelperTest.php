<?php

include(dirname(__FILE__).'/../bootstrap/Propel.php');

$t = new lime_test(9, new lime_output_color());

$t->comment('--- testing the form helper -----');

$ret = FormHelper::specialSort(null);
$t->is($ret, null, 'Testing FormHelper::specialSort null value ');
$subcatlist = FormHelper::specialSort(createSubCatList());
$t->is($subcatlist[count($subcatlist)-1]->getName(), 'Другое', 'Testing FormHelper::specialSort special word at last pos ');

#cleanBodyVaule
$testBodyBefore = "Test <b>hej</b> <a href='/sdd.html'>mylink</a>";
$testBodyAfter = "Test hej mylink";
$t->is(FormHelper::cleanBodyValue($testBodyBefore), $testBodyAfter, 'Testing FormHelper::cleanBodyValue');

#getNameMinLength()
$t->is(is_numeric(FormHelper::getNameMinLength()), true, '-- check that the getNameMinLength return something numeric');

#containsMail
$t->is(FormHelper::containsMail('johan@swe.se'), true, '-- check that containsMail detects a correct mail address');
$t->isnt(FormHelper::containsMail('johan swe.se'), true, '-- check that containsMail skips an incorrect correct mail address');

#containsUrl($str)
$t->is(FormHelper::containsUrl('www.mydomain.se'), true, '-- check that containsUrl detects a correct url');
$t->is(FormHelper::containsUrl('http://www.mydomain.se'), true, '-- check that containsUrl detects a correct url');
$t->isnt(FormHelper::containsUrl('www. mydomain,se'), true, '-- check that containsUrl skips an incorrect url');


function createSubCatList ()
{
  $ret = array();

  $sub1 = new SubCategory ();
  $sub1->setName('aaaaaaa');
  $sub1->setId(1);

  $sub2 = new SubCategory ();
  $sub2->setId(2);
  $sub2->setName('Другое');

  $sub3 = new SubCategory ();
  $sub3->setName('cccccc');
  $sub3->setId(3);

  $sub4 = new SubCategory ();
  $sub4->setName('ddddddd');
  $sub4->setId(4);

  array_push($ret, $sub1);
  array_push($ret, $sub2);
  array_push($ret, $sub3);
  array_push($ret, $sub4);

  return $ret;
}

?>