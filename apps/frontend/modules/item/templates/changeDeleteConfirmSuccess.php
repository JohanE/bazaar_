<?php use_helper('Javascript') ?>
<?php use_helper('Category') ?>

<?php $item = $form->getObject() ?>

<div id="wrapper">
   <p><?php echo __('Вы действительно хотите удалить объявление')?>?</p>
      <form action="<?php echo url_for('item/changeDelete?id='.$item->getId()) ?>" method="post">
      <div class="notify"><a href="<?php echo url_for('item/change?id='.$item->getId())?>" class="back"><?php echo __('Назад')?></a>
		    <input type="submit" value="<?php echo __('Удалить объявление')?>" class="btn" />
		    <div class="clr"></div>
	      </div>
      </form>
</div>
