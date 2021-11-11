<html>
<body style="background-color: #FDF0DC;">

<?php slot('header') ?>

<?php end_slot() ?>


<div id="topdiv">
<a href="<?php echo url_for('@homepage') ?>"><img alt="internetbazar.com.ua" title="internetbazar.com.ua" src="/images/logga2_small.jpg"></a>
</div>
<div style="width: 700px;margin: 10px;"">
  <h2>Произошла ошибка (500)</h2>

Пожалуйста, свяжитесь с нами по адресу: <?php echo sfConfig::get('app_contact_mail')?><img src="/images/pic.gif" width="11" height="11">internetbazar.com.ua

<br />
<br />
  <h2>Виникла помилка (500)</h2>

Будь ласка, зв'яжіться з нами за адресою:  <?php echo sfConfig::get('app_contact_mail')?><img src="/images/pic.gif" width="11" height="11">internetbazar.com.ua

<br />
<p>
<a href="<?php echo url_for('@homepage') ?>"><?php echo __('Стартовая страница') ?></a>
</div>
<?php ?>

</html>
</body>