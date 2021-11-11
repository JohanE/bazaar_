<?php $sf_context->getResponse()->setContentType('text/javascript'); ?>

$("#item_sublocation_id").selectmenu('disable'); 
$('#item_sublocation_id').html('');
$('#item_sublocation_id').append($("<option></option>").attr("value", "").text('<?php echo __('Выбрать') ?>'));
<?php foreach ($sublocations as $subloc) :?>
var name = "<?php echo $subloc->getName() ?>";
$('#item_sublocation_id').append($("<option></option>").attr("value", '<?php echo $subloc->getId() ?>').text(name));				
<?php endforeach; ?>
$('#item_sublocation_id').selectmenu('destroy').selectmenu();