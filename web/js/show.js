$(document).ready(function()
{
    $("#indicator2").bind("ajaxSend", function() {
          $(this).show();
        }).bind("ajaxComplete", function() {
	  $(this).hide();
	});

    $("#indicator").bind("ajaxSend", function() {
          $(this).show();
        }).bind("ajaxComplete", function() {
	  $(this).hide();
	});

    // Change image logic
    $('.extraImage').each(function(){
      var current = this;
       this.onclick = function(event) {
       // Get the image url to be changed into, grap its path
       // and put this path as an image into mainImage div 
	   var theimage = $(this).find('img:first')[0];
	   var temp = new Array();
	   var imageSrc = theimage.src;
	   temp = imageSrc.split('/uploads/thumbnail');
	   if(temp[1]){
	     var newImage ="<img src='/uploads/images/"+temp[1]+"' />";
	     $('#mainImage').html(newImage);       
	   }       
       }
    });

    // mail ad
    $('#send_ad').click(function(){
       var sender_name  = $('#sender_name').val();
       var sender_email = $('#sender_email').val();
       var mail_body = $('#mailbody').val();
       var theid = $('input[type=hidden]').val();
       // collect the form action to be uses later 
       var formaction = $(this).parents('form').attr('action');
       
       $.getJSON(
       formaction,
       {id:theid, sender_email:sender_email, sender_name:sender_name, mail_body:mail_body},
        function(data){
         mailAd(data);
        }                      
       );
       
    });

    // mail friend stuff
    $('#send_friend').click(function(){
      var theid = $('input[type=hidden]').val();
      var mailto = $('#mailto').val();
      var friend = $('#friend').val();                
      // collect the form action to be uses later 
      var formaction = $(this).parents('form').attr('action');

      $.getJSON(
       formaction,
      {id:theid, mailto:mailto, friend:friend},
       function(data){
         mailFriend(data);
       }                      
      );
    });

    // open regular mailer div
    $('#openmail').click(function(){	  
      $('#mailerDiv').fadeOut("slow");      
      $('#mailerDiv').fadeIn("slow");      
    });

    // close original mailer div
    $('#closeMailerDiv').click(function(){	  
      $('#mailerDiv').fadeOut("slow");
      $('#originalMailerDiv').fadeIn("slow");
    });

});


/* Logic for the mail ad action */
function mailAd (optionsDataArray) {
    // first hide everything ?
    $('#error_email_ad').css("display", "none");
    $('#error_body_ad').css("display", "none");
    $('#error_from_ad').css("display", "none");
    $('#error_send_ad').css("display", "none");

    // loop through the error array (if there is one)
    // and take actions according to the content there 
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
      if(key == 'mail_body') {        
	  $('#error_body_ad').css("display", "");
      }     
      // display error msg in case of send problem
      if(key == 'send') {
	  $('#error_send_ad').css("display", ""); 
      }

    });
    
    // success, i.e there were nothing in the error array
    if(errorCount == 0) {	
	$('#response_area_ad').css("display", ""); 

	$('#error_email_ad').css("display", "none");
	$('#error_body_ad').css("display", "none");
	$('#error_from_ad').css("display", "none");
	$('#error_send_ad').css("display", "none");
	// clear values if success
	$('#sender_name').val("");
	$('#sender_email').val("");
	$('#mailbody').val("");
    }  
}

/* Logic for the mail friend action */
function mailFriend (optionsDataArray) {
    // first hide everything ?
    $('#error_from').css("display", "none");
    $('#error_email').css("display", "none");
    $('#error_send').css("display", "none");

    // loop through the error array (if there is one)
    // and take actions according to the content there 
    var errorCount = 0;
    $.each(optionsDataArray['error'],function(key,optionData){
      errorCount++;
      // display error msg if there was no name supplied
      if(key == 'from') {        
	  $('#error_from').css("display", "");
      }
      // display error if there was no email address supplied (or invalid address)
      if(key == 'mail') {        
	  $('#error_email').css("display", "");
      }     
      // display error msg in case of senf problem
      if(key == 'send') {
	  $('#error_send').css("display", ""); 
      }

    });
    
    // success, i.e there were nothing in the error array
    if(errorCount == 0) {
	$('#response_area').css("display", ""); 
	$('#error_email').css("display", "none");
	$('#error_from').css("display", "none");
	$('#error_send').css("display", "none");
	// clear values if success
	$('#mailto').val("");
	$('#friend').val("");
    }  
}

