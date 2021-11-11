<?php if($images != null) : ?>
   <div><?php echo __('Главное фото')?></div>
    <?php foreach ($images as $image): ?>
	<div id="image">
          <div style="float:left">
	    <img src ='<?php echo sfConfig::get('app_upload_dir') ?>/thumbnail/<?php echo $image->getPath() ?>'>
          </div>
          <div style="float:left">
           <input type="hidden" class="regular" value="<?php echo $image->getId() ?>" />
           <a href="#" class="delete_image"><?php echo __('удалить') ?></a>
        </div>
      </div>
    <?php endforeach; ?>
<?php endif; ?>


 

 


