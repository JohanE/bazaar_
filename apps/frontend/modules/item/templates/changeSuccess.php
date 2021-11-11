<?php use_helper('Category') ?>
<?php use_helper('SubLocation') ?>


<?php use_javascript('head.min.js') ?>
<?php use_javascript('jquery-1.4.2.min.js') ?>
<?php use_javascript('jquery-ui-1.8.6.custom.min.js') ?>
<?php use_javascript('jquery.ui.selectmenu.js') ?>
<?php use_javascript('jquery-lightbox/jquery.lightbox-0.5.pack.js') ?>
<?php use_javascript('main.js') ?>
<?php use_javascript('jquery.jqia.selects.js') ?>
<?php use_javascript('change') ?>

<div id="wrapper">
			<div id="product">
				<div class="content">
                                        <form id="theform" action="<?php echo url_for('item/changePost'.(!$item->isNew() ? '?id='.$item->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
					    
						<div class="clr"></div>
                                                <h3><?php echo __('Контактные данные')?>:</h3>
						<div class="notify contact">
                                                        <label for="name-inp">
                                                          <?php if($item->getCustomerType()->getId() == CustomerType::business) : ?>        
                                                             <?php echo __('фирма')?>
                                                          <?php else : ?>
                                                            <?php echo __('Имя')?>
                                                          <?php endif; ?>
                                                           <strong>*</strong>:
                                                             <?php $class=($form['name']->hasError()) ? 'text validate error' : 'text'; echo $form['name']->render(array('class' => $class)) ?>
                                                           <span class="notify"><?php echo $form['name']->renderError()?></span>
							</label>
							<div class="clr"></div>
							<label for="phone-inp"><?php echo __('Ваш контактный телефон')?> <strong>*</strong>: 
                                                                <?php $class=($form['phone']->hasError()) ? 'text validate error' : 'text'; echo $form['phone']->render(array('class' => $class)) ?>
                                                             <span class="notify"><?php echo $form['phone']->renderError()?></span>
							</label>
							<div class="clr"></div>
							<label for="email-inp">Ваш Email <strong>*</strong>:
                                                                <?php $class=($form['email']->hasError()) ? 'text validate error' : 'text'; echo $form['email']->render(array('class' => $class)) ?>
                                                                <span class="notify"><?php echo $form['email']->renderError()?></span>
                                                                <div class="clr"></div>
								<span class="notify"><?php echo __('(адрес скрытый, ответ посылается через объявление)')?></span> </label>
							<div class="clr"></div>

                                                        <label for="site-inp" id="siterow" style="display: <?php if($item->getCustomerType()->getId() == CustomerType::business) echo "none"; else echo "none";?>">Сайт:
                                                          <?php $class=($form['site']->hasError()) ? 'text validate error' : 'text'; echo $form['site']->render(array('class' => $class)); ?>   
                                                           <span class="notify"><?php echo $form['site']->renderError() ?></span>
							</label>
							<div class="clr"></div>
						</div>
                                                <h3><?php echo __('Объявление')?>:</h3>
						<div class="notify contact">
							 <label for="type-inp"><span class="block"><?php echo __('Тип сделки')?>:</span>
                                                           <?php echo $form['mode_id']->render(array('class' => 'custom')); ?>   
							</label>
							<div class="clr"></div>
						        <label for="category-inp"> <span class="block"><?php echo __('Категория') ?>: <?php echo $item->getCategory() ?></span>
							</label>

							<div class="clr"></div>
                                                        <label for="category-inp" style="display: <?php if($item->getSubCategory() != null) echo ""; else echo "none";?>" id="subcat_row"> 
                                                          <span class="block">:</span>
                                                          <?php echo $form['subcategory_id']->render(array('class' => 'custom')); ?>                                                           
                                                          <span class="notify"><?php echo $form['subcategory_id']->renderError()?></span>
							
							</label>
							<div class="clr"></div>

					               <label for="title-inp"><?php echo __('Заглавие объявления')?> <strong>*</strong>:
							<?php $class=($form['title']->hasError()) ? 'text validate error' : 'text'; echo $form['title']->render(array('class' => $class)); ?>   
                                                           <span class="notify"><?php echo $form['title']->renderError() ?></span>
                                                           <div class="clr"></div>
                                                           <?php if (!$form['title']->hasError()): ?>			                    
							  <span class="notify"><?php echo __('(<strong>куплю</strong>, <strong>продам</strong> и т.д. не писать в заглавии)')?></span> 
                                                           <?php endif; ?>

                                                        </label>	
							<div class="clr"></div>
						        <label for="text-inp"><?php echo __('Текст объявления')?> <strong>*</strong>:
							<?php echo $form['body'] ?>
                                                        <span class="notify"><?php echo $form['body']->renderError() ?></span>
                                                        </label>

							<div class="clr"></div>
						        <label for="price-inp">Цена:
                                                        <?php $class=($form['price']->hasError()) ? 'text validate error' : 'text'; echo $form['price']->render(array('class' => $class)) ?>    
                                                          <span class="notify"><?php echo $form['price']->renderError() ?></span>
							</label>
							<div class="clr"></div>
							
						      	 <label for="file-inp">
                                                            <?php echo __('Прикрепить изображение')?>:
							    <div id="file-holder">
                                                               <div id="file-inp-btn">
                                                                 <div><?php echo __('Прикрепить картинку')?></div>
                                                               </div>
                                                               <div style="float: left">
                                                                 <?php echo $form['file']->render(array('size' => '10')) ?>
                                                               </div>
                                                            </div>
							  </label>

                                                            <div>
                                                                <span class="notify-img">
                                                                  <?php if ($sf_user->hasFlash('uploadinfo')): ?>
                                                                    <?php echo $sf_user->getFlash('uploadinfo') ?>
                                                                  <?php endif; ?> 

                                                                  <?php if ($sf_user->hasFlash('uploadinfo_extra')): ?>
                                                                    <?php echo $sf_user->getFlash('uploadinfo_extra') ?>
                                                                  <?php endif; ?>
                                                                  <?php echo $form['file']->renderError() ?>
                                                                 </span>          
                                                             </div>
							<div class="clr"></div>
						</div>
                                                <h3><?php echo __('Расположение')?>:</h3>
						<div class="notify contact">
							<label for="area-inp"> <span class="block">Область <strong>*</strong>:</span>
                                                       <?php echo $form['location_id']->render(array('class' => 'custom')); ?>  
							 <span class="notify"><?php echo $form['location_id']->renderError()?></span>	
							</label>
							<div class="clr"></div>
							<label for="town-inp"> <span class="block"><?php echo __('Город')?> <strong>*</strong>:</span>

                                                          <div id="sublocarea">
                                                            <?php echo getSubLocations($form['sublocation_id']->getValue(), $form['location_id']->getValue()) ?>
                                                          </div>    
							  <span class="notify"><?php echo $form['sublocation_id']->renderError()?></span>
							</label>
							<div class="clr"></div>
						</div>
                                                <h3><?php echo __('Дополнительная информация')?>:</h3>
						<div class="notify contact">
						
                                                        <?php if($itemCatId == sfConfig::get('app_car-cat-val')) : ?>
                                                          <label for="i1-inp" id="milage_row"> 
                                                                <span class="block"><?php echo __('Пробег (километраж)')?>:</span>
                                                                <?php echo $form['milage_id']->render(array('class' => 'custom')); ?>
                                                                <span class="notify"><?php echo $form['milage_id']->renderError()?></span>
							  </label>
                                                        <?php endif; ?>  
							<div class="clr"></div>
                                                        <?php if($itemCatId == sfConfig::get('app_car-cat-val')) : ?>  
			                                  <label id="gearbox_row" for="i2-inp"> 
                                                                <span class="block">Коробка передач:</span>
								<?php echo $form['gearbox_id']->render(array('class' => 'custom')); ?>
                                                                <span class="notify"><?php echo $form['gearbox_id']->renderError()?></span>
							  </label>				                             <?php endif; ?>  	
							<div class="clr"></div>
							<?php if($itemCatId == sfConfig::get('app_car-cat-val') || $itemCatId == sfConfig::get('app_motorcycle-cat-val')) : ?>  
                                                         <label id="yearmodel_row" for="i3-inp"> 
                                                                <span class="block"><?php echo __('год випуска')?></span>
                                                                <?php echo $form['yearmodel_id']->render(array('class' => 'custom')); ?>
                                                                <span class="notify"><?php echo $form['yearmodel_id']->renderError()?></span>
							 </label>
                                                        <?php endif; ?>  	

							<div class="clr"></div>
                                                        <?php if($itemCatId == sfConfig::get('app_car-cat-val')) : ?>  
							   <label id="fuel_row" for="i4-inp"> 
                                                                <span class="block"><?php echo __('Топливо')?>:</span>
							        <?php echo $form['fuel_id']->render(array('class' => 'custom')); ?>
                                                                <span class="notify"><?php echo $form['fuel_id']->renderError()?></span>	
							   </label>
                                                        <?php endif; ?>  	
							<div class="clr"></div>
                                                        <?php if ($itemCatId == sfConfig::get('app_boat-cat-val')): ?>
                                                          <label id="length_row" for="i4-inp"> 
                                                                <span class="block"><?php echo __('длина')?> (фут):</span>
							        <?php echo $form['length']->render(array('class' => 'text')); ?>
                                                                <span class="notify"><?php echo $form['length']->renderError()?></span>	
							  </label>
                                                        <?php endif; ?>  	
						</div>
                                                <?php echo $form['id'] ?>	  
						<div class="notify">
							<input type="submit" name="submitbtn" value="<?php echo __('Проверить объявление')?>" class="btn add" />
						</div>
						<div class="line"></div>
                                                
						<div class="notify no-margin">
							<input type="button" value="<?php echo __('Удалить объявление')?>" class="btn delete" onClick="window.location.href='<?php echo url_for('item/changeDeleteConfirm'.'?id='.$item->getId()) ?>'" />
							<input type="button" id="prolong" value="<?php echo __('Продлить объявление')?>" class="btn big" />
						</div>
						<div class="line"></div>
						<div id="response_area_ad" class="notify no-margin dark center" style="display: none">
                                                   <p><?php echo __('Срок объявления был продлен до')?></p>
						</div>
	                                        <div id="indicator" style="display: none;"><img src="/images/indicator.gif"></div>
					
				</div>

                                <!-- IMG stuff start -->
                                <div id="thesidebar" class="sidebar add">
   <?php include_partial('myimages_new_change', array('image' => $imgRegular, 'images' => $imgArrayExtra)) ?>
	                        </div>			
                               <!-- IMG stuff end -->
				<div class="clr"></div>
	</div>
</div>
</form>