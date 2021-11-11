<ul>
                                   <?php  $counter=1; ?>  
				   <?php foreach ($item->getExtraImages() as $image): ?>
                                    <li>
				      <div id="<?php echo "img".$counter; ?>" class="holder">
                                        <a href="<?php echo sfConfig::get('app_upload_dir') ?>/images/<?php echo $image->getPath() ?>" class="lightbox">
                                          <img src="<?php echo sfConfig::get('app_upload_dir') ?>/thumbnail/<?php echo $image->getPath() ?>" alt=" " /></a>                                                                                
                                      </div>

			            </li>
                                       <?php if($counter > 5) : ?>
                                         </ul><ul>
                                       <?php endif; ?>

				       
                                     <?php $counter++; ?>
                                   <?php endforeach; ?>
                                         
</ul>