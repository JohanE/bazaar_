<?php $sf_context->getResponse()->setContentType('text/javascript'); 
?>
<?php if($isMailAddressError || $isMailSendError || $isFromMissing || $isBodyMissing || $isSubjectMissing) : ?>
  <?php if($isFromMissing) : ?>
    $('error_from_ad').style.display = '';
  <?php else: ?>
    $('error_from_ad').style.display = 'none';
  <?php endif; ?>
  <?php if($isMailAddressError) : ?>
    $('error_email_ad').style.display = '';
  <?php else: ?>
    $('error_email_ad').style.display = 'none';
  <?php endif; ?>
  <?php if($isBodyMissing) : ?>
    $('error_body_ad').style.display = '';
  <?php else: ?>
    $('error_body_ad').style.display = 'none';
  <?php endif; ?>

  <?php if($isSubjectMissing) : ?>
    $('error_subject_ad').style.display = '';
  <?php else: ?>
    $('error_subject_ad').style.display = 'none';
  <?php endif; ?>

  <?php if($isMailSendError) : ?>
    $('error_send_ad').style.display = '';
  <?php else: ?>
    $('error_send_ad').style.display = 'none';
  <?php endif; ?>
<?php else: ?>
  $('response_area_ad').style.display = '';
  $('error_send_ad').style.display = 'none';
  $('error_email_ad').style.display = 'none';
  $('error_from_ad').style.display = 'none';
  $('error_body_ad').style.display = 'none';
  $('error_subject_ad').style.display = 'none';
  // clear values if success
  $('sender_name').value = '';
  $('sender_email').value = '';
  $('sender_subject').value = '';
  $('textcontent').value = '';
<?php endif; ?>



