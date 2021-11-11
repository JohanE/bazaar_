<?php use_helper('Form') ?>
<?php use_helper('Category') ?>
<?php slot(
	   'title',$item->getTitle().', '.$item->getLocation()->getName().', '.$item->getSubLocation())
?>

<div id="banner">
			<ul>
				<li class="left">
					<p>430 x 100</p>
					<p> Здесь могла быть ваша реклама!</p>
				</li>
				<li class="right">
					<p>430 x 100</p>
					<p> Здесь могла быть ваша реклама!</p>
				</li>
			</ul>
			<div class="clr"></div>
</div>

<div id="wrapper">
			<div id="product">
				<h2><?php echo $item->getTitle() ?></h2>
				<p class="price">Цена: <span><?php echo $item->getPrice() ?></span> грн.</p>
                                <p><strong><?php echo __('Опубликовано')?>:</strong> <?php echo DateHelper::getFormattedDate($item->getCreatedAt()) ?></p>
                                <p><strong><?php echo __('Область')?>:</strong> <?php echo $item->getLocation() ?></p>
                                <p><strong><?php echo __('Категория')?>:</strong> <?php echo $item->getCategory() ?></p>
				<div class="content">
                                <?php if($item->hasRegularImage()) : ?>                                          
                                  <img alt="<?php echo $item->getTitle() ?>" src ='<?php echo sfConfig::get('app_upload_dir') ?>/images/<?php echo $item->getRegularImage()->getPath() ?>' />
                                <?php endif; ?>
                                </div>
				<div class="sidebar">
                                   <?php include_partial('myimages_new_show', array('item' => $item)) ?>
				</div>
				<div class="clr"></div>
				<div class="left">
                                        <p><strong><?php echo __('Текст объявления')?>:</strong></p>
					<p><?php echo nl2br ($item->getBody()) ?></p>
				</div>
				<div class="right">
					<div class="left">
						<p><strong><?php echo __('Тип сделки')?>:</strong><span><?php echo $item->getMode() ?></span></p>
                                                <p><strong><?php echo __('Расположение')?>:</strong><span>г. <?php echo $item->getSubLocation() ?></span></p>
                                                <?php if($item->getYearModel() != null) : ?>        
                                                   <p><strong><?php echo __('Год выпуска')?>:</strong><span><?php echo $item->getYearmodel() ?></span></p>
                                                <?php endif; ?>
                                                <?php if($item->getFuel() != null) : ?>        
                                                   <p><strong><?php echo __('Топливо')?>:</strong><span><?php echo $item->getFuel() ?></span></p>
                                                <?php endif; ?>
                                                
                                                <?php if($item->getArea() != null) : ?>        
                                                   <p><strong><?php echo __('Площадь')?>:</strong> <?php echo $item->getArea() ?> m²</p>
                                                <?php endif; ?>

                                                <?php if($item->getRoom() != null) : ?>        
                                                    <p><strong><?php echo __('Количество комнат')?>:</strong> <?php echo $item->getRoom() ?></p>
                                                <?php endif; ?>    

					</div>
					<div class="right">
                                           <?php if($item->getLength() != null) : ?>        
                                              <p><strong><?php echo __('длина')?>:</strong> <?php echo $item->getLength() ?> </p>
                                           <?php endif; ?>

                                           <?php if($item->getStreet() != null) : ?>        
                                               <p><strong><?php echo __('Улица')?>:</strong> <?php echo $item->getStreet() ?></p>
                                           <?php endif; ?>

                                           <?php if($item->getRent() != null) : ?>        
                                              <p><strong>Квартплата:</strong> <?php echo $item->getRent() ?></p>
                                           <?php endif; ?>

                                           <?php if($item->getPostalcode() != null) : ?>        
                                              <p><strong><?php echo __('Почтовый индекс')?>:</strong> <?php echo $item->getPostalCode() ?></p>
                                           <?php endif; ?>

                                           <?php if($item->getSubCategory() != null && !SubCategory::containsSpecialSubcategory($item->getSubCategory()->getName())) : ?>       
                                               <p><strong><?php echo __('Категория') ?>: </strong><?php echo $item->getSubCategory()->getName() ?></p>	
                                           <?php endif; ?>
  
                                           <?php if($item->getMilage() != null) : ?>        
                                             <p><strong><?php echo __('Пробег')?>:</strong><span><?php echo $item->getMilage() ?> км.</span></p>
                                           <?php endif; ?>
                                           <?php if($item->getGearbox() != null) : ?>        
                                             <p><strong><?php echo __('Коробка передач')?>:</strong><span><?php echo $item->getGearbox() ?></span></p>
                                           <?php endif; ?>
					</div>
					<div class="clr"></div>
                                        <p><a href="<?php echo url_for('@item_login?slug='.$item->getSlug()) ?>" class="notify"><?php echo __('Изменить, удалить или продлить ваше объявление')?></a></p>
				</div>
				<div class="clr"></div>
				<div id="contact">
					<div class="contact">
                                        <?php if($item->getCustomerType()->getId() == CustomerType::privat) : ?>        
                                           <h4><?php echo __('Контактное лицо')?>:</h4>
                                        <?php elseif ($item->getCustomerType()->getId() == CustomerType::business) : ?>
                                           <h4><?php echo __('фирма')?>:</h4>
                                        <?php endif; ?>
						<p class="info"><?php echo $item->getPhone() ?> (<?php echo $item->getName() ?>)</p>
						<ul class="share">
							<li><script type="text/javascript"><!--
							document.write(VK.Share.button(false,{type: "round", text: "Сохранить"}));
						--></script> </li>
							<li class="right"><a target="_blank" class="mrc__plugin_like_button" href="http://connect.mail.ru/share" data-mrc-config="{'type' : 'button', 'width' : '85'}">Нравится</a> 
								<script src="http://cdn.connect.mail.ru/js/loader.js" type="text/javascript" charset="UTF-8"></script> </li>
						</ul>
					</div>
					<div class="author">
						<h4><a href="#" class="showhide">Написать автору</a></h4>
                                                <?php echo form_tag('item/mailAdAjax') ?>
                                                    <input type="hidden" name="id" value="<?php echo $item->getSlug()?>" />
							<div class="notify contact">
								<label><?php echo __('Ваше имя')?>:
									<input type="text" id="sender_name" class="text" />
                                                                    <span class="show_error" style="display: none;" id="error_from_ad">
                                                                      <?php echo ErrorMsgHelper::getRequired()?>
                                                                    </span>
								</label>
								<div class="clr"></div>
                                                                <label><?php echo __('Ваш электронный адрес')?><strong>*</strong>:
									<input id="sender_email" type="text" class="text" />
                                                                        <span class="show_error" style="display: none;" id="error_email_ad">
                                                                          <?php echo ErrorMsgHelper::getInvalidEmail()?>
                                                                        </span>
								</label>
								<div class="clr"></div>
                                                                <label><?php echo __('Текст')?> <strong>*</strong>:
									<textarea id="mailbody" rows="10" cols="10"></textarea>
								</label>
                                                                
								<div class="clr"></div>
                                                                <div id="indicator" style="display: none;"><img alt="indicator" src="/images/indicator.gif" /></div>
                                                                <div id="response_area_ad" class="response_area" style="display: none"><?php echo __('Сообщение отправлено')?></div>
                                                                <div id="error_send_ad" class="response_area" style="display: none;" style="display: none"><?php echo ErrorMsgHelper::getMailSendError()?></div>
                                                                <input class="btn middle" type="button" id="send_ad" value="<?php echo __('Отправить') ?>" />          

								<div class="clr"></div>
							</div>
						</form>
					</div>
					<div class="friends">
                                                <h4><a href="#" class="showhide"><?php echo __('Посоветовать другу')?></a></h4>	
                                                <?php echo form_tag('item/mailFriendJson') ?>
							<div class="notify contact">
								<label><?php echo __('Ваше имя')?>:
                                                                        <input type="text" id="friend" class="text" />
								</label>
								<div class="clr"></div>
                                                                <label><?php echo __('Е-мейл вашего друга') ?> <strong>*</strong>:
                                                                        <input type="text" id="mailto" name="mailto" class="text" />
                                                                        <span class="show_error" style="display: none;" id="error_email">
                                                                          <?php echo ErrorMsgHelper::getInvalidEmail()?>
                                                                        </span>
								</label>
                                                                <div class="clr"></div>
                                                                <input class="btn middle" type="button" id="send_friend" value="<?php echo __('Отправить') ?>" />          

                                                                <div id="error_send" class="response_area" style="display: none;" style="display: none"><?php echo ErrorMsgHelper::getMailSendError()?></div>
                                                                <div id="response_area" class="response_area" style="display: none"><?php echo __('Сообщение отправлено')?></div>
                                                                <div id="indicator2" style="display: none;"><img alt="indicator" src="/images/indicator.gif" /></div>
								
							</div>
                                                        <input type="hidden" name="id" value="<?php echo $item->getSlug()?>" />

                                                        
                                                        
						</form>
					</div>
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
<?php use_javascript('show') ?>




