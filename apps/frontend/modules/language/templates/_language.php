<form action="<?php echo url_for('@change_language') ?>" method="post">
   <label for="language"><?php echo __('Выбрать язык')?>:</label>
  <?php echo $form['language'] ?>
  <?php echo $form->renderHiddenFields() ?>
  <input type="submit" value="ok">
</form>
