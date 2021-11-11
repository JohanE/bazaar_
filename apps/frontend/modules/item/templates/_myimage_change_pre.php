<?php use_helper('Javascript') ?>

<?php if($images != null) : ?>
    <div class="main_search"><?php echo __('Главное фото')?></div>
    <?php foreach ($images as $image): ?>
	<div id="image">
          <div style="float:left">
	    <img src ='<?php echo sfConfig::get('app_upload_dir') ?>/images/<?php echo $image->getPath() ?>'>
          </div>
          
      </div>
    <?php endforeach; ?>


<?php endif; ?>


 

 


