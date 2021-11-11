<?php

/**
 * Class for helping out w date formatting
 * and date related calculations
 *
 * @author Johan Edlund
 * @package lib.model
 */ 
class DateHelper
{

  public static function getFormattedDate ($date)
  {
    $itemTime = date_create($date);    
    $itemDate = date_format($itemTime, 'Ymd'); 
    $todaysDate = date("Ymd");
    $yesterday = date('Ymd', mktime(0, 0, 0, date("m") , date("d") - 1, date("Y")));
     
    if($itemDate == $todaysDate)
      {
	$today = sfContext::getInstance()->getI18N()->__('Сегодня');
	return $today;
      }
    elseif($itemDate == $yesterday)
      {
	$yesterday = sfContext::getInstance()->getI18N()->__('Вчера');
	return $yesterday;
      }
    else 
      {
	$theMonth = self::getMonthAsText(date_format($itemTime, 'm'));
	$theDay = date_format($itemTime, 'd');
	$theYear = date_format($itemTime, 'Y');	
	$returnDate = $theDay . "-" . $theMonth . "-" . $theYear;
	return $returnDate;
      }
  }

  private static function getMonthAsText($numericDate) 
  {    
    switch ($numericDate) {
    case "01":
      return "января";
    case "02":
      return "февраля";
    case "03":
      return "марта";
    case "04":
      return "апреля";
    case "05":
      return "мая";
    case "06":
      return "июня";
    case "07":
      return "июля";
    case "08":
      return "августа";
    case "09":
      return "сентября";
    case "10":
      return "октября";
    case "11":
      return "ноября";
    case "12":
      return "декабря";
    }
  }


  public static function getFormattedDateSimple ($date) 
  {
    $itemDate = date_create($date);    
    return date_format($itemDate, 'd-m-Y');
  }

  public static function getTodaysDate()
  {
    // Some silly stuff that makes it possible to have predictable search
    // results when testing the web gui using selenium
    $env = sfConfig::get('sf_environment');
    if($env == 'dev')
      return "2010-11-09";

    return date("Y-m-d");
  }

  # This function calculates the end date of the ad, i.e how
  # long the ad can remain on the site, typically a couple of months
  public static function getEndDate()
  {
    $endDate = date('Y-m-d', mktime(0, 0, 0, date("m") + SystemSetting::getMaxPeriodOnSite(), date("d"), date("Y")));
    return $endDate;
  }

  public static function createValidUntilByDate($aDate) 
  {
    $prolongedDate = new DateTime("now");     
    $prolongedDate->modify("+".SystemSetting::getMaxPeriodOnSite() ." month");    
    return $prolongedDate;
  }

  public static function getDateDiffInMonths($datetime1, $datetime2)
  {
    $interval = $datetime1->diff($datetime2);
    return $interval->format('%m');
  }

}
