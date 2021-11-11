<?php

/**
 * Subclass for representing a row from the 'internetbazar_milage' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Milage extends BaseMilage
{
  // special for I18n
  public function __toString()
  {
    return parent::getName();
  }

  public static function getMilageTo()
  {
    $more = sfContext::getInstance()->getI18N()->__('больше, чем');							
    $thelist = array();    
    array_push($thelist, new InfoCarrier('0', '0'));
    array_push($thelist, new InfoCarrier('4999', '4999'));
    array_push($thelist, new InfoCarrier('9999', '9999'));
    array_push($thelist, new InfoCarrier('14999', '14999'));
    array_push($thelist, new InfoCarrier('19999', '19999'));
    array_push($thelist, new InfoCarrier('24999', '24999'));
    array_push($thelist, new InfoCarrier('29999', '29999'));
    array_push($thelist, new InfoCarrier('34999', '34999'));
    array_push($thelist, new InfoCarrier('44999', '44999'));
    array_push($thelist, new InfoCarrier('49999', '49999'));
    array_push($thelist, new InfoCarrier('54999', '54999'));
    array_push($thelist, new InfoCarrier('59999', '59999'));
    array_push($thelist, new InfoCarrier('64999', '64999'));
    array_push($thelist, new InfoCarrier('69999', '69999'));
    array_push($thelist, new InfoCarrier('74999', '74999'));
    array_push($thelist, new InfoCarrier('79999', '79999'));
    array_push($thelist, new InfoCarrier('84999', '84999'));
    array_push($thelist, new InfoCarrier('89999', '89999'));
    array_push($thelist, new InfoCarrier('94999', '94999'));
    array_push($thelist, new InfoCarrier('99999', '99999'));
    array_push($thelist, new InfoCarrier('109999', '109999'));
    array_push($thelist, new InfoCarrier('119 999', '119999'));
    array_push($thelist, new InfoCarrier('129 999', '129999'));
    array_push($thelist, new InfoCarrier('139 999', '139999'));
    array_push($thelist, new InfoCarrier('149 999', '149999'));
    array_push($thelist, new InfoCarrier('159 999', '159999'));
    array_push($thelist, new InfoCarrier('169 999', '169999'));
    array_push($thelist, new InfoCarrier('179 999', '179999'));
    array_push($thelist, new InfoCarrier('189 999', '189999'));
    array_push($thelist, new InfoCarrier('199 999', '199999'));
    array_push($thelist, new InfoCarrier('249 999', '249999'));
    array_push($thelist, new InfoCarrier('299 999', '299999'));
    array_push($thelist, new InfoCarrier('349 999', '349999'));
    array_push($thelist, new InfoCarrier('399 999', '399999'));
    array_push($thelist, new InfoCarrier('449 999', '449999'));
    array_push($thelist, new InfoCarrier('499 999', '499999'));
    array_push($thelist, new InfoCarrier($more . ' 500 000', '549999'));
    
    return $thelist;    
  }

  public static function getMilageFrom()
  {
    
    $thelist = array();    
    array_push($thelist, new InfoCarrier('0', '0'));
    array_push($thelist, new InfoCarrier('5000', '5000'));
    array_push($thelist, new InfoCarrier('10 000', '10000'));
    array_push($thelist, new InfoCarrier('15 000', '15000'));
    array_push($thelist, new InfoCarrier('20 000', '20000'));
    array_push($thelist, new InfoCarrier('25 000', '25000'));
    array_push($thelist, new InfoCarrier('30 000', '30000'));
    array_push($thelist, new InfoCarrier('35 000', '35000'));
    array_push($thelist, new InfoCarrier('40 000', '40000'));
    array_push($thelist, new InfoCarrier('45 000', '45000'));
    array_push($thelist, new InfoCarrier('50 000', '50000'));
    array_push($thelist, new InfoCarrier('55 000', '55000'));
    array_push($thelist, new InfoCarrier('60 000', '60000'));
    array_push($thelist, new InfoCarrier('65 000', '65000'));
    array_push($thelist, new InfoCarrier('70 000', '70000'));
    array_push($thelist, new InfoCarrier('75000', '75000'));
    array_push($thelist, new InfoCarrier('80 000', '80000'));
    array_push($thelist, new InfoCarrier('85 000', '85000'));
    array_push($thelist, new InfoCarrier('90 000', '90000'));
    array_push($thelist, new InfoCarrier('95 000', '95000'));
    array_push($thelist, new InfoCarrier('100 000', '100000'));

    array_push($thelist, new InfoCarrier('110 000', '110000'));
    array_push($thelist, new InfoCarrier('120 000', '120000'));
    array_push($thelist, new InfoCarrier('130 000', '130000'));
    array_push($thelist, new InfoCarrier('140 000', '140000'));
    array_push($thelist, new InfoCarrier('150 000', '150000'));
    array_push($thelist, new InfoCarrier('160 000', '160000'));
    array_push($thelist, new InfoCarrier('170 000', '170000'));
    array_push($thelist, new InfoCarrier('180 000', '180000'));
    array_push($thelist, new InfoCarrier('190 000', '190000'));
    array_push($thelist, new InfoCarrier('200 000', '200000'));

    array_push($thelist, new InfoCarrier('250 000', '250000'));
    array_push($thelist, new InfoCarrier('300 000', '300000'));
    array_push($thelist, new InfoCarrier('350 000', '350000'));
    array_push($thelist, new InfoCarrier('400 000', '400000'));
    array_push($thelist, new InfoCarrier('450 000', '450000'));
    array_push($thelist, new InfoCarrier('500 000', '500000'));
    
    return $thelist;

  }
}
