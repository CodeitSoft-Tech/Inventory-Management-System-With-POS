(function($) {
	"use strict";
	
	// ______________Active Class
	$(".app-sidebar li  a").each(function() {
	  var pageUrl = window.location.href.split(/[?#]/)[0];
		if (this.href == pageUrl) { 
			$(this).addClass("active");
			$(this).parent().addClass("active"); // add active to li of the current link
			$(this).parent().parent().prev().addClass("active"); // add active class to an anchor
			$(this).parent().parent().prev().click(); // click the item to make it drop
		}
	});
	
	//Active Class
	$(".app-sidebar li a").each(function() {
		var pageUrl = window.location.href.split(/[?#]/)[0];
		if (this.href == pageUrl) {
			$(this).addClass("active");
			$(this).parent().addClass("active"); // add active to li of the current link
			$(this).parent().addClass("resp-tab-content-active"); // add active to li of the current link
			$(this).parent().parent().parent().prev().addClass("active"); // add active class to an anchor
			$(this).parent().parent().parent().prev().click(); // click the item to make it drop
		}
	});
	
	$(".submenu-list li a").each(function() {
		var pageUrl = window.location.href.split(/[?#]/)[0];
		if (this.href == pageUrl) {
			$(this).addClass("active");
			$(this).parent().parent().parent().parent().parent().addClass("active"); // add active to li of the current link
			$(this).parent().parent().parent().parent().parent().addClass("resp-tab-content-active"); // add active to li of the current link
			$(this).parent().parent().parent().prev().addClass("active"); // add active class to an anchor
			$(this).parent().parent().parent().prev().click(); // click the item to make it drop
		}
	});
	
	$(document).ready(function(){		
		
		if ($('.dashboard-spruha.active').hasClass('active'))
        $('li.dashboard-spruha').addClass('active');
	
	    if ($('.crypto-spruha.active').hasClass('active'))
        $('li.crypto-spruha').addClass('active');
	
        if ($('.ecommerce-spruha.active').hasClass('active'))
        $('li.ecommerce-spruha').addClass('active');
	
		if ($('.widgets-spruha.active').hasClass('active'))
        $('li.widgets-spruha').addClass('active');
	
   	    if ($('.mail-spruha.active').hasClass('active'))
        $('li.mail-spruha').addClass('active');
	
   	    if ($('.apps-spruha.active').hasClass('active'))
        $('li.apps-spruha').addClass('active');
	
		if ($('.icons-spruha.active').hasClass('active'))
        $('li.icons-spruha').addClass('active');
	
		if ($('.maps-spruha.active').hasClass('active'))
        $('li.maps-spruha').addClass('active');
		
		if ($('.tables-spruha.active').hasClass('active'))
        $('li.tables-spruha').addClass('active');
	
		if ($('.element-spruha.active').hasClass('active'))
        $('li.element-spruha').addClass('active');
	
		if ($('.advanced-spruha.active').hasClass('active'))
        $('li.advanced-spruha').addClass('active');
	
		if ($('.forms-spruha.active').hasClass('active'))
        $('li.forms-spruha').addClass('active');
	
		if ($('.chart-spruha.active').hasClass('active'))
        $('li.chart-spruha').addClass('active');
		
		if ($('.pages-spruha.active').hasClass('active'))
        $('li.pages-spruha').addClass('active');
	
		if ($('.utilities-spruha.active').hasClass('active'))
        $('li.utilities-spruha').addClass('active');
	
		if ($('.custom-spruha.active').hasClass('active'))
        $('li.custom-spruha').addClass('active');
	
	
	
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
	
})(jQuery);