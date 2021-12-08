$(function() {
	'use strict';

	/* Flot Chart1*/
	$.plot('#flotBar1', [{
		data: [
			[0, 3],
			[1, 8],
			[2, 5],
			[3, 13],
			[4, 5],
			[5, 7],
			[6, 4],
			[7, 6],
			[8, 3],
			[9, 7]
		]
	}], {
		series: {
			bars: {
				show: true,
				lineWidth: 0,
				fillColor: '#6259ca',
				barWidth: .5
			},
			highlightColor: '#4977ff'
		},
		grid: {
			borderWidth: 1,
			borderColor: 'rgba(119, 119, 142, 0.2)',
			hoverable: true
		},
		yaxis: {
			tickColor: 'rgba(119, 119, 142, 0.2)',
			font: {
				color: '#77778e',
				size: 10
			}
		},
		xaxis: {
			tickColor: 'rgba(119, 119, 142, 0.2)',
			font: {
				color: '#77778e',
				size: 10
			}
		}
	});
	$.plot('#flotBar2', [{
		data: [
			[0, 3],
			[2, 8],
			[4, 5],
			[6, 13],
			[8, 5],
			[10, 7],
			[12, 8],
			[14, 10]
		],
		bars: {
			show: true,
			lineWidth: 0,
			fillColor: '#6259ca',
			barWidth: .8
		}
	}, {
		data: [
			[1, 5],
			[3, 7],
			[5, 10],
			[7, 7],
			[9, 9],
			[11, 5],
			[13, 4],
			[15, 6]
		],
		bars: {
			show: true,
			lineWidth: 0,
			fillColor: '#53caed',
			barWidth: .8
		}
	}], {
		grid: {
			borderWidth: 1,
			borderColor: 'rgba(119, 119, 142, 0.2)'
		},
		yaxis: {
			tickColor: 'rgba(119, 119, 142, 0.2)',
			font: {
				color: '#77778e',
				size: 10
			}
		},
		xaxis: {
			tickColor: 'rgba(119, 119, 142, 0.2)',
			font: {
				color: '#77778e',
				size: 10
			}
		}
	});
	var newCust = [
		[0, 2],
		[1, 3],
		[2, 6],
		[3, 5],
		[4, 7],
		[5, 8],
		[6, 10]
	];
	var retCust = [
		[0, 1],
		[1, 2],
		[2, 5],
		[3, 3],
		[4, 5],
		[5, 6],
		[6, 9]
	];
	var plot = $.plot($('#flotLine1'), [{
		data: newCust,
		label: 'New Customer',
		color: '#6259ca'
	}, {
		data: retCust,
		label: 'Returning Customer',
		color: '#53caed'
	}], {
		series: {
			lines: {
				show: true,
				lineWidth: 2
			},
			shadowSize: 0
		},
		points: {
			show: false,
		},
		legend: {
			noColumns: 1,
			position: 'nw'
		},
		grid: {
			hoverable: true,
			clickable: true,
			borderWidth: 0,
			labelMargin: 5
		},
		yaxis: {
			min: 0,
			max: 15,
			color: 'rgba(119, 119, 142, 0.2)',
			font: {
				size: 10,
				color: '#77778e'
			}
		},
		xaxis: {
			color: 'rgba(119, 119, 142, 0.2)',
			font: {
				size: 10,
				color: '#77778e'
			}
		}
	});
	var plot = $.plot($('#flotLine2'), [{
		data: newCust,
		label: 'New Customer',
		color: '#6259ca'
	}, {
		data: retCust,
		label: 'Returning Customer',
		color: '#53caed'
	}], {
		series: {
			lines: {
				show: true,
				lineWidth: 2
			},
			shadowSize: 0
		},
		points: {
			show: true,
		},
		legend: {
			noColumns: 1,
			position: 'ne'
		},
		grid: {
			hoverable: true,
			clickable: true,
			borderColor: '#ddd',
			borderWidth: 0,
			labelMargin: 5
		},
		yaxis: {
			min: 0,
			max: 15,
			color: 'rgba(119, 119, 142, 0.2)',
			font: {
				size: 10,
				color: '#77778e'
			}
		},
		xaxis: {
			color: 'rgba(119, 119, 142, 0.2)',
			font: {
				size: 10,
				color: '#77778e'
			}
		}
	});
	var plot = $.plot($('#flotArea1'), [{
		data: newCust,
		label: 'New Customer',
		color: '#6259ca'
	}, {
		data: retCust,
		label: 'Returning Customer',
		color: '#53caed'
	}], {
		series: {
			lines: {
				show: true,
				lineWidth: 1,
				fill: true,
				fillColor: {
					colors: [{
						opacity: 0
					}, {
						opacity: 0.8
					}]
				}
			},
			shadowSize: 0
		},
		points: {
			show: false,
		},
		legend: {
			noColumns: 1,
			position: 'nw'
		},
		grid: {
			hoverable: true,
			clickable: true,
			borderColor: '#ddd',
			borderWidth: 0,
			labelMargin: 5
		},
		yaxis: {
			min: 0,
			max: 15,
			color: 'rgba(119, 119, 142, 0.2)',
			font: {
				size: 10,
				color: '#77778e'
			}
		},
		xaxis: {
			color: 'rgba(119, 119, 142, 0.2)',
			font: {
				size: 10,
				color: '#77778e'
			}
		}
	});
	var plot = $.plot($('#flotArea2'), [{
		data: newCust,
		label: 'New Customer',
		color: '#6259ca'
	}, {
		data: retCust,
		label: 'Returning Customer',
		color: '#53caed'
	}], {
		series: {
			lines: {
				show: true,
				lineWidth: 1,
				fill: true,
				fillColor: {
					colors: [{
						opacity: 0
					}, {
						opacity: 0.3
					}]
				}
			},
			shadowSize: 0
		},
		points: {
			show: true,
		},
		legend: {
			noColumns: 1,
			position: 'nw'
		},
		grid: {
			hoverable: true,
			clickable: true,
			borderColor: '#ddd',
			borderWidth: 0,
			labelMargin: 5
		},
		yaxis: {
			min: 0,
			max: 15,
			color: 'rgba(119, 119, 142, 0.2)',
			font: {
				size: 10,
				color: '#77778e'
			}
		},
		xaxis: {
			color: 'rgba(119, 119, 142, 0.2)',
			font: {
				size: 10,
				color: '#77778e'
			}
		}
	});
	/**************** PIE CHART *******************/
	var piedata = [{
		label: 'Series 1',
		data: [
			[1, 50]
		],
		color: '#6259ca'
	}, {
		label: 'Series 2',
		data: [
			[1, 30]
		],
		color: '#53caed'
	}, {
		label: 'Series 3',
		data: [
			[1, 90]
		],
		color: '#01b8ff'
	}, {
		label: 'Series 4',
		data: [
			[1, 70]
		],
		color: '#f16d75'
	}, {
		label: 'Series 5',
		data: [
			[1, 40]
		],
		color: '#29ccbb'
	}];
	$.plot('#flotPie1', piedata, {
		series: {
			pie: {
				show: true,
				radius: 1,
				label: {
					show: true,
					radius: 2 / 3,
					formatter: labelFormatter,
					threshold: 0.1
				}
			}
		},
		grid: {
			hoverable: true,
			clickable: true
		}
	});
	$.plot('#flotPie2', piedata, {
		series: {
			pie: {
				show: true,
				radius: 1,
				innerRadius: 0.5,
				label: {
					show: true,
					radius: 2 / 3,
					formatter: labelFormatter,
					threshold: 0.1
				}
			}
		},
		grid: {
			hoverable: true,
			clickable: true
		}
	});

	function labelFormatter(label, series) {
		return '<div style="font-size:8pt; text-align:center; padding:2px; color:white;">' + label + '<br/>' + Math.round(series.percent) + '%</div>';
	}
});