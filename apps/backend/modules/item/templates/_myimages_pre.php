
<?php if($item != null) : ?>
<table>
<tr>
<td>
    Фото
	<div id="preview">
          <div style="float:left">
            <?php if($item->hasRegularImage()) :?>
	      <img src ='<?php echo sfConfig::get('app_upload_dir') ?>/images/<?php echo $item->getRegularImage()->getPath() ?>'>
            <?php endif; ?>
          </div>
        </div>
      </div>
</td>
</tr>
<tr>
<td>
      <div class="images_headline">Extra Images</div>
      <div class="images_headline">
      <?php foreach ($item->getExtraImages() as $image): ?>
	<div class="image">
          <div style="float:left">
           <a href='<?php echo sfConfig::get('app_upload_dir') ?>/images/<?php echo $image->getPath() ?>'>
	    <img src ='<?php echo sfConfig::get('app_upload_dir') ?>/thumbnail/<?php echo $image->getPath() ?>'>
           </a>
          </div>
          
        </div>
      
      <?php endforeach; ?>
      </div>
</td>
</tr>
</table>
<?php endif; ?>


 

 


