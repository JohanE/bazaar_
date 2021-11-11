$(document).ready(function()
{    
    $('#imageshow').click(function(){      
      var formaction = $('#theform').attr('action');
      formaction += '/showImages';
      $.getJSON(
       formaction,
      {},
       function(data){
         showImages(data);
       }                      
      );
    });

    $('#imageshide').click(function(){      
      var formaction = $('#theform').attr('action');
      formaction += '/hideImages';      
      $.getJSON(
       formaction,
      {},
       function(data){
         hideImages(data);
       }                      
      );
    });



    $('#category').change(function(){ 
      var catValue = $(this).val();       
      var formaction = $('#theform').attr('action');
      formaction = formaction.replace("item", "category");
      formaction += "/categoryChanged";
      args = "id="+catValue;
      $.ajax({
	      type: "GET",
	      url: formaction,
	      data: args,
	      dataType: "script"
	     });
    });	    

    $('#max_per_page').change(function(){ 
       $('#theform').submit();    
    });	    

});

function hideImages ()
{
    $('#imageshow').css("display", "");
    $('#imageshide').css("display", "none");
    hideThumbs();
    showCamImgs();
}

function showImages ()
{
    $('#imageshow').css("display", "none");
    $('#imageshide').css("display", ""); 
    showThumbs();
    hideCamImgs();
}

function showThumbs ()
{       
  $('.foto').each(function(index) {     
     $(this).css("display", "");
  });
}

function hideCamImgs()
{
  $('.fotoikon').each(function(index) {     
     $(this).css("display", "none");
  });
}

function hideThumbs ()
{
  $('.foto').each(function(index) {     
     $(this).css("display", "none");
  });
  
}
function showCamImgs()
{   
    $('.fotoikon').each(function(index) {     
     $(this).css("display", "");
    });
}

function submitFormSortPrice()
{
    $('#sorter').val('1');;
    //finally submit 
    $('#theform').submit();    
}

function submitFormSortRegular()
{
    $('#sorter').val('');
    //finally submit 
    $('#theform').submit();    
}



