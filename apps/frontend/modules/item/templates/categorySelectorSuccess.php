<?php $sf_context->getResponse()->setContentType('text/javascript'); 
?>

//clear subcat field
$("#subcatselect").selectmenu('disable'); 
$('#item_subcategory_id').html('');

<?php if(sizeof($subcategories) > 0) : ?>
  $('#item_subcategory_id').append($("<option></option>").attr("value", "").text('<?php echo __('Выбрать') ?>'));

    <?php foreach ($subcategories as $subcat) :?>
     var name = "<?php echo $subcat->getName() ?>";
     $('#item_subcategory_id').append($("<option></option>").attr("value", '<?php echo $subcat->getId() ?>').text(name));				     
    <?php endforeach; ?>
   $('#item_subcategory_id').selectmenu('destroy').selectmenu();
   $('#subcat_row').css("display", ""); 
<?php else: ?>
  $('#subcat_row').css("display", "none");
<?php endif; ?>

function openCarFields()
{
  $('#milage_row').css("display", "");
  $('#gearbox_row').css("display", "");
  $('#yearmodel_row').css("display", "");
  $('#fuel_row').css("display", "");
}
function clearCarFields()
{

  $('#item_milage_id option:first').attr('selected', 'selected'); 
  $('#item_gearbox_id option:first').attr('selected', 'selected');
  $('#item_yearmodel_id option:first').attr('selected', 'selected');
  $('#item_fuel_id option:first').attr('selected', 'selected');
}

function closeCarFields()
{
  $('#milage_row').css("display", "none");
  $('#gearbox_row').css("display", "none");
  $('#yearmodel_row').css("display", "none");
  $('#fuel_row').css("display", "none");
}
function openBoatFields()
{
  $('#length_row').css("display", "");
}
function closeBoatFields()
{
  $('#length_row').css("display", "none");
}

function clearBoatFields()
{
  $('#item_length').val('');
}

function openApartFields()
{
  $('#room_row').css("display", "");
  $('#area_row').css("display", "");
  $('#rent_row').css("display", "");
  $('#street_row').css("display", "");
  $('#postalcode_row').css("display", "");
}
function closeApartFields()
{
  $('#room_row').css("display", "none");
  $('#area_row').css("display", "none");
  $('#rent_row').css("display", "none");
  $('#street_row').css("display", "none");
  $('#postalcode_row').css("display", "none");
}

function clearApartFields()
{
  $('#item_room_id option:first').attr('selected', 'selected');
  $('#item_area').val('');
  $('#item_rent').val('');
  $('#item_street').val('');
  $('#item_postalcode').val('');
}

function openHouseFields()
{
  $('#room_row').css("display", "");
  $('#area_row').css("display", "");
  $('#postalcode_row').css("display", "");
}

function closeHouseFields()
{
  $('#room_row').css("display", "none");
  $('#area_row').css("display", "none");
  $('#postalcode_row').css("display", "none");
}

function clearHouseFields()
{
  $('#item_room_id option:first').attr('selected', 'selected');
  $('#item_area').val('');
  $('#item_postalcode').val('');
}

function openMCFields() {
 $('#yearmodel_row').css("display", "");
}

function closeMCFields()
{
  $('#yearmodel_row').css("display", "none");
}

function clearMCFields()
{
  $('#item_yearmodel_id option:first').attr('selected', 'selected');
}

<?php if($categoryType == "car-cat-val") : ?>	
    //clear boat fields
    clearBoatFields();
    // close boat fields
    closeBoatFields();
    //apart
    clearApartFields();
    closeApartFields();
    // mc
    clearMCFields()
    closeMCFields();
    //house    
    clearHouseFields();
    closeHouseFields();

    openCarFields();

<?php elseif($categoryType == "motorcycle-cat-val") : ?>    
    //clear car fields
    clearCarFields();
    //Close car fields
    closeCarFields();
    //apart
    clearApartFields();
    closeApartFields();
//house    
    clearHouseFields();
    closeHouseFields();

    openMCFields();
<?php elseif($categoryType == "boat-cat-val") : ?>
    //clear car fields
    clearCarFields();
    //Close car fields
    closeCarFields();
    //apart
    clearApartFields();
    closeApartFields();
    // mc
    clearMCFields()
    closeMCFields();
//house    
    clearHouseFields();
    closeHouseFields();

    openBoatFields();
<?php elseif($categoryType == "house-cat-val") : ?>
    clearBoatFields();
    closeBoatFields();
    clearCarFields();
    closeCarFields();    
    // mc
    clearMCFields()
    closeMCFields();
//house    
    clearHouseFields();
    closeHouseFields();
//apart
    clearApartFields();
    closeApartFields();

    openHouseFields();
<?php elseif($categoryType == "apartment-cat-val") : ?>
    clearBoatFields();
    closeBoatFields();
    clearCarFields();
    closeCarFields();   
//apart
    clearApartFields();
    closeApartFields(); 
    // mc
    clearMCFields()
    closeMCFields();
//house    
    clearHouseFields();
    closeHouseFields();

    openApartFields();
<?php else : ?>
    clearBoatFields();
    closeBoatFields();
    clearCarFields();
    closeCarFields();
    clearApartFields();
    closeApartFields();
    // mc
    clearMCFields();
    closeMCFields();
//house    
    clearHouseFields();
    closeHouseFields();
<?php endif; ?>

