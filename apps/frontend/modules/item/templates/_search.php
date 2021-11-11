<div id="search">			
                        <form action="<?php echo url_for('item/index') ?>" method="post" id="theform">
				<label class="left search" for="search-inp">
					<input type="text" value="<?php if(isset($params['searchstr']))echo $params['searchstr'] ?>" name="searchstr" class="text search" value="" id="search-inp" />
				</label>
	      <select class="custom" id="type" name="cat">
              <option value=''><?php echo __('Выбрать категорию') ?></option>
                <?php $selected = "" ?>
                <?php foreach ($superCategories as $supercat): ?>
                <option class="optgroup"><?php echo $supercat->getName() ?></option> 
                <?php foreach ($supercat->getCategories() as $cat): ?>                
                 <?php if(isset($params['catId'])) $selected = ($cat->getId() == $params['catId']) ? "selected=\"selected\" " : ""; ?>
                 <option value='<?php echo $cat->getId()?>' <?php echo $selected ?>><?php echo $cat->getName() ?></option>
                 <?php endforeach; ?>
               <?php endforeach; ?>			
		 </select>

				<select name="loc" class="custom">
                                     <option  <?php if(isset($params['locationId']) && $params['locationId'] == Category::adjacent_province_search) echo "selected"; ?> value="<?php echo Category::adjacent_province_search ?>"><?php echo __('смежные области')?></option>
                                     <option <?php if(isset($params['locationId']) && $params['locationId'] == Category::whole_country_search) echo "selected"; ?> value='<?php echo Category::whole_country_search ?>'><?php echo __('вся Украина')?></option>
                                <?php foreach ($locations as $location): ?>                                     
                                     <option <?php if(!isset($params['locationId']) || isset($params['locationId']) && $params['locationId'] == $location->getId()) echo "selected=\"selected\" "; ?> value='<?php echo $location->getId() ?>'><?php echo $location->getName() ?></option>              
                               <?php endforeach; ?>
				</select>
				<div class="clr h-small"></div>
				<div id="buttonset">
					<input type="checkbox" <?php if(isset($params['mode_id_'.$modes['sell']])) echo "checked='checked'";?>  value="<?php echo $modes['sell']?>" name="mode_id_<?php echo $modes['sell']?>" id="search-1" class="checkbox" />
					<label class="checkbox" for="search-1"><?php echo __('Продам') ?></label>
					<input type="checkbox" <?php if(isset($params['mode_id_'.$modes['buy']])) echo "checked='checked'";?>  value="<?php echo $modes['buy']?>" name="mode_id_<?php echo $modes['buy']?>" id="search-2" class="checkbox" />
					<label class="checkbox" for="search-2"><?php echo __('Куплю')?></label>
					<input type="checkbox" <?php if(isset($params['mode_id_'.$modes['to_rent']])) echo "checked='checked'";?>  value="<?php echo $modes['to_rent']?>" name="mode_id_<?php echo $modes['to_rent']?>" id="search-3" class="checkbox" />
                                        <label class="checkbox" for="search-3"><?php echo __('Сдам')?></label>
					<input type="checkbox" <?php if(isset($params['mode_id_'.$modes['whish_to_rent']])) echo "checked='checked'";?>  value="<?php echo $modes['whish_to_rent']?>" name="mode_id_<?php echo $modes['whish_to_rent']?>" id="search-4" class="checkbox" />
                                        <label class="checkbox" for="search-4"><?php echo __('Сниму')?></label>
				</div>
				<div class="clr"></div>
				<select class="custom" id="type-select" name="adtype_id">
				 <option value=''><?php echo __('Все объявления') ?></option>
				 <?php foreach ($customerTypes as $type): ?>  
				   <option <?php if(isset($params['adtype_id']) && $type->getId() == $params['adtype_id']) echo "selected" ?> value="<?php echo $type->getId() ?>"><?php echo $type->getPluralDescription() ?></option>
				 <?php endforeach; ?>			
				</select>
				<input type="submit" class="btn search-btn" value="Искать" />
				<div class="clr"></div>
				<div class="type-extend" id="type-2">
                                     <div class="search-area" style="<?php if((isset($params['price_from']) || isset($params['price_to'])) || (isset($params['catId']) && $hasPriceInfo)) echo "display:'';"; else echo "display:none"; ?>" id="pricesearch">

				        <select name="pricefrom" class="custom" id="pricefrom">
				        <option value=''><?php echo __('Цена от') ?></option>
                                        <?php foreach ($priceFrom as $price): ?>
                                         <option value="<?php echo $price->getThevalue() ?>" <?php if(isset($params['price_from']) && $params['price_from'] == $price->getThevalue()) echo "selected" ?>><?php echo $price->getThename() ?></option>
                                        <?php endforeach; ?>
                                        </select> 
				
   				         <div class="clr h-small"></div>
                                         <select name="priceto" class="custom" id="priceto">
				         <option value=''><?php echo __('Цена до') ?></option>
                                         <?php foreach ($priceTo as $price): ?>
                                         <option value="<?php echo $price->getThevalue() ?>" <?php if(isset($params['price_to']) && $params['price_to'] == $price->getThevalue()) echo "selected" ?>><?php echo $price->getThename() ?></option>
                                         <?php endforeach; ?>
                                         </select>                                         
                                      </div>
                                      
                                      <div id="caryearmodel" class="search-area" style="<?php if($isCarMode) echo "display: ''"; else echo "display: none" ?> ">
                                        <select id="caryearmodelselectfrom" name="yearmodel_from" class="custom">
	                                  <option value=''><?php echo __('Год выпуска от')?></option>
	                                  <?php foreach ($yearModelsFrom as $model): ?>  
	                                   <option <?php if(isset($params['yearmodel_from']) && $model->getId() == $params['yearmodel_from']) echo "selected" ?> value="<?php echo $model->getId() ?>"><?php echo $model->getName() ?></option>
                                          <?php endforeach; ?>
                                        </select>
   					<div class="clr h-small"></div>
 
                                        <select id="caryearmodelselectto" name="yearmodel_to" class="custom">
	                                  <option value=''><?php echo __('Год выпуска до')?></option>
	                                  <?php foreach ($yearModelsTo as $model): ?>  
	                                    <option <?php if(isset($params['yearmodel_to']) && $model->getId() == $params['yearmodel_to']) echo "selected" ?> value="<?php echo $model->getId() ?>"><?php echo $model->getName() ?></option>
          <?php endforeach; ?>
                                         </select>
                                       </div>

                                     <div id="apartmentrooms" class="search-area" style="<?php if($isApartmentMode) echo "display: ''"; else echo "display: none" ?> ">
                                        <select id="apartroomfrom" name="room_from" class="custom">
                                         <option value=''><?php echo __('Количество комнат от')?></option>
	                                 <?php foreach ($roomsFrom as $room): ?>
                                          <option <?php if(isset($params['room_from']) && $room->getId() == $params['room_from']) echo "selected" ?> value="<?php echo $room->getId() ?>"><?php echo $room ?></option>
                                         <?php endforeach; ?>	                      
                                        </select>
   					<div class="clr h-small"></div>
                                        <select id="apartroomto" name="room_to" class="custom">
                                          <option value=''><?php echo __('Количество комнат до')?></option>
	                                  <?php foreach ($roomsTo as $room): ?>
                                          <option <?php if(isset($params['room_to']) && $room->getId() == $params['room_to']) echo "selected" ?> value="<?php echo $room->getId() ?>"><?php echo $room ?></option>
                                         <?php endforeach; ?>	                      
                                        </select>
                                      </div>

                                      <div id="apartmentarea" class="search-area" style="<?php if($isApartmentMode) echo "display: ''"; else echo "display: none" ?> ">
                                        <select id="apartareafrom" name="area_from" class="custom">
                                         <option value=''><?php echo __('Площадь от')?></option>
                                         <?php foreach ($areaFromList as $area): ?>  
                                          <option <?php if(isset($params['area_from']) && $area->getThevalue() == $params['area_from']) echo "selected" ?> value="<?php echo $area->getThevalue() ?>"><?php echo $area->getThename() ?></option>
                                        <?php endforeach; ?>  
                                        </select>
   					<div class="clr h-small"></div>
                                        <select id="apartareato" name="area_to" class="custom">
                                          <option value=''><?php echo __('Площадь до')?></option>
                                           <?php foreach ($areaToList as $area): ?>  
                                           <option <?php if(isset($params['area_to']) && $area->getThevalue() == $params['area_to']) echo "selected" ?> value="<?php echo $area->getThevalue() ?>"><?php echo $area->getThename() ?></option>
                                           <?php endforeach; ?>
                                        </select>
                                      </div>

                                        <div class="search-area" id="carmilage" style="<?php if($isCarMode) echo "display: ''"; else echo "display: none" ?> ">
                                          <select class="custom" id="carmilagefrom" name="milage_from">
					    <option value=''><?php echo __('пробег от') ?></option>
	  <?php foreach ($milageFrom as $model): ?>  
	     <option <?php if(isset($params['milage_from']) && $model->getThevalue() == $params['milage_from']) echo "selected" ?> value="<?php echo $model->getThevalue() ?>"><?php echo $model->getThename() ?></option>
          <?php endforeach; ?>
                                          </select>

   					<div class="clr h-small"></div>


                                          <select class="custom" id="carmilageto" name="milage_to">
					    <option value=''><?php echo __('пробег до') ?></option>
	  <?php foreach ($milageTo as $model): ?>  
	     <option <?php if(isset($params['milage_to']) && $model->getThevalue() == $params['milage_to']) echo "selected" ?> value="<?php echo $model->getThevalue() ?>"><?php echo $model->getThename() ?></option>
          <?php endforeach; ?>
                                          </select>

                                        </div>

                                      <div class="search-area" id="cargearbox" style="<?php if($isCarMode) echo "display: ''"; else echo "display: none" ?> ">
                                     <div style="float: left">
					
                                       <select class="custom" id="gearboxselect" name="gearbox_id">
                                        <option value=''>Коробка передач</option>
                                         <?php foreach ($gearBoxes as $box): ?> 
                                            <option <?php if(isset($params['gearbox_id']) && $box->getId() == $params['gearbox_id']) echo "selected" ?> value="<?php echo $box->getId()?>"><?php echo $box ?></option>
                                         <?php endforeach; ?> 
                                       </select>
                                       </div>
                                       <div style="float: left">

                                        <select class="custom" id="fuelselect" name="fuel_id">
                                          <option value=''><?php echo __('Топливо')?></option>
                                          <?php foreach ($fuelList as $fuel): ?> 
                                            <option <?php if(isset($params['fuel_id']) && $fuel->getId() == $params['fuel_id']) echo "selected" ?> value="<?php echo $fuel->getId()?>"><?php echo $fuel ?></option>
                                          <?php endforeach; ?> 
                                        </select>
					
                                       </div>
                                      </div>
                                       
                                      <div class="search-area" id="subcategorydiv" style="<?php if(isset($params['subcategory']) || (isset($subcats) && count($subcats) > 0)) echo "display: '';"; else echo "display: none"; ?>">
                                       <select class="custom" id="subcatselect" name="subcategory">
				         <option value=''><?php echo __('Выбрать категорию') ?></option>
                                         <?php foreach ($subcats as $subcat): ?>
                                           <option value="<?php echo $subcat->getId() ?>" <?php if(isset($params['subcategory']) && $params['subcategory'] == $subcat->getId()) echo "selected" ?>><?php echo $subcat->getName() ?></option>
                                         <?php endforeach; ?>    
                                       </select>
                                      </div>
				</div>
				
			
			<div class="clr"></div>
		</div>