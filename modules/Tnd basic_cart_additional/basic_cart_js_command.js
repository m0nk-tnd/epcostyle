(function($) {
  Drupal.ajax.prototype.commands.open_colorbox = function(ajax, response, status) {
    var a = '<a href="'+ response.href +'?height=700&width=470">open</a>';
    if(response.sleep){
	    window.setTimeout( function(){$(a).colorboxNode({'launch': true});}, response.sleep );
    }
    else {
	    $(a).colorboxNode({'launch': true});
    }
  }
  Drupal.ajax.prototype.commands.open_inline_colorbox = function(ajax, response, status) {
    if(response.sleep){
	    window.setTimeout( function(){$.colorbox({html: response.html});}, response.sleep );
    }
    else {
	    $.colorbox({html: response.html});
    }
  }
}(jQuery));