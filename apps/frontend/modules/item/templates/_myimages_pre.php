
<?php if($item != null) : ?>
<table>
<tr>
<td>
   <?php if($item->hasRegularImage()) : ?>
   <div class="images_headline"><?php echo __('Главное фото')?></div>
   <?php endif; ?>
	<div id="preview">
          <div id="mainImage" class="images_headline">
	    <img src ='<?php echo sfConfig::get('app_upload_dir') ?>/images/<?php echo $item->getRegularImage()->getPath() ?>'>
          </div>
        </div>
      </div>
</td>
</tr>
<tr>

<td>
      <?php if(count($item->getExtraImages()) > 0) : ?>
       <div class="images_headline"><?php echo __('Дополнительные фото')?></div>
      <?php endif; ?>
      <div class="images_headline">
       <ul class="imgprev" id="first">
       <?php foreach ($item->getExtraImages() as $image): ?>
        <li class="imgprev"><a href="<?php echo sfConfig::get('app_upload_dir') ?>/images/<?php echo $image->getPath() ?>"><img src ='<?php echo sfConfig::get('app_upload_dir') ?>/thumbnail/<?php echo $image->getPath() ?>'></a></li>
      <?php endforeach; ?>
       </ul>
      </div>
</td>

</tr>
</table>
<?php endif; ?>


 


