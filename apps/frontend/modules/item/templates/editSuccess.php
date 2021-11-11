<?php use_helper('Category') ?>
<?php use_helper('SubLocation') ?>
<?php use_helper('Visibility') ?>
<?php $item = $form->getObject() ?>

<div id="wrapper">
			<div id="product">
				<div class="content">
                                        <form id="theform" action="<?php echo url_for('item/update'.(!$item->isNew() ? '?id='.$item->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
                                                <div class="notify contact">
                                                    <?php echo $form['customertype_id']->render(array('class' => 'custom')) ?>
						    <div class="clr"></div>
						</div>
						<div class="clr"></div>					
					
					        <h3><?php echo __('Контактные данные')?>:</h3>
						<div class="notify contact">
							<label for="name-inp">
                                                           <span id="adname_default" style="display: <?php echo getRegularVisibility($form['customertype_id']) ?>"><?php echo __('Ваше имя') ?></span>
                                                           <span id="adname_business" style="display: <?php echo getBusinessVisibility($form['customertype_id']) ?>"><?php echo __('Ваша  фирма') ?></span>
        <strong>*</strong>:
                                                        
                                                          <?php $class=($form['name']->hasError()) ? 'text validate error' : 'text'; echo $form['name']->render(array('class' => $class)); ?>   
                                                         <span class="notify"><?php echo $form['name']->renderError()?></span>
							</label>
							<div class="clr"></div>
                                                        <label for="phone-inp"><?php echo __('Ваш контактный телефон')?>:
                                                          <?php $class=($form['phone']->hasError()) ? 'text validate error' : 'text'; echo $form['phone']->render(array('class' => $class)); ?>   
                                                           <span class="notify"><?php echo $form['phone']->renderError() ?></span>
							</label>
							<div class="clr"></div>
							<label for="email-inp">Ваш Email <strong>*</strong>:
                                                          <?php $class=($form['email']->hasError()) ? 'text validate error' : 'text'; echo $form['email']->render(array('class' => $class)) ?>    
                                                          <span class="notify"><?php echo $form['email']->renderError() ?></span>
                                                          <div class="clr"></div>
                                                          <span class="notify"><?php echo __('(адрес скрытый, ответ посылается через объявление)')?></span> </label>
							<div class="clr"></div>
						
						</div>

                                                <h3><?php echo __('Объявление')?>:</h3>
						<div class="notify contact">
                                                <label for="type-inp"><span class="block"><?php echo __('Тип сделки')?>:</span>
                                                           <?php echo $form['mode_id']->render(array('class' => 'custom')); ?>   
							</label>
							<div class="clr"></div>
							<label for="category-inp"> <span class="block"><?php echo __('Категория') ?>:</span>
                                                          <?php echo getCategories($item->getCategoryId(), $form['category_id']->getValue()) ?>
                                                          <span class="notify"><?php echo $form['category_id']->renderError()?></span>
							
							</label>
										
							<div class="clr"></div>
                                                        <label for="category-inp" style="display: <?php echo getVisibility($form['subcategory_id'])?>" id="subcat_row"> 
                                                          <span class="block"><?php echo __('Подкатегория') ?>:</span>
                                                          <?php echo getSubCategories($form['subcategory_id']->getValue(), $form['category_id']->getValue()) ?>                                                          
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
								<?php $class=($form['body']->hasError()) ? 'validate error' : ''; echo $form['body']->render(array('class' => $class)); ?>   
                                                           <span class="notify"><?php echo $form['body']->renderError() ?></span>
                                                          </label>
                                                           <div class="clr"></div>
							    <span class="notify"><?php echo __('не разрешается указывать <strong>ссылки</strong>, <strong>эл.адреса</strong>, <strong>телефоны</strong> в тексте или заглавии объявления')?></span> </label>
							<div class="clr"></div>
							<label for="price-inp">Цена:
                                                        <?php $class=($form['price']->hasError()) ? 'text validate error' : 'text'; echo $form['price']->render(array('class' => $class)) ?>    
                                                          <span class="notify"><?php echo $form['price']->renderError() ?></span>
							</label>
							<div class="clr"></div>
						       						
						<div id="file-surround" style="display: <?php if(!$item->isNew()) echo "'';"; else echo "none;";?>">
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
	                                                  <?php include_partial('sublocs', array('sublocs' => $sublocs, 'current' => $form['sublocation_id']->getValue())) ?>
	                                                </div>
							<span class="notify"><?php echo $form['sublocation_id']->renderError()?></span>
							</label>
							<div class="clr"></div>
						</div>
                                                <h3><?php echo __('Дополнительная информация')?>:</h3>
						<div class="notify contact">
							<label for="i1-inp" style="display: <?php echo getVisibility($form['milage_id'])?>" id="milage_row"> 
                                                                <span class="block"><?php echo __('Пробег (километраж)')?>:</span>
                                                                <?php echo $form['milage_id']->render(array('class' => 'custom')); ?>
                                                                <span class="notify"><?php echo $form['milage_id']->renderError()?></span>
							</label>
							<div class="clr"></div>
							<label style="display: <?php echo getVisibility($form['gearbox_id'])?>" id="gearbox_row" for="i2-inp"> 
                                                                <span class="block">Коробка передач:</span>
								<?php echo $form['gearbox_id']->render(array('class' => 'custom')); ?>
                                                                <span class="notify"><?php echo $form['gearbox_id']->renderError()?></span>
							</label>
							<div class="clr"></div>
							<label style="display: <?php echo getVisibility($form['yearmodel_id'])?>" id="yearmodel_row" for="i3-inp"> 
                                                                <span class="block"><?php echo __('год випуска')?></span>
                                                                <?php echo $form['yearmodel_id']->render(array('class' => 'custom')); ?>
                                                                <span class="notify"><?php echo $form['yearmodel_id']->renderError()?></span>
							</label>
							<div class="clr"></div>
							<label style="display: <?php echo getVisibility($form['fuel_id'])?>" id="fuel_row" for="i4-inp"> 
                                                                <span class="block"><?php echo __('Топливо')?>:</span>
							        <?php echo $form['fuel_id']->render(array('class' => 'custom')); ?>
                                                                <span class="notify"><?php echo $form['fuel_id']->renderError()?></span>	
							</label>
							<div class="clr"></div>
							<label style="display: <?php echo getVisibility($form['room_id'])?>" id="room_row" for="i4-inp"> 
                                                                <span class="block"><?php echo __('Количество комнат')?>:</span>
							        <?php echo $form['room_id']->render(array('class' => 'custom')); ?>
                                                                <span class="notify"><?php echo $form['room_id']->renderError()?></span>	
							</label>
							<div class="clr"></div>
                                                        <label style="display: <?php echo getVisibility($form['length'])?>" id="length_row" for="i4-inp"> 
                                                                <span class="block"><?php echo __('длина')?> (фут):</span>
							        <?php echo $form['length']->render(array('class' => 'text')); ?>
                                                                <span class="notify"><?php echo $form['length']->renderError()?></span>	
							</label>
							<div class="clr"></div>
                                                        <label style="display: <?php echo getVisibility($form['area'])?>" id="area_row" for="i4-inp"> 
                                                                <span class="block"><?php echo __('Площадь')?>:</span>
							        <?php echo $form['area']->render(array('class' => 'text')); ?>
                                                                <span class="notify"><?php echo $form['area']->renderError()?></span>	
							</label>
							<div class="clr"></div>
                                                        <label style="display: <?php echo getVisibility($form['rent'])?>" id="rent_row" for="i4-inp"> 
                                                                <span class="block">Квартплата:</span>
							        <?php echo $form['rent']->render(array('class' => 'text')); ?>
                                                                <span class="notify"><?php echo $form['rent']->renderError()?></span>	
							</label>
							<div class="clr"></div>
                                                        <label style="display: <?php echo getVisibility($form['street'])?>" id="street_row" for="i4-inp"> 
                                                                <span class="block"><?php echo __('Улица') ?>:</span>
							        <?php echo $form['street']->render(array('class' => 'text')); ?>
                                                                <span class="notify"><?php echo $form['street']->renderError()?></span>	
							</label>
							<div class="clr"></div>
                                                        <label style="display: <?php echo getVisibility($form['postalcode'])?>" id="postalcode_row" for="i4-inp"> 
                                                                <span class="block"><?php echo __('Почтовый индекс')?>:</span>
							        <?php echo $form['postalcode']->render(array('class' => 'text')); ?>
                                                                <span class="notify"><?php echo $form['postalcode']->renderError()?></span>	
							</label>
							<div class="clr"></div>                                                        
						</div>
						<div class="notify">
						<input type="submit" value="Подать объявление" class="btn add" name="<?php $name = ($item->isNew()) ? 'submitbtn' : 'check_ad'; echo $name;?>"/>
							<div class="clr"></div>
						</div>
                                           <?php echo $form['id'] ?>
					</form>
				</div>
			        <div id="thesidebar" class="sidebar add">
				   <?php include_partial('myimages_new_add', array('item' => $item)) ?>
	                        </div>
				<div class="clr"></div>
			</div>
              </div>

<?php use_javascript('head.min.js') ?>
<?php use_javascript('jquery-1.4.2.min.js') ?>
<?php use_javascript('jquery-ui-1.8.6.custom.min.js') ?>
<?php use_javascript('jquery.ui.selectmenu.js') ?>
<?php use_javascript('jquery-lightbox/jquery.lightbox-0.5.pack.js') ?>
<?php use_javascript('main.js') ?>
<?php use_javascript('http://vkontakte.ru/js/api/share.js?10') ?>
<?php use_javascript('jquery.jqia.selects.js') ?>
<?php use_javascript('create.js') ?>