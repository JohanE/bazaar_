<?php

/**
 * category actions.
 *
 * @package    internetbazar
 * @subpackage category
 * @author     Johan Edlund
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class categoryActions extends sfActions
{

  public function executeCategoryChanged(sfWebRequest $request)
  {        
    // Security check
    $this->forward404Unless($this->getRequest()->isXmlHttpRequest());    
    $var = $this->getRequestParameter('id');    
    $this->subcategories  = SubCategoryPeer::getSubCategoriesById($var);
    $this->categoryId     = $var;

    $this->categoryName   = Category::getCategoryName($var);
    $this->yearModelsFrom = ($this->categoryName == "car-cat-val") ? YearmodelPeer::getYearmodelsFrom() : null;
    $this->yearModelsTo   = ($this->categoryName == "car-cat-val") ? YearmodelPeer::getYearmodelsTo() : null;

    $this->priceListFrom  = PriceHandler::getPriceList($var, PriceHandler::listFrom);
    $this->priceListTo    = PriceHandler::getPriceList($var, PriceHandler::listTo); 

    $this->milageListFrom = Milage::getMilageFrom();
    $this->milageListTo   = Milage::getMilageTo();

    $this->gearBoxList    = GearboxPeer::getGearboxes();
    $this->fuelList       = FuelPeer::getFuelTypes();

    $this->roomListTo     =  RoomPeer::getRoomsTo();
    $this->roomListFrom   =  RoomPeer::getRoomsFrom();

    $this->areaListFrom   = ItemPeer::getAreaFrom();
    $this->areaListTo     = ItemPeer::getAreaTo();

  }



}
