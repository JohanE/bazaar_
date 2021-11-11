<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

  <!--[if lt IE 7]>
     <?php echo stylesheet_tag('ie6'); ?>
  <![endif]-->
<head>

<?php include_http_metas() ?>
<?php include_metas() ?>

<title>
  <?php if (!include_slot('title')): ?>
    InternetBazar.com.ua
  <?php endif; ?>
</title>

</head>
<body>

<?php echo $sf_content ?>

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
