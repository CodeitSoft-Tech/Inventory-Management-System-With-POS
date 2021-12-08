(function($) {
	"use strict";
	
	//Active Class
	$(".app-sidebar a").each(function() {
		var pageUrl = window.location.href.split(/[?#]/)[0];
		if (this.href == pageUrl) {
			$(this).addClass("active");
			$(this).parent().parent().parent().parent().parent().parent().parent().parent().addClass("active"); // add active to li of the current link
			$(this).parent().parent().parent().parent().parent().parent().parent().parent().addClass("resp-tab-content-active"); // add active to li of the current link
			$(this).parent().parent().parent().parent().parent().prev().addClass("active"); // add active class to an anchor
			$(this).parent().parent().prev().click(); // click the item to make it drop
		}
	});
	
	$(".side-menu a").each(function() {
		var pageUrl = window.location.href.split(/[?#]/)[0];
		if (this.href == pageUrl) {
			$(this).addClass("active");
			$(this).parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().addClass("active"); // add active to li of the current link
			$(this).parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().addClass("resp-tab-content-active"); // add active to li of the current link
			$(this).parent().parent().parent().parent().parent().prev().addClass("active"); // add active class to an anchor
			$(this).parent().parent().prev().click(); // click the item to make it drop
		}
	});
	
	$(".submenu-list li a").each(function() {
		var pageUrl = window.location.href.split(/[?#]/)[0];
		if (this.href == pageUrl) {
			$(this).addClass("active");
			$(this).parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().addClass("active"); // add active to li of the current link
			$(this).parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().addClass("resp-tab-content-active"); // add active to li of the current link
			$(this).parent().parent().parent().parent().parent().prev().addClass("active"); // add active class to an anchor
			$(this).parent().parent().prev().click(); // click the item to make it drop
		}
	});
	
	
	$('.slide.submenu.is-expanded').addClass("active");
	
	
	$(document).ready(function(){		
			
		if ($('.dashboard-admin.active').hasClass('active'))
        $('li.dashboard-admin').addClass('active');
	
		if ($('.components-admin.active').hasClass('active'))
        $('li.components-admin').addClass('active');
	
		if ($('.app-admin.active').hasClass('active'))
        $('li.app-admin').addClass('active');
	
		if ($('.element-admin.active').hasClass('active'))
        $('li.element-admin').addClass('active');
	
		if ($('.advanceui-admin.active').hasClass('active'))
        $('li.advanceui-admin').addClass('active');
		
		if ($('.utilities-admin.active').hasClass('active'))
        $('li.utilities-admin').addClass('active');
	
		if ($('.mail-admin.active').hasClass('active'))
        $('li.mail-admin').addClass('active');
	
		if ($('.forms-admin.active').hasClass('active'))
        $('li.forms-admin').addClass('active');
	
		if ($('.charts-admin.active').hasClass('active'))
        $('li.charts-admin').addClass('active');
	
		if ($('.pages-admin.active').hasClass('active'))
        $('li.pages-admin').addClass('active');
	
		if ($('.ecommerce-admin.active').hasClass('active'))
        $('li.ecommerce-admin').addClass('active');
		
		if ($('.custom-admin.active').hasClass('active'))
        $('li.custom-admin').addClass('active');
	
	
	});
	
	
	// VerticalTab
	$('#sidemenu-Tab').easyResponsiveTabs({
		type: 'vertical',
		width: 'auto', 
		fit: true, 
		closed: 'accordion',
		tabidentify: 'hor_1',
		activate: function(event) {
			var $tab = $(this);
			var $info = $('#nested-tabInfo2');
			var $name = $('span', $info);
			$name.text($tab.text());
			$info.show();
		}
	});
	
	const ps13 = new PerfectScrollbar('.first-sidemenu', {
		useBothWheelAxes:true,
		suppressScrollX:true,
	});
	const ps14 = new PerfectScrollbar('.second-sidemenu', {
		useBothWheelAxes:true,
		suppressScrollX:true,
	});
	
	
	var toggleSidebar = function() {
		var w = $(window);
		if(w.outerWidth() <= 1024) {
			$("body").addClass("sidebar-gone");
			$(document).off("click", "body").on("click", "body", function(e) {
				if($(e.target).hasClass('sidebar-show') || $(e.target).hasClass('search-show')) {
					$("body").removeClass("sidebar-show");
					$("body").addClass("sidebar-gone");
					$("body").removeClass("search-show");
				}
			});
		}else{
			$("body").removeClass("sidebar-gone");
		}
	}
	toggleSidebar();
	$(window).resize(toggleSidebar);
	
	
})(jQuery);