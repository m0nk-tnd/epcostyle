(function($) {
  Drupal.ajax.prototype.commands.open_colorbox = function(ajax, response, status) {
    var a = '<a href="'+ response.href +'?height=800&width=470">open</a>';
    if(response.sleep){
	    window.setTimeout( function(){$(a).colorboxNode({'launch': true});}, response.sleep );
    }
    else {
	    $(a).colorboxNode({'launch': true});
    }
  }
}(jQuery));