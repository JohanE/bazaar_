

<?php $item = $form->getObject() ?>

<div id="mainContent">
<br />

<form action="<?php echo url_for('item/listReject2')?>" method="post">
  
	  <?php echo $form['id'] ?>

    Опционно прокомментировать, почему отклонить здесь<br />
    <textarea name="rejection_comment" cols="40" rows="4"></textarea>
    <br />
    <input type="submit" value="Отклонить">
<div>
  <?php echo form_tag_for($form, '@item') ?>
<!--
<ul class="sf_admin_actions">
  <li class="sf_admin_action_approve">
   <a href="<?php echo url_for('item/listReject2?id='.$item->getId())?>">Reject</a>
  </li>
</ul>
-->
  </form>
</div>
