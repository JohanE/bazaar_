
<?php $item = $form->getObject() ?>




<div id="wrapper">
			<div id="product" class="checking">
				<div class="content">
                                        <h2><?php echo __('Проверка объявления')?></h2>
                                       
                                        <form action="<?php echo url_for('item/changeSaveItem'.(!$item->isNew() ? '?id='.$item->getId() : '')) ?>" method="post">

						<div class="notify contact">
                                                        <p>
                                                        <?php if($customerTypeId == CustomerType::privat) : ?>        
                                                           <strong><?php echo __('Ваше имя') ?>:</strong>
                                                        <?php elseif ($customerTypeId == CustomerType::business) : ?>
                                                           <strong><?php echo __('Ваша  фирма') ?>:</strong>
                                                        <?php endif; ?>     
                                                        <span><?php echo $item->getName() ?></span></p>
							<div class="clr"></div>
							<p><strong>Контактный телефон:</strong><span><?php echo $item->getPhone() ?></span></p>
                                                   <?php if($item->getSite() != "" ) : ?>
                                                     <div class="clr"></div>
                                                        <p><strong>Сайт:</strong><span><?php echo $item->getSite() ?></span></p>
							<div class="clr"></div>
                                                   <?php endif; ?>        
							<p><strong>Ваш Email:</strong><span><?php echo $item->getEmail() ?></span></p>
							<div class="clr h"></div>
                                                        <p><strong><?php echo __('Тип сделки')?>:</strong><span><?php echo $item->getMode() ?></span></p>
							<div class="clr"></div>

                                                        <p><strong><?php echo __('Категория')?>:</strong><span><?php echo $item->getCategory() ?></span></p>
							<div class="clr"></div>
                                                        <?php if ($item->getSubCategory()): ?>
                                                        <p><strong><?php echo __('Подкатегория') ?>:</strong><span><?php echo $item->getSubCategory() ?></span></p>
                                                        <?php endif; ?>        
							<div class="clr"></div>
                                                        <p><strong><?php echo __('Цена')?>:</strong><span><?php echo $item->getPrice() ?> Грн.</span></p>
							<div class="clr h"></div>
                                                        <p><strong><?php echo __('Заголовок')?>:</strong><span><?php echo $item->getTitle() ?></span></p>
							<div class="clr"></div>
                                                        <p><strong><?php echo __('Текст объявления')?>:</strong><span><?php echo nl2br($item->getBody()) ?></span></p>
							<div class="clr h"></div>
							<p><strong>Область:</strong><span><?php echo $item->getLocation() ?></span></p>
							<div class="clr"></div>
                                                        <p><strong><?php echo __('Город')?>:</strong><span><?php echo $item->getSubLocation() ?></span></p>
							<div class="clr h"></div>
						</div>
						<div class="line"></div>
						<div class="notify contact no-margin light">
							<div class="left">
                                                               <?php if ($item->getYearModel()): ?>
								 <p><strong><?php echo __('год випуска')?>:</strong><span><?php echo $item->getYearModel() ?></span></p>
								 <div class="clr"></div>
                                                               <?php endif; ?>  
                                                               <?php if ($item->getFuel()): ?>
								 <p><strong><?php echo __('Топливо')?>:</strong><span><?php echo $item->getFuel() ?></span></p>
								 <div class="clr"></div>
                                                               <?php endif; ?>
                                                               <?php if ($item->getLength()): ?>
								 <p><strong><?php echo __('длина')?>:</strong><span><?php echo $item->getLength() ?></span></p>
								 <div class="clr"></div>
                                                               <?php endif; ?>       
                                                               <?php if ($item->getRoom()): ?>
								 <p><strong><?php echo __('Количество комнат')?>:</strong><span><?php echo $item->getRoom() ?></span></p>
								 <div class="clr"></div>
                                                               <?php endif; ?>       
                                                               <?php if ($item->getArea()): ?>
								 <p><strong><?php echo __('Площадь')?>:</strong><span><?php echo $item->getArea() ?></span></p>
								 <div class="clr"></div>
                                                               <?php endif; ?>       
                                                               <?php if ($item->getRent()): ?>
								 <p><strong>Квартплата:</strong><span><?php echo $item->getRent() ?></span></p>
								 <div class="clr"></div>
                                                               <?php endif; ?>       
							</div>
							<div class="right">
                                                                <?php if ($item->getMilage()): ?>
								  <p><strong><?php echo __('Пробег (километраж)')?>:</strong><span><?php echo $item->getMilage() ?> км.</span></p>
								  <div class="clr"></div>
                                                                <?php endif; ?>  
                                                                <?php if ($item->getGearbox()): ?>
								  <p><strong>Коробка передач:</strong><span><?php echo $item->getGearbox() ?></span></p>
								  <div class="clr"></div>
                                                                <?php endif; ?>  
                                                                <?php if ($item->getStreet()): ?>
								  <p><strong><?php echo __('Улица') ?>:</strong><span><?php echo $item->getStreet() ?></span></p>
								  <div class="clr"></div>
                                                                <?php endif; ?>  
                                                                <?php if ($item->getPostalcode()): ?>
								  <p><strong><?php echo __('Почтовый индекс')?>:</strong><span><?php echo $item->getPostalcode() ?></span></p>
								  <div class="clr"></div>
                                                                <?php endif; ?>  
							</div>
							<div class="clr h"></div>
						</div>
						<div class="clr"></div>
						<div class="line"></div>
						<div class="notify contact no-margin">


							<div class="clr h"></div>
                                                        <input type='button' class="btn add-2" value="<?php echo __('Изменить объявление')?>" onClick="location.href='<?php echo url_for('item/change?id='.$currentId)?>'">
                                                        <input type="submit" class="btn" value="<?php echo __('Подать объявление') ?>" name="submitbtn" />          							
						 </div>
					</form>
				</div>
				<div class="sidebar add checking">
   <?php include_partial('myimages_new_change_preview', array('image' => $imgRegular, 'images' => $imgArrayExtra)) ?>	   
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