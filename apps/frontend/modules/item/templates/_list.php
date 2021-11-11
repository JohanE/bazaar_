<?php if(count($itemList) > 0) : ?>
			<ul class="control">
				<li class="first">
                                  <?php if ($pager->haveToPaginate()): ?>			            
			            <?php include_partial('item/pagination',array('pager' => $pager, 'params' => $params)) ?>			
                                  <?php endif; ?>
				</li>
			   <li class="results"><?php echo __('Результатов')?> : <span><?php echo $pager->getNbResults() ?></span></li>
				<li class="dropdown"><?php echo __('Отображать по') ?>:
					<select class="custom" id="max_per_page" name="max_per_page">
			                   <option value="30" <?php if(isset($max_per_page) && $max_per_page == 30) echo "selected" ?> >30</option>
                                           <option value="60" <?php if(isset($max_per_page) && $max_per_page == 60) echo "selected" ?> >60</option>
                                           <option value="100" <?php if(isset($max_per_page) && $max_per_page == 100) echo "selected" ?> >100</option>      
					</select>
				</li>
			</ul>
                        <input type="hidden" name="sort" id="sorter" value="" /> 
                        <input type="hidden" name="show_images" id="showImages" value="" /> 

                        </form>
			<div class="clr"></div>
			<ul class="list-head">
				<li class="left date">Дата<a href="#" class="<?php if(isset($sort) && $sort=='1')echo 'sort desc'; else echo 'sort'; ?>" id="date_sort">asc</a></li>
			       <li class="image"><?php echo __('Изображение')?> 
				 <?php if (isset($params['show_images'])): ?>
                                  <a href="#" id="imagesshow" class="sort">asc</a> 				 
				 <?php else: ?>
                                  <a href="#" id="imageshide" class="sort desc">asc</a> 
                                 <?php endif; ?>
                               </li>
												    <li class="text"><?php echo __('Текст объявления')?></li>
				<li class="price">Цена<a href="#" class="<?php if(isset($sort) && $sort=='1')echo 'sort'; else echo 'sort desc'; ?>" id="price_sort">asc</a></li>
												    <li class="category"><?php echo __('Категория')?></li>
				<li class="brdr">&nbsp;</li>
				<li class="right place"><?php echo __('Место')?></li>
			</ul>
			<ul class="list">
                        <?php foreach ($itemList as $item): ?>
				<li class="<?php echo HtmlListHelper::Alternate('','bg'); ?>">
					<ul class="row">
						<li class="date"><?php echo DateHelper::getFormattedDate($item->getCreatedAt()) ?></span></li>

						<li class="image">
			                        <?php if(isImageVisible($params)) : ?> 
                                                   <?php if($item->hasRegularImage()) : ?> 
                                                     <img src="<?php echo sfConfig::get('app_upload_dir') ?>/thumbnail/<?php echo $item->getRegularImage()->getPath() ?>"  alt="фото" />
                                                   <?php endif; ?>
                                                <?php endif; ?>
                                                </li>
						<li class="text"><?php echo link_to($item->getTitle(), 'item_show', $item) ?></li>
						<li class="price"><?php if($item->getPrice() != 0) echo $item->getPrice() . '<span> грн.</span>'  ?> </li>
					        <li class="category"><?php echo HtmlListHelper::getCategoryName($item) ?></li>
 						<li class="place">
	                                          <?php echo $item->getLocation() ?>
						</li>
					</ul>
					<div class="clr"></div>
				</li>					
                        <?php endforeach; ?>
                        </ul>
			<div class="clr"></div>
                        <?php if ($pager->haveToPaginate()): ?>
			    <?php include_partial('item/pagination',array('pager' => $pager, 'params' => $params)) ?>
                        <?php endif; ?>
<?php else : ?>
  <div id="infoSection">
    <b><?php echo __('К сожалению ничего не найдено')?></b>
  </div>
<?php endif; ?>