<?php

include(dirname(__FILE__).'/../bootstrap/Propel.php');
 
$t = new lime_test(3, new lime_output_color());


$systemSetting = SystemSetting::getMaxDurationForAdsInMonths();
$t->ok($systemSetting, "Check that the getMaxDurationForAdsInMonths does not return null");
$t->comment("getMaxDurationForAdsInMonths = " . $systemSetting->getValue());

$maxAdOnSite = SystemSetting::getMaxPeriodOnSite();
$t->ok($maxAdOnSite, "Check that the getMaxPeriodOnSite does not return null");
$t->comment("getMaxPeriodOnSite = " . $maxAdOnSite);

$maxImgOnSite = SystemSetting::getMaxNumberOfImagesForAd();
$t->ok($maxImgOnSite, "Check that the getMaxPeriodOnSite does not return null");
$t->comment("getMaxImgOnSite = " . $maxImgOnSite);
?>