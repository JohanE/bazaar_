(function($) {
  $.fn.emptySelect = function() {
    return this.each(function(){
      if (this.tagName=='SELECT') this.options.length = 0;
    });
  }

  $.fn.addNode = function(text, value) {
    return this.each(function(){
      if (this.tagName=='SELECT') {
        var selectElement = this;

	var option = new Option(text, value);
          if ($.browser.msie) {
            selectElement.add(option);
          }
          else {
            selectElement.add(option,null);
          }

      }
    });
  }

  $.fn.loadSelect = function(optionsDataArray) {
    return this.emptySelect().each(function(){
      if (this.tagName=='SELECT') {
        var selectElement = this;
        $.each(optionsDataArray,function(index,optionData){
          var option = new Option(optionData.caption,
                                  optionData.value);
          if ($.browser.msie) {
            selectElement.add(option);
          }
          else {
            selectElement.add(option,null);
          }
        });
      }
    });
  }


})(jQuery);

function winLoad(theurl) {
    var load = window.open(theurl,'','scrollbars=yes,menubar=no,height=600,width=1000,resizable=yes,toolbar=no,location=no,status=no');
}