(function($) {
	"use strict";
	//basic
	$('.multi-select').multipleSelect({
		placeholder: 'Select here'
	});

	//optiongroup
	$('.optmulti-select').multipleSelect({
		multiple: true,
		multipleWidth: 55,
		width: '100%',
		placeholder: 'Select here'
	});

	//Multiple Items
	$('.multiselect').multipleSelect({
		width: 460,
		multiple: true,
		multipleWidth: 55,
		placeholder: 'Select here'
	});

	//hide selectall
	$('.hide-select').multipleSelect({
		selectAll: false,
		placeholder: 'Select here'
	});

	//Single Row
	$('.single-select').multipleSelect({
		single: true,
		placeholder: 'Select here'
	});

	//filter-multiple
	$('.filter-multi').multipleSelect({
		filter: true,
		placeholder: 'Select here'
	})

	//group-filter
	$('.group-filter').multipleSelect({
		filter: true,
		multiple: true,
		placeholder: 'Select here'
	});

	//custom
	$('.custom-multiselect').multipleSelect({
		placeholder: 'Select here',
		styler: function(value) {
			if (value == '1') {
				return 'background-color: #c4ebef; color: #ffffff;';
			}
			if (value == '6') {
				return 'background-color: #e8ddd4; color: #ffffff;';
			}
			if (value == '10') {
				return 'background-color: #e5d9e8; color: #ffffff;';
			}
		}
	});

})(jQuery);