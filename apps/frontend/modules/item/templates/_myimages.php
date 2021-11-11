<?php if($images != null) : ?>
    <div class="images_headline"><?php echo __('Дополнительные фото')?></div>
    <?php  $counter=2; ?>
    <?php foreach ($images as $image): ?>
	<div class="extraimage">
          <div class="actual_image">
	    <img src ='<?php echo sfConfig::get('app_upload_dir') ?>/thumbnail/<?php echo $image->getPath() ?>'>
          </div>
          <div  style="float:left">
           <input type="hidden" class="extra" value="<?php echo $image->getId() ?>" />
           <a href="#" class="delete_image"><?php echo __('удалить') ?></a>
        </div>
      </div>
    <?php $counter++; ?>
    <?php endforeach; ?>
<?php endif; ?>

 

 


