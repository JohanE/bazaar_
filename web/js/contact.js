$(document).ready(function()
{
    $("#indicator").bind("ajaxSend", function() {
          $(this).show();
        }).bind("ajaxComplete", function() {
	  $(this).hide();
	});

    // mail ad
    $('#send').click(function(){
       var sender_name  = $('#sender_name').val();
       var sender_email = $('#sender_email').val();
       var subject = $('#sender_subject').val();
       var textcontent = $('#textcontent').val();

       var formaction = $(this).parents('form').attr('action');
       formaction = formaction.replace("contactRegular", "contactMailAjax");
       $.getJSON(
       formaction,
       {sender_email:sender_email, sender_name:sender_name, subject:subject, text_content:textcontent},
        function(data){
         sendMail(data);
        }                      
       );       
    });

});


/* Logic for the mail ad action */
function sendMail (optionsDataArray) {
    $('#error_from_ad').css("display", "none");
    $('#error_email_ad').css("display", "none");
    $('#error_subject_ad').css("display", "none");
    $('#error_body_ad').css("display", "none");

 // loop through the error array (if there is one)
    // and take actions according to the content there , mailBody
    var errorCount = 0;
    $.each(optionsDataArray['error'],function(key,optionData){
      errorCount++;
      // display error msg if there was no name supplied
      if(key == 'sender_name') {        
	  $('#error_from_ad').css("display", "");
      }
      // display error if there was no email address supplied (or invalid address)
      if(key == 'sender_mail') {        
	  $('#error_email_ad').css("display", "");
      }     
      // display error if there was no body supplied
      if(key == 'mailBody') {        
	  $('#error_body_ad').css("display", "");
      }
      if(key == 'subject') {        
	  $('#error_subject_ad').css("display", "");
      }

      // display error msg in case of send problem
      if(key == 'send') {
	  $('#error_send_ad').css("display", ""); 
      }
    });
    
    // success, i.e there were nothing in the error array
    if(errorCount == 0) {	
	$('#response_area_ad').css("display", ""); 
	$('#error_send_ad').css("display", "none");
	$('#error_email_ad').css("display", "none");
	$('#error_from_ad').css("display", "none");
	$('#error_body_ad').css("display", "none");
	$('#error_subject_ad').css("display", "none");
	// clear values if success
	$('#sender_name').val("");
	$('#sender_email').val("");
	$('#sender_subject').val("");
	$('#textcontent').val("");
    }  

}



