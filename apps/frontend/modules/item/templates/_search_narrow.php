<?php use_helper('Javascript') ?>

 <div class="main_search">
 <div class="narrow_search">
  <?php echo __('уточнить поиск') ?>
 </div>
 <div class="narrow_search">
  <input type="checkbox" <?php if(isset($params['mode_id_'.$modes['sell']])) echo "checked='checked'";?> value="<?php echo $modes['sell']?>" name="mode_id_<?php echo $modes['sell']?>" /> <?php echo __('Продам') ?> <input type="checkbox" <?php if(isset($params['mode_id_'.$modes['buy']])) echo "checked='checked'";?> value="<?php echo $modes['buy']?>" name="mode_id_<?php echo $modes['buy']?>" /> <?php echo __('Куплю') ?> <input type="checkbox" <?php if(isset($params['mode_id_'.$modes['to_rent']])) echo "checked='checked'";?> value="<?php echo $modes['to_rent']?>" name="mode_id_<?php echo $modes['to_rent']?>" /> <?php echo __('Сдам')?> <input type="checkbox" <?php if(isset($params['mode_id_'.$modes['whish_to_rent']])) echo "checked='checked'";?> value="<?php echo $modes['whish_to_rent']?>" name="mode_id_<?php echo $modes['whish_to_rent']?>" /> <?php echo __('Сниму') ?>

 </div>
 <div class="searchContent">  
  <select id="customertype" name="adtype_id">
    <option value=''><?php echo __('Все объявления') ?></option>
      <?php foreach (CustomerTypePeer::getCustomerTypes() as $type): ?>  
       <option <?php if(isset($params['adtype_id']) && $type->getId() == $params['adtype_id']) echo "selected" ?> value="<?php echo $type->getId() ?>"><?php echo $type->getPluralDescription() ?></option>
       <?php endforeach; ?>
  </select>  

   <?php $hasPriceInfo = false;?>
       <?php if(isset($params['catId'])) $hasPriceInfo = (PriceHandler::isPriceComparisonCategory ($params['catId'])) ? true : false; ?>
     
 <?php if(isset($subcats)) : ?>
 <select name="subcategory" id="subcatselect" style="<?php if(isset($params['subcategory'])) echo "display: '';"; else echo "display: none"; ?>">
        <?php $selected = "" ?>
        <?php if(isset($params['subcategory']) && $params['subcategory'] != "") : ?>
	  <option  value="<?php echo Category::full_category_search ?>"><?php echo __('Выбрать категорию') ?></option>
        <?php endif; ?>
          <?php foreach ($subcats as $subcat): ?>
	  <option <?php if(isset($params['subcategory']) && $params['subcategory'] == $subcat->getId()) echo "selected"; ?> value='<?php echo $subcat->getId()?>' ><?php echo $subcat ?></option>
          <?php endforeach; ?>
       </select>
 <?php else : ?>
   <select name="subcategory" id="subcatselect" style="display: none;" >
     <option value="">dummy</option>
   </select>
 <?php endif; ?>
 </div>     

<div id="pricesearch" style="<?php if((isset($params['price_from']) || isset($params['price_to'])) || (isset($params['catId']) && $hasPriceInfo)) echo "display: '';"; else echo "display: none"; ?>">
     <div style="float: left;">

  <?php if($hasPriceInfo) : ?>        
      <select name="pricefrom" id="pricefrom">
        <option value=''><?php echo __('Цена от') ?></option>
            <?php foreach (PriceHandler::getPriceList($params['catId'], PriceHandler::listFrom) as $price): ?>
             <option value="<?php echo $price->getThevalue() ?>" <?php if(isset($params['price_from']) && $params['price_from'] == $price->getThevalue()) echo "selected" ?>><?php echo $price->getThename() ?></option>
          <?php endforeach; ?>
      </select> 
  <?php else : ?>
      <select name="pricefrom" id="pricefrom">
        <option value="">dummy</option>
      </select>
  <?php endif; ?>

      <br />

  <?php if($hasPriceInfo) : ?>        
      <select name="priceto" id="priceto">
          <option value=''><?php echo __('Цена до') ?></option>
	     <?php foreach (PriceHandler::getPriceList($params['catId'], PriceHandler::listTo) as $price): ?>  
	     <option value="<?php echo $price->getThevalue() ?>" <?php if(isset($params['price_to']) && $params['price_to'] == $price->getThevalue()) echo "selected" ?>><?php echo $price->getThename() ?></option>
          <?php endforeach; ?>
      </select>
  <?php else : ?>
      <select name="priceto" id="priceto">
        <option value="">dummy</option>
      </select>
  <?php endif; ?>

     </div>
 <?php $isApartmentMode = false;?>
 <?php if(isset($params['catId'])) $isApartmentMode = (Category::getCategoryName ($params['catId']) == "apartment-cat-val") ? true : false; ?>
 <div id="apartmentrooms"  style="<?php if($isApartmentMode) echo "display: ''"; else echo "display: none" ?> ">
      <select id="apartroomfrom" name="room_from">
         <option value=''><?php echo __('Количество комнат от')?></option>
	  <?php foreach (RoomPeer::getRoomsFrom() as $room): ?>
            <option <?php if(isset($params['room_from']) && $room->getId() == $params['room_from']) echo "selected" ?> value="<?php echo $room->getId() ?>"><?php echo $room ?></option>
          <?php endforeach; ?>
      </select>  
      <br />
      <select id="apartroomto" name="room_to">
       <option value=''><?php echo __('Количество комнат до')?></option>
         <?php foreach (RoomPeer::getRoomsTo() as $room): ?>
           <option <?php if(isset($params['room_to']) && $room->getId() == $params['room_to']) echo "selected" ?> value="<?php echo $room->getId() ?>"><?php echo $room ?></option>
          <?php endforeach; ?>
      </select>  
 </div>

 <div id="apartmentarea"  style="<?php if($isApartmentMode) echo "display: ''"; else echo "display: none" ?> ">
  <select id="apartareafrom" name="area_from">
   <option value=''><?php echo __('Площадь от')?></option>
   <?php foreach (ItemPeer::getAreaFrom() as $area): ?>  
      <option <?php if(isset($params['area_from']) && $area->getThevalue() == $params['area_from']) echo "selected" ?> value="<?php echo $area->getThevalue() ?>"><?php echo $area->getThename() ?></option>
    <?php endforeach; ?>
  </select>
  <br />
  <select id="apartareato" name="area_to">
    <option value=''><?php echo __('Площадь до')?></option>
    <?php foreach (ItemPeer::getAreaTo() as $area): ?>  
      <option <?php if(isset($params['area_to']) && $area->getThevalue() == $params['area_to']) echo "selected" ?> value="<?php echo $area->getThevalue() ?>"><?php echo $area->getThename() ?></option>
    <?php endforeach; ?>
  </select>
 </div>


 <?php $isCarMode = false;?>
      <?php if(isset($params['catId'])) $isCarMode = (Category::getCategoryName ($params['catId']) == "car-cat-val") ? true : false; ?>
      <div id="caryearmodel" style="<?php if($isCarMode) echo "display: ''"; else echo "display: none" ?> ">
      <select id="caryearmodelselectfrom" name="yearmodel_from">
	  <option value=''><?php echo __('Год выпуска от')?></option>
	  <?php foreach (YearmodelPeer::getYearmodelsFrom() as $model): ?>  
	     <option <?php if(isset($params['yearmodel_from']) && $model->getId() == $params['yearmodel_from']) echo "selected" ?> value="<?php echo $model->getId() ?>"><?php echo $model->getName() ?></option>
          <?php endforeach; ?>
      </select>
      <br />
      <select id="caryearmodelselectto" name="yearmodel_to"> 
        <option value=''><?php echo __('Год выпуска до')?></option>
        <?php foreach (YearmodelPeer::getYearmodelsTo() as $model): ?>  
	  <option <?php if(isset($params['yearmodel_to']) && $model->getId() == $params['yearmodel_to']) echo "selected" ?> value="<?php echo $model->getId() ?>"><?php echo $model->getName() ?></option>
        <?php endforeach; ?>
      </select>
      </div> 
      
      <div id="carmilage" style="<?php if($isCarMode) echo "display: ''"; else echo "display: none" ?> ">      
       <select id="carmilagefrom" name="milage_from">
																     <option value=''><?php echo __('пробег от') ?></option>
	  <?php foreach (Milage::getMilageFrom() as $model): ?>  
	     <option <?php if(isset($params['milage_from']) && $model->getThevalue() == $params['milage_from']) echo "selected" ?> value="<?php echo $model->getThevalue() ?>"><?php echo $model->getThename() ?></option>
          <?php endforeach; ?>
       </select>
      <br />
       <select id="milageselectto" name="milage_to"> 
																     <option value=''><?php echo __('пробег до')?></option>
          <?php foreach (Milage::getMilageTo() as $model): ?>  
	     <option <?php if(isset($params['milage_to']) && $model->getThevalue() == $params['milage_to']) echo "selected" ?> value="<?php echo $model->getThevalue() ?>"><?php echo $model->getThename() ?></option>
          <?php endforeach; ?>
      </select>
      </div>

      <div id="cargearbox" style="<?php if($isCarMode) echo "display: ''"; else echo "display: none" ?> ">
       <select id="gearboxselect" name="gearbox_id">
         <option value=''>Коробка передач</option>
         <?php foreach (GearboxPeer::getGearboxes() as $box): ?> 
           <option <?php if(isset($params['gearbox_id']) && $box->getId() == $params['gearbox_id']) echo "selected" ?> value="<?php echo $box->getId()?>"><?php echo $box ?></option>
         <?php endforeach; ?> 
       </select>
       
        <select id="fuelselect" name="fuel_id">
         <option value=''><?php echo __('Топливо')?></option>
         <?php foreach (FuelPeer::getFuelTypes() as $fuel): ?> 
           <option <?php if(isset($params['fuel_id']) && $fuel->getId() == $params['fuel_id']) echo "selected" ?> value="<?php echo $fuel->getId()?>"><?php echo $fuel ?></option>
         <?php endforeach; ?> 
        </select>
	
      </div>

 </div>	
  </div>






