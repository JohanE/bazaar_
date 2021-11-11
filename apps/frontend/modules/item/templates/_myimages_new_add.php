
                                        <h3><?php echo __('Прикрепленные изображения')?>:</h3>					
                                        <p><?php echo __('Вы можете загрузить')?> <span><?php echo SystemSetting::getMaxNumberOfImagesForAd()?></span> <?php echo __('изображения')?>:</p>
				      <?php if($item->hasRegularImage()) : ?>
                                         <ul>
                                           <li>
                                             <p><?php echo __('Главное фото') ?>:</p>
					     <div id="img0" class="holder"><a href="<?php echo sfConfig::get('app_upload_dir') ?>/images/<?php echo $item->getRegularImage()->getPath() ?>" class="lightbox"><img src="<?php echo sfConfig::get('app_upload_dir') ?>/thumbnail/<?php echo $item->getRegularImage()->getPath() ?>" alt=" " /></a>
                                                  <input type="hidden" class="regular" value="<?php echo $item->getRegularImage()->getId() ?>" />
                                                  <a href="#" class="delete">Удалить</a></div>
                                           </li>
                                          </ul>
                                         <div class="clr"></div>
				      <?php endif; ?>

                                      <?php if($item->hasExtraImages()) : ?>
                                         <ul>
                                           <li>
                                             <p><?php echo __('Дополнительные фото') ?>:</p>
                                           </li>
                                         </ul>
                                         <div class="clr"></div>
                                         <ul>      
                                   <?php  $counter=1; ?>  
				   <?php foreach ($item->getExtraImages() as $image): ?>
                                       <?php if($counter > 5) : ?>
                                         </ul><ul>
                                       <?php endif; ?>
                                    <li>
				      <div id="<?php echo "img".$counter; ?>" class="holder">
                                        <a href="<?php echo sfConfig::get('app_upload_dir') ?>/images/<?php echo $image->getPath() ?>" class="lightbox">
                                          <img src="<?php echo sfConfig::get('app_upload_dir') ?>/thumbnail/<?php echo $image->getPath() ?>" alt=" " /></a>
                                        <input type="hidden" class="delete_image" value="<?php echo $image->getId() ?>" />
                                        <a href="#" class="delete">Удалить</a>
                                      </div>

			            </li>
				       
                                     <?php $counter++; ?>
                                   <?php endforeach; ?>
                                         
		                         </ul>
                                     <?php endif; ?>