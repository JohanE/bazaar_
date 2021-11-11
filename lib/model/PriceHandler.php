<?php

/**
 * Class for handling price comparison
 * @author     Johan Edlund
 *
 * @package lib.model
 */ 
class PriceHandler
{
  const listFrom = 1;
  const listTo   = 2;

  const moreThan = "больше, чем";

  public static function getPriceToList1()
  {
   
    $thelist = self::getList1();
    // Remove the first element in the array (with the value "0")
    // since it shouldn't be used in the "to-list"
    array_shift($thelist);
    // Add an extra "more than"-element     
    $more = sfContext::getInstance()->getI18N()->__(self::moreThan);
    array_push($thelist, new InfoCarrier($more . ' 500 000', Category::price_more_than));
   
    return $thelist;

  }

  public static function getPriceToList2()
  {
   
    $thelist = self::getList2();

    // Add an extra "more than"-element 
    $more = sfContext::getInstance()->getI18N()->__(self::moreThan);
    array_push($thelist, new InfoCarrier($more . ' 7 000 000', Category::price_more_than));
   
    return $thelist;

  }

 public static function getPriceToList3()
  {
    $thelist = self::getPriceFromList3();
    // Remove the first element in the array (with the value "0")
    // since it shouldn't be used in the "to-list"
    array_shift($thelist);
    // Add an extra "more than"-element 
    $more = sfContext::getInstance()->getI18N()->__(self::moreThan);
    array_push($thelist, new InfoCarrier($more . ' 2 000 000', Category::price_more_than));
   
    return $thelist;
  }

 public static function getPriceFromList3()
  {
    $thelist = array();
    array_push($thelist, new InfoCarrier('0', '0'));
    array_push($thelist, new InfoCarrier('5 000', '5000'));
    array_push($thelist, new InfoCarrier('10 000', '10000'));
    array_push($thelist, new InfoCarrier('20 000', '20000'));
    array_push($thelist, new InfoCarrier('30 000', '30000'));
    array_push($thelist, new InfoCarrier('40 000', '40000'));
    array_push($thelist, new InfoCarrier('60 000', '60000'));
    array_push($thelist, new InfoCarrier('70 000', '70000'));
    array_push($thelist, new InfoCarrier('80 000', '80000'));
    array_push($thelist, new InfoCarrier('90 000', '90000'));
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
    array_push($thelist, new InfoCarrier('210 000', '210000'));					          
    array_push($thelist, new InfoCarrier('220 000', '220000'));					          
    array_push($thelist, new InfoCarrier('230 000', '230000'));					          
    array_push($thelist, new InfoCarrier('240 000', '240000'));					          	       
    array_push($thelist, new InfoCarrier('250 000', '250000'));					          
    array_push($thelist, new InfoCarrier('260 000', '260000'));					          
    array_push($thelist, new InfoCarrier('270 000', '270000'));					          
    array_push($thelist, new InfoCarrier('280 000', '280000'));					          
    array_push($thelist, new InfoCarrier('290 000', '290000'));					          
    array_push($thelist, new InfoCarrier('300 000', '300000'));	       	       
    array_push($thelist, new InfoCarrier('350 000', '350000'));					          
    array_push($thelist, new InfoCarrier('400 000', '400000'));					          
    array_push($thelist, new InfoCarrier('450 000', '450000'));					          
    array_push($thelist, new InfoCarrier('500 000', '500000'));					          
    array_push($thelist, new InfoCarrier('550 000', '550000'));					          
    array_push($thelist, new InfoCarrier('600 000', '600000'));	       	       
    array_push($thelist, new InfoCarrier('650 000', '650000'));					          
    array_push($thelist, new InfoCarrier('700 000', '700000'));					          
    array_push($thelist, new InfoCarrier('750 000', '750000'));					          
    array_push($thelist, new InfoCarrier('800 000', '800000'));					          
    array_push($thelist, new InfoCarrier('850 000', '850000'));					          
    array_push($thelist, new InfoCarrier('900 000', '900000'));	       
    array_push($thelist, new InfoCarrier('950 000', '950000'));					          
    array_push($thelist, new InfoCarrier('1 000 000', '1000000'));					          
    array_push($thelist, new InfoCarrier('1 200 000','1200000'));					          
    array_push($thelist, new InfoCarrier('1 400 000','1400000'));					          
    array_push($thelist, new InfoCarrier('1 600 000','1600000'));					          
    array_push($thelist, new InfoCarrier('1 800 000','1800000'));	       
    array_push($thelist, new InfoCarrier('2 000 000', '2000000'));
    return $thelist;				      	       
  }

  public static function getList1()
  {
    $thelist = array();

    array_push($thelist, new InfoCarrier('0', '0'));
    array_push($thelist, new InfoCarrier('5 000', '5000'));
    array_push($thelist, new InfoCarrier('10 000', '10000'));
    array_push($thelist, new InfoCarrier('20 000', '20000'));

    array_push($thelist, new InfoCarrier('30 000', '30000'));
    array_push($thelist, new InfoCarrier('40 000', '40000'));
    array_push($thelist, new InfoCarrier('50 000', '50000'));
    array_push($thelist, new InfoCarrier('60 000', '60000'));
    array_push($thelist, new InfoCarrier('70 000', '70000'));
    array_push($thelist, new InfoCarrier('80 000', '80000'));
    array_push($thelist, new InfoCarrier('90 000', '90000'));
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

    array_push($thelist, new InfoCarrier('210 000', '210000'));
    array_push($thelist, new InfoCarrier('220 000', '220000'));
    array_push($thelist, new InfoCarrier('230 000', '230000'));
    array_push($thelist, new InfoCarrier('240 000', '240000'));
    array_push($thelist, new InfoCarrier('250 000', '250000'));
    array_push($thelist, new InfoCarrier('260 000', '260000'));
    array_push($thelist, new InfoCarrier('270 000', '270000'));
    array_push($thelist, new InfoCarrier('280 000', '280000'));
    array_push($thelist, new InfoCarrier('290 000', '290000'));
    array_push($thelist, new InfoCarrier('300 000', '300000'));

    array_push($thelist, new InfoCarrier('350 000', '350000'));
    array_push($thelist, new InfoCarrier('400 000', '400000'));
    array_push($thelist, new InfoCarrier('450 000', '450000'));
    array_push($thelist, new InfoCarrier('500 000', '500000'));
    
    return $thelist;
  }

public static function getList2()
  {

    $thelist = array();

    array_push($thelist, new InfoCarrier('100 000', '100000'));
    array_push($thelist, new InfoCarrier('200 000', '200000'));
    array_push($thelist, new InfoCarrier('300 000', '300000'));
    array_push($thelist, new InfoCarrier('400 000', '400000'));

    array_push($thelist, new InfoCarrier('500 000', '500000'));
    array_push($thelist, new InfoCarrier('750 000', '750000'));
    array_push($thelist, new InfoCarrier('1 000 000', '1000000'));
    array_push($thelist, new InfoCarrier('1 250 000', '1250000'));
    array_push($thelist, new InfoCarrier('1 500 000', '1500000'));
    array_push($thelist, new InfoCarrier('1 750 000', '1750000'));
    array_push($thelist, new InfoCarrier('2 000 000', '2000000'));
    array_push($thelist, new InfoCarrier('2 250 000', '2250000'));
    array_push($thelist, new InfoCarrier('2 500 000', '2500000'));
    array_push($thelist, new InfoCarrier('3 000 000', '3000000'));
    array_push($thelist, new InfoCarrier('3 500 000', '3500000'));
    array_push($thelist, new InfoCarrier('4 000 000', '4000000'));
    array_push($thelist, new InfoCarrier('4 500 000', '4500000'));
    array_push($thelist, new InfoCarrier('5 000 000', '5000000'));
    array_push($thelist, new InfoCarrier('5 500 000', '5500000'));
    array_push($thelist, new InfoCarrier('6 000 000', '6000000'));
    array_push($thelist, new InfoCarrier('6 500 000', '6500000'));
    array_push($thelist, new InfoCarrier('7 000 000', '7000000'));

    return $thelist;
  }

  public static function getPriceFromList2()
  {
    $thelist = self::getList2();
    return $thelist;
  }

  public static function getPriceFromList1()
  {
    $thelist = self::getList1();
    return $thelist;
  }

  public static function getPriceList($catId, $typeOfList)
  {
    $priceTask = new PriceStrategyTask($catId, $typeOfList);
    return $priceTask->getTheList();
  }
  
  public static function isPriceComparisonCategory ($catId)
  {
    $priceTask = new PriceStrategyTask($catId, self::listFrom);
    if(count($priceTask->getTheList()) > 0)
      return true;

    return false;

  }
}

class PriceStrategyImpl3 implements PriceStrategy {

  public function getList($catName, $listType) {

    if(in_array($catName, array("boat-cat-val")))
      {
	if($listType == PriceHandler::listFrom)
	  {	    
	    return PriceHandler::getPriceFromList3();	    	    
	  }
	elseif($listType == PriceHandler::listTo)
	  {	   
	    return PriceHandler::getPriceToList3();
	  }
      }    
    
    return null;
  }
  
}


class PriceStrategyImpl2 implements PriceStrategy {

  public function getList($catName, $listType) {

    if(in_array($catName, array("apartment-cat-val", "house-cat-val")))
      {
	if($listType == PriceHandler::listFrom)
	  {	    
	    return PriceHandler::getPriceFromList2();	    	    
	  }
	elseif($listType == PriceHandler::listTo)
	  {	   
	    return PriceHandler::getPriceToList2();
	  }
      }    
    
    return null;
  }
  
}


class PriceStrategyImplDefault implements PriceStrategy {

  public function getList($catName, $listType) {

    if(in_array($catName, array("motorcycle-cat-val", "car-cat-val")))
      {
	if($listType == PriceHandler::listFrom)
	  {
	    return PriceHandler::getPriceFromList1();	    	    
	  }
	elseif($listType == PriceHandler::listTo)
	  {	   
	    return PriceHandler::getPriceToList1();
	  }
      }    
    
    return null;
  }
  
}


class PriceStrategyTask {
  private $theList;

  public function __construct($catId, $listType) {
    $catName = Category::getCategoryName ($catId);
    // try different strategies for getting a list
    $strategies = array();
    array_push($strategies, new PriceContext(new PriceStrategyImplDefault()));
    array_push($strategies, new PriceContext(new PriceStrategyImpl2()));
    array_push($strategies, new PriceContext(new PriceStrategyImpl3()));

    $alist = null;
    foreach($strategies as $strategy)
      {
	$alist = $strategy->getList($catName, $listType);
	if($alist != null)
	  break;
      }

    //finally, assign
    $this->theList = ($alist != null) ? $alist : array();
  }

  public function getTheList()
  {
    return $this->theList;
  }
}


// strategy pattern
interface PriceStrategy {
  public function getList ($catName, $listType);
}

class PriceContext {
    var $strategy;
 
    public function __construct(PriceStrategy $strategy) {
        $this->strategy = $strategy;
    }
 
    public function getList($catName, $listType) {
      return $this->strategy->getList($catName, $listType);
    }
}


class InfoCarrier {
   private $thename;
   private $thevalue;   

   public function __construct($thename, $thevalue)
   {    
     $this->thename  = $thename;
     $this->thevalue = $thevalue;
   }
    
   public function getThename() {
     return $this->thename;
   }

   public function getThevalue() {
     return $this->thevalue;
   }

   public function __toString()
   {
     return $this->thename . " " . $this->thevalue;
   }
}