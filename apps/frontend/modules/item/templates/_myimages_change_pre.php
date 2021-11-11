<?php use_helper('Javascript') ?>

<?php if($images != null) : ?>
    <div class="images_headline"><?php echo __('Дополнительные фото')?></div>

      <div class="images_headline">
    <?php foreach ($images as $image): ?>
       <ul class="imgprev" id="first">
        <li class="imgprev"><a href="<?php echo sfConfig::get('app_upload_dir') ?>/images/<?php echo $image->getPath() ?>"><img src ='<?php echo sfConfig::get('app_upload_dir') ?>/thumbnail/<?php echo $image->getPath() ?>'></a></li>
      <?php endforeach; ?>
       </ul>
      </div>
<?php endif; ?>

 

 


