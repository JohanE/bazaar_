<?php use_helper('Form') ?>
<?php use_helper('Category') ?>
<?php use_javascript('head.min.js') ?>
<?php use_javascript('jquery-1.4.2.min.js') ?>
<?php use_javascript('jquery-ui-1.8.6.custom.min.js') ?>
<?php use_javascript('jquery.ui.selectmenu.js') ?>
<?php use_javascript('jquery-lightbox/jquery.lightbox-0.5.pack.js') ?>

<?php use_javascript('login') ?>

<?php $item = $form->getObject() ?>
<div id="wrapper">
			<p><?php echo __('Для того, чтобы изменить или удалить объявление введите пароль и нажмите "ОК".')?></p>
                        <form action="<?php echo url_for('@item_prechange?slug='.$item->getSlug()) ?>" method="post">			
                                <?php echo $form['slug'] ?>
				<div class="notify">
					<label class="left">Пароль:
                                                <span class="message"><?php echo $form['password_login']->renderError() ?></span>
                                                <?php echo $form['password_login']->render(array('class' => 'text')); ?>
					</label>
					<input type="submit" value="OK" class="btn small" />
                                        </form>
                                        <?php echo form_tag('item/forgotPasswd') ?>
                                          <input type="hidden" name="slug" id="slug" value="<?php echo $item->getSlug()?>">
					  <span class="message"><?php echo __('Вы забыли пароль? Нажмите кнопку "Отправить" и мы отправим Вам пароль на ваш ящик') ?></span>
					  <input id="forgot_passwd" type="button" value="<?php echo __('Отправить пароль')?>" class="btn" />
					  <div class="clr"></div>
                                          <div id="response_area" class="response_area" style="display: none"><?php echo __('Сообщение отправлено')?></div>
                                          <div id="error_send" style="display: none">
                                             <?php echo ErrorMsgHelper::getMailSendError()?>      
                                          </div>
                                        </form>
                                        <div id="indicator" style="display: none;"><img src="/images/indicator.gif"></div>
				</div>
			
		</div>