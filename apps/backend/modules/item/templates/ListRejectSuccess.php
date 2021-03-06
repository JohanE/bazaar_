<?php use_helper('I18N', 'Date') ?>
<?php include_partial('item/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Отклонить объявление', array(), 'messages') ?></h1>

  <?php include_partial('item/flashes') ?>
  <div id="sf_admin_header">
    <?php include_partial('item/form_header', array('item' => $item, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>


  <div id="sf_admin_content">
    <?php include_partial('item/reject', array('item' => $item, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>

  </div>
  

  <div id="sf_admin_footer">
    <?php include_partial('item/form_footer', array('item' => $item, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>


</div>
