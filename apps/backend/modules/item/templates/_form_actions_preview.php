<ul class="sf_admin_actions">
<?php if ($form->isNew()): ?>
  <?php echo $helper->linkToDelete($form->getObject(), array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',
  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
  <?php echo $helper->linkToList(array(  'params' =>   array(  ),  'class_suffix' => 'list',  'label' => 'Cancel',)) ?>
  <?php echo $helper->linkToSave($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save',  'label' => 'Save',)) ?>
  <?php echo $helper->linkToSaveAndAdd($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save_and_add',  'label' => 'Save and add',)) ?>
<?php else: ?>
  <li class="sf_admin_action_approve">
<?php if (method_exists($helper, 'linkToApprove')): ?>
  <?php echo $helper->linkToApprove($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'approve','label' => 'Approve',)) ?>
<?php else: ?>
   <?php echo link_to(__('одобрять'), 'item/ListApprove?id='.$item->getId(), array(), 'messages') ?>
<?php endif; ?>
  </li>
  <li class="sf_admin_action_reject">
<?php if (method_exists($helper, 'linkToReject')): ?>
  <?php echo $helper->linkToReject($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'reject',  'label' => 'Reject',)) ?>
<?php else: ?>
    <?php echo link_to(__('отклонить'), 'item/ListReject?id='.$item->getId(), array(), 'messages') ?>
<?php endif; ?>
  </li>
  <li class="sf_admin_action_remove">  
    <?php echo link_to(__('Удалить объявление'), 'item/ListRemove?id='.$item->getId(), array(), 'messages') ?>
  </li>  
<?php endif; ?>
</ul>

