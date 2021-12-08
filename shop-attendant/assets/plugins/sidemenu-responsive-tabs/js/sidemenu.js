(function () {
	"use strict";

	var slideMenu = $('.side-menu');
	
	// Toggle Sidebar
	$(document).on("click", '#mainSidebarToggle', function(event) {
		event.preventDefault();
		$('body').toggleClass('main-sidebar-hide');
		$('body').removeClass('main-sidebar-hide2');
	});
	$(document).on("click", ".main-sidebar-hide .main-header-menu-icon", function(event) {
		event.preventDefault();
		$('body').toggleClass('main-sidebar-hide1');
	});
	$(document).on("click", ".main-sidebar-hide .resp-tab-item", function(event) {
		event.preventDefault();
		$('body').addClass('main-sidebar-hide2');
		$('body').removeClass('main-sidebar-hide1');
		$('body').removeClass('main-sidebar-hide');
	});
	
	//mobile  Toggle Sidebar
	if ( $(window).width() < 767) { 
		$(document).on("click", '#mainSidebarToggle', function(event) {
			event.preventDefault();
			$('body').toggleClass('sidenav-mobile');
		});
		
		$(document).on("click", ".sidenav-mobile .resp-tab-item", function(event) {
			event.preventDefault();
			$('body').toggleClass('main-sidebar-hide1');
			$('body').toggleClass('main-sidebar-hide');
		});
	}




	// Activate sidebar slide toggle
	$("[data-toggle='slide']").on('click', function(e) {
		var $this = $(this);
		var checkElement = $this.next();
		var animationSpeed = 300,
		slideMenuSelector = '.slide-menu';
		if (checkElement.is(slideMenuSelector) && checkElement.is(':visible')) {
		  checkElement.slideUp(animationSpeed, function() {
			checkElement.removeClass('open');
		  });
		  checkElement.parent("li").removeClass("is-expanded");
		}
		 else if ((checkElement.is(slideMenuSelector)) && (!checkElement.is(':visible'))) {
		  var parent = $this.parents('ul').first();
		  var ul = parent.find('ul:visible').slideUp(animationSpeed);
		  ul.removeClass('open');
		  var parent_li = $this.parent("li");
		  checkElement.slideDown(animationSpeed, function() {
			checkElement.addClass('open');
			parent.find('li.is-expanded').removeClass('is-expanded');
			parent_li.addClass('is-expanded');
		  });
		}
		if (checkElement.is(slideMenuSelector)) {
		  e.preventDefault();
		}
	});
	
	// Activate sidebar slide toggle
	$("[data-toggle='sub-slide']").on('click', function(e) {
		var $this = $(this);
		var checkElement = $this.next();
		var animationSpeed = 300,
		slideMenuSelector = '.sub-slide-menu';
		if (checkElement.is(slideMenuSelector) && checkElement.is(':visible')) {
		  checkElement.slideUp(animationSpeed, function() {
			checkElement.removeClass('open');
		  });
		  checkElement.parent("li").removeClass("is-expanded");
		}
		 else if ((checkElement.is(slideMenuSelector)) && (!checkElement.is(':visible'))) {
		  var parent = $this.parents('ul').first();
		  var ul = parent.find('ul:visible').slideUp(animationSpeed);
		  ul.removeClass('open');
		  var parent_li = $this.parent("li");
		  checkElement.slideDown(animationSpeed, function() {
			checkElement.addClass('open');
			parent.find('li.is-expanded').removeClass('is-expanded');
			parent_li.addClass('is-expanded');
		  });
		}
		if (checkElement.is(slideMenuSelector)) {
		  e.preventDefault();
		}
	});
	
	

	// Set initial active toggle
	$("[data-toggle='slide.'].is-expanded").parent().toggleClass('is-expanded');

	//Activate bootstrip tooltips
	$("[data-toggle='tooltip']").tooltip();
	
	
	
	
	// ______________sticky-header
	function updateScroll() {
		if ($(window).scrollTop() >= 30) {
			$(".main-header-fixed").addClass('fixed-header');
		} else {
			$(".main-header-fixed").removeClass("fixed-header");
		}
	}
	$(function() {
		$(window).scroll(updateScroll);
		updateScroll();
	});
	
	
})();