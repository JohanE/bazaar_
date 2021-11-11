<?php use_helper('Form') ?>
<?php use_javascript('head.min.js') ?>
<?php use_javascript('jquery-1.4.2.min.js') ?>
<?php use_javascript('jquery-ui-1.8.6.custom.min.js') ?>
<?php use_javascript('jquery.ui.selectmenu.js') ?>
<?php use_javascript('jquery-lightbox/jquery.lightbox-0.5.pack.js') ?>
<?php use_javascript('main.js') ?>
<?php use_javascript('http://vkontakte.ru/js/api/share.js?10') ?>
<?php use_javascript('jquery.jqia.selects.js') ?>
<?php use_javascript('contact') ?>


<div id="wrapper">
        <p><?php echo __('С помощью этой формы вы можете связаться непосредственно с нами и мы постараемся ответить вам в кратчайшие сроки')?></p>
          <?php echo form_tag('contact/contactRegular') ?>
				<div class="notify contact">
                                        <label><?php echo __('Ваше имя')?>:
						<input type="text" name="sender_name" id="sender_name" class="text" />
                                                <span class="notify" id="error_from_ad" style="display: none"><?php echo ErrorMsgHelper::getRequired()?></span>
					</label>
					<div class="clr"></div>
                                        <label><?php echo __('Ваш эл. адрес')?> <strong>*</strong>:
						<input type="text" class="text" name="sender_email" id="sender_email" />
                                                <span class="notify" id="error_email_ad" style="display: none"><?php echo ErrorMsgHelper::getInvalidEmail()?></span>
                                                <div class="clr"></div>
                                                <span class="notify">(<?php echo __('адрес используется для обратной связи с вами')?>)</span>
					</label>
					<div class="clr"></div>
                                        <label><?php echo __('Тема')?>:
						<input type="text" name="sender_subject" id="sender_subject" class="text" />
                                                <span class="notify" id="error_subject_ad" style="display: none"><?php echo ErrorMsgHelper::getRequired()?></span>
					</label>
					<div class="clr"></div>
                                        <label><?php echo __('Текст сообщения')?> <strong>*</strong>:
						<textarea rows="10" cols="10" name="mail_body" id="textcontent"></textarea>
                                                <span class="notify" id="error_body_ad" style="display: none"><?php echo ErrorMsgHelper::getRequired()?></span>
					</label>
					<div class="clr"></div>
                                        <div id="response_area_ad" class="response_area" style="display: none"><?php echo __('Сообщение отправлено')?></div>
                                        <div id="error_send_ad" class="response_area" style="display: none"><?php echo ErrorMsgHelper::getMailSendError()?></div>
                                        <div id="indicator" style="display: none;"><img src="/images/indicator.gif"></div>
					<input id="send" type="button" value="<?php echo __('Отправить сообщение')?>" class="btn" />
					<div class="clr"></div>
				</div>
			</form>
</div>





