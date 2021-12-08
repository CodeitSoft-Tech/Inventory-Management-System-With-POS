(function($) {
	"use strict";
	
	//Active Class
	$(".app-sidebar #parentVerticalTab a").each(function() {
		var pageUrl = window.location.href.split(/[?#]/)[0];
		if (this.href == pageUrl) {
			$(this).addClass("active");
			$(this).parent().parent().parent().addClass("active"); // add active to li of the current link
			$(this).parent().parent().prev().addClass("active"); // add active class to an anchor
			$(this).parent().parent().prev().click(); // click the item to make it drop
		}
	});
	
	// VerticalTab
	$('#parentVerticalTab').easyResponsiveTabs({
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
	
	/*---Scroling ---*/
	//P-scroll
	const ps =  new PerfectScrollbar('.first-sidemenu', {
		suppressScrollX: true
	});
	const ps1 =  new PerfectScrollbar('.second-sidemenu', {
		suppressScrollX: true
	});
	
})(jQuery);