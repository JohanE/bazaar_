<ul class="pager">
  <li alt="<?php echo __('Предыдущая страница')?>" title="<?php echo __('Предыдущая страница') ?>">
  <a href="<?php echo url_for('item')?>?page=<?php echo $pager->getPreviousPage() .  getUrl($params)?>" class="prev"><?php echo __('Предыдущая страница')?></a>
</li>
  <?php foreach ($pager->getLinks() as $page): ?>
    <?php if ($page == $pager->getPage()): ?>
       <li><span><?php echo $page?></span></li>
    <?php else: ?>
       <li><a href="<?php echo url_for('item')?>?page=<?php echo $page.  getUrl($params)?>"><?php echo $page ?></a></li>
    <?php endif; ?>

  <?php endforeach; ?>
  <li title="<?php echo __('Следующая страница')?>" alt="<?php echo __('Следующая страница')?>"><a href="<?php echo url_for('item')?>?page=<?php echo $pager->getNextPage() .  getUrl($params)?>" class="next">next</a></li>
</ul>

 