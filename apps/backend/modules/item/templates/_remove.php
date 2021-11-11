

<?php $item = $form->getObject() ?>

<div id="mainContent">
<br />

<form action="<?php echo url_for('item/listRemove2')?>" method="post">
  
	  <?php echo $form['id'] ?>

    Опционно прокомментировать, почему удалить<br />
    <textarea name="rejection_comment" cols="40" rows="4"></textarea>
    <br />
    <input type="submit" value="удалить">
<div>
  <?php echo form_tag_for($form, '@item') ?>

  </form>
</div>
