(function($) {

	// ready
	$(function(){
		$('#block-views-categories-block').collapsibleMenu();
		$('#block-categories-main').collapsibleMenu();
		calcMenuPaddings();
		$('select').selectBox('destroy').selectBox({mobile: true});
		initOpensCart();
		addQuantityButtons();
	});
	$(window).load(function() {
		calcMenuPaddings();
	});
	$(window).resize(function(event) {
		calcMenuPaddings();
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

	function calcMenuPaddings() {
		var menu = $('#main-menu-wrapper'),
		menuContainer = menu.find('.container'),
		elements = menu.find('li a');
		if($(window).width() > 767){
			var allWidth = 0,
			contWidth = menuContainer.width();
			for (var i = elements.length - 1; i >= 0; i--) {
				allWidth += $(elements[i]).width();
			}
			var newPadding = ((contWidth - allWidth) / elements.length / 2) -1 ;
			elements.css({
				'padding-left': newPadding,
				'padding-right': newPadding
			});
		}
		else {
			elements.css({
				'padding-left': 0,
				'padding-right': 0
			});
		}
	}

	function initOpensCart() {
		var cart = $('#block-basic-cart-additional-tnd-shopping-cart'),
			btn = cart.find('.cart-btn'),
			cartForm = cart.find('form');

		$(document).on('click', '.cart-btn', function(event) {
			event.preventDefault();
			btn.toggleClass('opened');
			cartForm.toggleClass('opened');
		});
	}

	function addQuantityButtons() {
		var cart = $('#block-basic-cart-additional-tnd-shopping-cart'),
			inputs = cart.find('.basic-cart-cart-quantity input');
		inputs.each(function(index, el) {
			// console.log($(el));
			var $element = $(el);
			$element.after('<span class="inp-up" data-source-id='+ $element.attr('id') +'>');
			$element.before('<span class="inp-down" data-source-id='+ $element.attr('id') +'>');
		});
		$(document).on('click', '.inp-up', function(event) {
			event.preventDefault();
			var input = $('#'+$(event.target).attr('data-source-id'));
			input.val(+input.val()+1);
		});
		$(document).on('click', '.inp-down', function(event) {
			event.preventDefault();
			var input = $('#'+$(event.target).attr('data-source-id'));
			if(+input.val() > 0){
				input.val(+input.val()-1);
			}
		});
	}

})(jQuery);