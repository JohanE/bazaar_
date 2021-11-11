$(document).ready(function(){
        $('#imageshide').click(function(){      	   
	   toggleImages('true');
        });
	$('#imagesshow').click(function(){      	   
	   toggleImages('');
        });

	$("#type-"+$("#type").attr("value")).slideDown("slow");
	$("#contact a.showhide").parent().next("form").css("display","none");
	$("#product div.sidebar.add div.holder").hover(function(){
		$(this).children("a.delete").css("display","block");
		},function(){
		$(this).children("a.delete").css("display","none");	
		});
	$("input[title], textarea[title]").live('focus',function(){
		if ($(this).attr('title') == $(this).attr('value')) {
			$(this).attr('value', '');
			}
		});
	$("input[title], textarea[title]").live('blur',function(){
		if ($(this).attr('value') == '') {
			$(this).attr('value', $(this).attr('title'));
			}
		});
	$("li a.showhide").click(function(){
		$(this).next("div").toggle();
		return false;
		});
	$("#contact a.showhide").click(function(){
		$(this).parent().next("form").toggle();
		return false;
		});
	$('select.custom').selectmenu({style:'dropdown', maxHeight: 200});
	$( "#buttonset" ).buttonset();
	$('a.lightbox').lightBox({
		imageLoading: '/js/jquery-lightbox/images/loading.gif',
		imageBtnClose: '/js/jquery-lightbox/images/close.gif',
		imageBtnPrev: '/js/jquery-lightbox/images/prev.gif',
		imageBtnNext: '/js/jquery-lightbox/images/next.gif'
		});

	$("area").hover(function(){
		showArea($(this).attr("id").replace("area-", ""));
		}, function(){
		hideArea($(this).attr("id").replace("area-", ""));
		});
	$(".areas li a").hover(function(){
		showArea($(this).attr("id").replace("link-", ""));
		}, function(){
		hideArea($(this).attr("id").replace("link-", ""));
		});
	$('#max_per_page').change(function(){ 
	   $('#theform').submit();    
	});  
        $('#date_sort').click(function(){ 
	   $('#sorter').val('');
	   $('#theform').submit();    
	});  
        $('#price_sort').click(function(){ 
	   $('#sorter').val('1');
	   $('#theform').submit();    
	});   
	$("#type").change(function(){
		//$(".type-extend").css("display","none");
		//$("#type-"+$(this).attr("value")).slideDown("slow");
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
		 })
	});
});

function toggleImages(theVal) {
   $('#showImages').val(theVal);
   $('#theform').submit();
}

function showArea(id){
	$("#map-hover").addClass("area-"+id);
	$("#link-"+id).addClass("highlite");
	}
function hideArea(id){
	$("#map-hover").removeClass("area-"+id);
	$("#link-"+id).removeClass("highlite");
	}