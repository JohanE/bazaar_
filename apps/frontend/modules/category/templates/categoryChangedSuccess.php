<?php $sf_context->getResponse()->setContentType('text/javascript'); 
?>
//clear subcat select box
$('#subcatselect').html('');

 // Add a first node for the selection of all subcats
<?php if (sizeof($subcategories) > 0) :?>
$("#subcatselect").selectmenu('disable'); 
$('#subcatselect').html('');
$('#subcatselect').append($("<option></option>").attr("value", "").text('<?php echo __('Выбрать категорию') ?>'));
  <?php foreach ($subcategories as $subcat) :?>
   var name = "<?php echo $subcat->getName() ?>";
   $('#subcatselect').append($("<option></option>").attr("value", '<?php echo $subcat->getId() ?>').text(name));				
  <?php endforeach; ?>
  $('#subcatselect').selectmenu('destroy').selectmenu();
<?php endif; ?>

<?php if (sizeof($subcategories) > 0) :?>
  $('#subcategorydiv').css("display", ""); 
<?php else: ?>
  $('#subcategorydiv').css("display", "none");
<?php endif; ?>

// dealing with price search from here on:

function clearSelects(){  
//clear selectboxes priceto and pricefrom and hide the price div
  $('#pricefrom').html('');
  $('#priceto').html('');
  $('#caryearmodelselectfrom').html('');
  $('#caryearmodelselectto').html('');
  $('#carmilagefrom').html('');
  $('#milageselectto').html('');
  $('#gearboxselect').html('');
  $('#fuelselect').html('');
  $('#apartroomfrom').html('');
  $('#apartroomto').html('');
  $('#apartareafrom').html('');
  $('#apartareato').html('');
}

function hideDivs(){
  $('#caryearmodel').css("display","none");
  $('#carmilage').css("display","none"); 
  $('#cargearbox').css("display","none");  
  $('#apartmentrooms').css("display","none");
  $('#apartmentarea').css("display","none");
}
<?php if(PriceHandler::isPriceComparisonCategory ($categoryId)) : ?>
  $('#pricesearch').css("display", "");
  clearSelects();

  $("#pricefrom").selectmenu('disable'); 
  $("#priceto").selectmenu('disable'); 

  $('#pricefrom').html('');
  $('#priceto').html('');

  $('#pricefrom').append($("<option></option>").attr("value", "").text('<?php echo __('Цена от') ?>'));
  $('#priceto').append($("<option></option>").attr("value", "").text('<?php echo __('Цена до') ?>'));

  <?php foreach ($priceListFrom as $price) :?>
   $('#pricefrom').append($("<option></option>").attr("value", '<?php echo $price->getTheValue() ?>').text('<?php echo $price->getTheName() ?>'));
  <?php endforeach; ?>
  <?php foreach ($priceListTo as $price) :?>
   $('#priceto').append($("<option></option>").attr("value", '<?php echo $price->getTheValue() ?>').text('<?php echo $price->getTheName() ?>'));
  <?php endforeach; ?>

  $('#priceto').selectmenu('destroy').selectmenu();
  $('#pricefrom').selectmenu('destroy').selectmenu();
  
   <?php if ($categoryName == "car-cat-val") : ?>
     hideDivs();
     $('#caryearmodel').css("display","none");
//$yearModelsFrom, $yearModelsTo

     $("#caryearmodelselectfrom").selectmenu('disable'); 
     $('#caryearmodelselectfrom').html('');
     $('#caryearmodelselectfrom').append($("<option></option>").attr("value", "").text('<?php echo __('Год выпуска от') ?>'));
     <?php foreach ($yearModelsFrom as $model) :?>
       $('#caryearmodelselectfrom').append($("<option></option>").attr("value", '<?php echo $model->getId() ?>').text('<?php echo $model->getName() ?>'));				
     <?php endforeach; ?>
     $('#caryearmodelselectfrom').selectmenu('destroy').selectmenu();

     $("#caryearmodelselectto").selectmenu('disable'); 
     $('#caryearmodelselectto').html('');
     $('#caryearmodelselectto').append($("<option></option>").attr("value", "").text('<?php echo __('Год выпуска до') ?>'));
     <?php foreach ($yearModelsTo as $model) :?>
       $('#caryearmodelselectto').append($("<option></option>").attr("value", '<?php echo $model->getId() ?>').text('<?php echo $model->getName() ?>'));				
     <?php endforeach; ?>
     $('#caryearmodelselectto').selectmenu('destroy').selectmenu();

     $('#caryearmodel').css("display","");


     $('#carmilage').css("display","");
// milageListFrom
     $("#carmilagefrom").selectmenu('disable'); 
     $('#carmilagefrom').html('');
     $('#carmilagefrom').append($("<option></option>").attr("value", "").text('<?php echo __('пробег от') ?>'));
     <?php foreach ($milageListFrom as $milage) :?>
       $('#carmilagefrom').append($("<option></option>").attr("value", '<?php echo $milage->getThevalue() ?>').text('<?php echo $milage->getThename() ?>'));				
     <?php endforeach; ?>
     $('#carmilagefrom').selectmenu('destroy').selectmenu();

     $("#carmilageto").selectmenu('disable'); 
     $('#carmilageto').html('');
     $('#carmilageto').append($("<option></option>").attr("value", "").text('<?php echo __('пробег до') ?>'));
     <?php foreach ($milageListTo as $milage) :?>
       $('#carmilageto').append($("<option></option>").attr("value", '<?php echo $milage->getThevalue() ?>').text('<?php echo $milage->getThename() ?>'));				
     <?php endforeach; ?>
     $('#carmilageto').selectmenu('destroy').selectmenu();

     $('#caryearmodel').css("display","");

     // gearbox stuff
     $("#gearboxselect").selectmenu('disable'); 
     $('#gearboxselect').html('');
     $('#gearboxselect').append($("<option></option>").attr("value", "").text('<?php echo __('Коробка передач') ?>'));
     <?php foreach ($gearBoxList as $box) :?>
       $('#gearboxselect').append($("<option></option>").attr("value", '<?php echo $box->getId() ?>').text('<?php echo $box ?>'));
     <?php endforeach; ?>
     $('#gearboxselect').selectmenu('destroy').selectmenu();

//
  $("#fuelselect").selectmenu('disable'); 
     $('#fuelselect').html('');
     $('#fuelselect').append($("<option></option>").attr("value", "").text('<?php echo __('Топливо') ?>'));
     <?php foreach ($fuelList as $fuel) :?>
       $('#fuelselect').append($("<option></option>").attr("value", '<?php echo $fuel->getId() ?>').text('<?php echo $fuel ?>'));
     <?php endforeach; ?>
     $('#fuelselect').selectmenu('destroy').selectmenu();
//    
     $('#cargearbox').css("display","");

  <?php elseif ($categoryName == "apartment-cat-val") : ?>     
     hideDivs();
     $('#apartmentrooms').css("display","");


     $("#apartroomfrom").selectmenu('disable'); 
     $('#apartroomfrom').html('');
     $('#apartroomfrom').append($("<option></option>").attr("value", "").text('<?php echo __('Количество комнат от') ?>'));
     <?php foreach ($roomListFrom as $room) :?>
       $('#apartroomfrom').append($("<option></option>").attr("value", '<?php echo $room->getId() ?>').text('<?php echo $room ?>'));				
     <?php endforeach; ?>
     $('#apartroomfrom').selectmenu('destroy').selectmenu();

     $("#apartroomto").selectmenu('disable'); 
     $('#apartroomto').html('');
     $('#apartroomto').append($("<option></option>").attr("value", "").text('<?php echo __('Количество комнат до') ?>'));
     <?php foreach ($roomListTo as $room) :?>
       $('#apartroomto').append($("<option></option>").attr("value", '<?php echo $room->getId() ?>').text('<?php echo $room ?>'));
     <?php endforeach; ?>
     $('#apartroomto').selectmenu('destroy').selectmenu();

       //area
     $('#apartmentarea').css("display","");
//
     $('#apartareafrom').html('');
     $('#apartareafrom').append($("<option></option>").attr("value", "").text('<?php echo __('Площадь от') ?>'));
     <?php foreach ($areaListFrom as $area) :?>
       $('#apartareafrom').append($("<option></option>").attr("value", '<?php echo $area->getThevalue() ?>').text('<?php echo $area->getThename() ?>'));
     <?php endforeach; ?>
     $('#apartareafrom').selectmenu('destroy').selectmenu();
//
     $('#apartareato').html('');
     $('#apartareato').append($("<option></option>").attr("value", "").text('<?php echo __('Площадь до') ?>'));
     <?php foreach ($areaListTo as $area) :?>
       $('#apartareato').append($("<option></option>").attr("value", '<?php echo $area->getThevalue() ?>').text('<?php echo $area->getThename() ?>'));
     <?php endforeach; ?>
     $('#apartareato').selectmenu('destroy').selectmenu();

  <?php else : ?> //Clear
   hideDivs();
  <?php endif; ?>

<?php else : ?>
//clear selectboxes priceto and pricefrom and hide the price div
  clearSelects();
  $('#pricesearch').css("display", "none");
  hideDivs();

<?php endif; ?>
