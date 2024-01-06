(function($) {
  "use strict";
  
  jQuery(document).ready(function($){
    $(".dia-container .postbox-header").on( "click", function() {
        if ($(this).parent().find('.inside').is(":hidden")) {
          $(this).parent().toggleClass("closed").find('.inside').show()
        } else {
          $(this).parent().find('.inside').hide()
        }
      })
  });
})(jQuery); 