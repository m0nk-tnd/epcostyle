(function($) {

	// ready
	$(function(){
		$('#block-views-categories-block').collapsibleMenu();
		$('#block-categories-main').collapsibleMenu();
	});

	$.fn.collapsibleMenu = function() {
		if(this.size()){
			var menuBlock = this,
				triggerEl = this.find('.block-title:eq(0)'),
				colapsibleEl = this.find('.view-categories:eq(0)');

			menuBlock.addClass('collapsible-block');
			colapsibleEl.addClass('collapsible-list collapsed').slideToggle(400);

			triggerEl.before('<button type="button" class="visible-xs visible-sm" id="collapsible-menu-btn">\
	            <span class="icon-bar"></span>\
	            <span class="icon-bar"></span>\
	            <span class="icon-bar"></span>\
	          </button>');
			var button = this.find('#collapsible-menu-btn');

			triggerEl.on('click', function() {
				colapsibleEl.slideToggle(400).toggleClass('collapsed');
				menuBlock.toggleClass('open');
			});
			button.on('click', function() {
				colapsibleEl.slideToggle(400).toggleClass('collapsed');
				menuBlock.toggleClass('open');
			});

		}
		return this;
	}

})(jQuery);