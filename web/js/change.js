$(document).ready(function()
{

   $("#indicator").bind("ajaxSend", function() {
          $(this).show();
        }).bind("ajaxComplete", function() {
	  $(this).hide();
	});

    // mail ad
    $('#prolong').click(function(){
       var item_id  = $('#item_id').val();
       var formaction = $(this).parents('form').attr('action');
       formaction = formaction.replace("changePost", "prolongItem");
       $.getJSON(
       formaction,
       {item_id:item_id},
        function(data){
          prolongAd(data);
        }                      
       );
       
    });

    $('#file-inp-btn').click(function(){       
      $('#theform').submit();    
    }); 

  // Event to load sublocations
    $('#item_location_id').change(function(){ 
      var locId = $(this).val();       
      var formaction = $('form').attr('action');

      formaction = formaction.substring(0, formaction.indexOf("changePost"));
      formaction += "displaySubLocation";
      var args = "id="+locId;
      $.ajax({
	type: "GET",
	url: formaction,
	data: args,
	dataType: "script"
        })
    });	     

  // Delete image logic, extra images
    $('.delete').live('click', function(){ 
      var imageId = $(this).prev()[0].value;
      var type = $(this).prev()[0].className;
      var formaction = $('form').attr('action');
      formaction = formaction.substring(0, formaction.indexOf("changePost"));
      formaction += "deleteImageChange";
      var targetDiv = "#thesidebar";
      var idToUpdate = $(this).parent()[0].id;
        $.getJSON(
         formaction,
	 {imageid:imageId,divId:idToUpdate},
          function(data){
            toggleDeleteImage(data);
          }                      
         );
      
    });	    

});

function toggleDeleteImage(optionsDataArray) {
    var theDivId = optionsDataArray['toHide'];
    $('#'+theDivId).css("display", "none");
}

/* Logic for the mail ad action */
function prolongAd (optionsDataArray) {
    // loop through the error array (if there is one)
    // and take actions according to the content there
    var errorCount = 0;
    $.each(optionsDataArray['error'],function(key,optionData){
      errorCount++;
      // display error msg in case of send problem
      if(key == 'internal') {
	  $('#error_prolong_ad').css("display", ""); 
      }
    });
    
    // success, i.e there were nothing in the error array
    if(errorCount == 0) {	
	var validUntil = optionsDataArray['data']['result'];
	$('#error_prolong_ad').css("display", "none");
	$('#response_area_ad').css("display", ""); 
	$('#response_area_ad').append(validUntil);
    }  

}
