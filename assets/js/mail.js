$(function() {
	
	
	$(document).on('click touch', '.main-mail-body',function() {
		$(this).addClass('selected');
		$('.main-content-body-mail1').hide();
		$(this).siblings().removeClass('selected');
		$('body').addClass('main-content-body-show');
	})
	
	
	const ps77 = new PerfectScrollbar('.tab-list-items', {
		useBothWheelAxes:true,
		suppressScrollX:true,
	});
	
	const ps78 = new PerfectScrollbar('.main-mail-list-items', {
		useBothWheelAxes:true,
		suppressScrollX:true,
	});
	
	
	
	 // Filter
	 
   $('#mail-search').keyup(function() {
 		var searchTerm = $(this).val().toLowerCase();
         var chkMatchCount = 0;
 		$('.main-mail-list-items .main-mail-item').each(function() {
 			var lineStr = $(this).text().toLowerCase();
 			if (lineStr.indexOf(searchTerm) === -1) {
 				$(this).hide();
 			} else {
 				$(this).show();
                 chkMatchCount++;
                 $(this).addClass("main-mail-item");
 				$("#errmsg").hide()
 			}
 		});
        if(chkMatchCount == 0 && searchTerm != ""){
             $("#errmsg").html("No Results Found");
            $("#errmsg").show();
        }
        else if(searchTerm != ""){
         
        }
		if(searchTerm == ""){
         	$("#errmsg").hide(); 
         }
         
 	});
  
});