$(document).ready(function()
{

    $("#indicator").bind("ajaxSend", function() {
          $(this).show();
        }).bind("ajaxComplete", function() {
	  $(this).hide();
	});

    // mail ad
    $('#forgot_passwd').click(function(){
       var slug  = $('#slug').val();
       var formaction = $(this).parents('form').attr('action');
       $.getJSON(
       formaction,
       {slug:slug},
        function(data){
         executeRequest(data);
        }                      
       );
       
    });

});

/* Logic for the mail ad action */
function executeRequest (optionsDataArray) {
    $('#error_send').css("display", "none");
    $('#response_area').css("display", "none");

    // loop through the error array (if there is one)
    // and take actions according to the content there
    var errorCount = 0;
    $.each(optionsDataArray['error'],function(key,optionData){

      // display error msg if there was no name supplied
      if(key == 'generic') {        	  
	  errorCount++;
	  $('#error_send').css("display", "");
      }
    });    
    // success, i.e there were nothing in the error array
    if(errorCount == 0) {	
	$('#response_area').css("display", ""); 
    }  

}



