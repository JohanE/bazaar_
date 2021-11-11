<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<?php include_http_metas() ?>
<?php include_metas() ?>

<?php echo stylesheet_tag('reset.css') ?>
<?php echo stylesheet_tag('ui-lightness/jquery-ui-1.8.6.custom.css') ?>
<?php echo stylesheet_tag('ui.selectmenu.css') ?>
<?php echo stylesheet_tag('/js/jquery-lightbox/css/jquery.lightbox-0.5.css') ?>

<?php echo stylesheet_tag('style.css'); ?>

<title>
  <?php if (!include_slot('title')): ?>
    InternetBazar.com.ua
  <?php endif; ?>
</title>

<!--[if IE 7]>
  <?php echo stylesheet_tag('ie'); ?>
<![endif]-->
<!--[if lt IE 7]>
  <?php echo stylesheet_tag('ie6'); ?>
<![endif]-->

</head>
<body>

<div id="page" class="pngfix">
	<div id="holder">
<?php if (!include_slot('header')): ?>
		<div id="header">
			<h1><a href="<?php echo url_for('@homepage') ?>">InternetBazar.com.ua</a></h1>
			<ul id="menu">
				<li><a href="<?php echo url_for('@homepage') ?>"><?php echo __('Главная') ?></a></li>
				<li><a href="<?php echo url_for('item/create') ?>"><?php echo __('Подать объявление') ?></a></li>
                                <li><a href="<?php echo url_for ('service/index') ?>"><?php echo __('Сервис') ?></a></li>
				<li class="brdr">&nbsp;</li>
				<li class="right"><a href="<?php echo url_for ('contact/index') ?>"><?php echo __('Контакты') ?></a></li>
			</ul>

                        <ul id="langs">
			   <li class="ru" title="По русски" alt="По русски"><a href="<?php echo url_for('@change_language') ?>?language=ru">ru</a></li>
			   <li class="ua"><a alt="українською" title="українською" href="<?php echo url_for('@change_language') ?>?language=uk">ua</a></li>
			</ul>
			
			<div class="clr"></div>
		</div>
<?php endif; ?>

<?php echo $sf_content ?>


     </div>
     <div id="footer"><span>&copy; 2009 - 2011 Internetbazar</span></div>
</div>

<div class="bottom pngfix"></div>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-9963441-1");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>
