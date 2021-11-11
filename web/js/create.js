$(document).ready(function()
{
    var style= $("#file-surround").attr('style');
    if(style && style.indexOf("none") == -1)
	$("#file-surround").effect("highlight", {}, 1500);


         // Delete image logic, extra images
      $('.delete').live('click', function(){ 	
        var imageId = $(this).prev()[0].value;
        var type = $(this).prev()[0].className;
        var formaction = $('form').attr('action');
        formaction = formaction.substring(0, formaction.indexOf("update"));
        formaction += "deleteImage";
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

    // Event for showing/hiding the "site" field
    $('#item_customertype_id').change(function(){ 
      var typeVal = $(this).val();       
      var formaction = $('form').attr('action');
      formaction = formaction.replace("update", "toggleSite");
       $.getJSON(
       formaction,
       {theid:typeVal},
        function(data){
         toggleSite(data);
        }                      
       );
    });	    

    $('#file-inp-btn').click(function(){       
      $('#theform').submit();    
    });  

    // Event to load handle change of category
    $('#item_category_id').change(function(){ 
      var catId = $(this).val();       
      var formaction = $('form').attr('action');
      formaction = formaction.replace("update", "categorySelector");
      var args = "catId="+catId;
      $.ajax({
	  type: "GET",
	  url: formaction,
	  data: args,
	  dataType: "script"
       });

    });	    

    // Event to load sublocations
    $('#item_location_id').change(function(){ 
      var locId = $(this).val();       
      var formaction = $('form').attr('action');
      formaction = formaction.replace("update", "displaySubLocation");
      var args = "id="+locId;
      $.ajax({
	type: "GET",
	url: formaction,
	data: args,
	dataType: "script"
        })
    });	    

});

function toggleDeleteImage(optionsDataArray) {
    var theDivId = optionsDataArray['toHide'];
    $('#'+theDivId).css("display", "none");
}

function toggleSite (optionsDataArray)
{
    $.each(optionsDataArray,function(key,optionData){
      if(optionData == 'business') {
	 $('#siterow').css("display", ""); 
	 $('#adname_default').css("display", "none"); 
	 $('#adname_business').css("display", "");
      } else {		
	 $('#siterow').css("display", "none");
	 $('#item_site').css("display", "");
	 $('#adname_default').css("display", "");
	 $('#adname_business').css("display", "none");
      }
    });
}