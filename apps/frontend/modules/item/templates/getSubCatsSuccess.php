<?php $sf_context->getResponse()->setContentType('text/javascript'); 
?>
alert('hej');
alert('script: <?php echo sizeof($subcategories) ?>');
alert($('subcategory_id').length);


for(var count = $('subcategory_id').options.length - 1; count >= 0; count--)
{
  $('subcategory_id').options[count] = null;
}

var x=document.createElement('option');
x.text = "<?php echo __('Выбрать') ?>";
try {
	$('subcategory_id').add(x,null); //standard      
} catch(ex) { 
	$('subcategory_id').add(x); // IE only
}  

<?php if(sizeof($subcategories) > 0) : ?>
	
	<?php foreach ($subcategories as $subcat) :?>
        var y=document.createElement('option');
        y.text = "<?php echo htmlentities($subcat->getName(), ENT_QUOTES, 'UTF-8' ) ?>";
       
        try
    	{
    		$('subcategory_id').add(y,null); //standard   
    	}
  		catch(ex)
    	{
    		$('subcategory_id').add(y); // IE only
    	}     
	<?php endforeach; ?>
//$('subcat_row').style.display = '';
<?php else: ?>
//$('subcat_row').style.display = 'none';
<?php endif; ?>

