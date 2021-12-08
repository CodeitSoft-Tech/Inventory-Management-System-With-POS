$(function(e){
 
	
	
	/*-- Jvector Map -- */
	$('#world-map-markers').vectorMap({
		map : 'world_mill_en',
		scaleColors : ['#6259ca', '#f0f0ff'],
		normalizeFunction : 'polynomial',
		hoverOpacity : 0.7,
		hoverColor : false,
		regionStyle : {
			initial : {
				fill : 'rgba(183, 179, 220,0.3)'
			}
		},
		markerStyle: {
			initial: {
				r: 6,
				'fill': '#6259ca',
				'fill-opacity': 0.9,
				'stroke': '#fff',
				'stroke-width' : 2.5,
			},

			hover: {
				'stroke': '#fff',
				'fill-opacity': 1,
				'stroke-width': 1.5
			}
		},
		backgroundColor : 'transparent',
		markers : [{
			latLng : [-23.533773, -46.625290],
			name : 'Brazil'
		}, {
			latLng : [55.751244, 37.618423],
			name : 'Russia'
		}, {
			latLng : [52.237049, 21.017532],
			name : 'Poland'
		},  {
			latLng : [51.213890, -110.005470],
			name : 'Canada'
		},{
			latLng : [20.5937, 78.9629],
			name : 'India'
		}]
	});
	/*-- End Jvector Map -- */
	
	
	/* Peity charts */
 
	$('.peity-donut').peity('donut');
	
	
	/*LIne-Chart */
	var ctx = document.getElementById("revenuechart").getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'line',

		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"],
			datasets: [{
				label: 'Order',
				data: [30, 150, 65, 160, 70, 130, 70, 120],
				borderWidth: 3,
				backgroundColor: 'transparent',
				borderColor: 'rgba(183, 179, 220,0.5)',
				pointBackgroundColor: '#ffffff',
				pointRadius: 0,
				borderDash: [4,3],
			},
			{
				label: 'Sale',
				data: [50, 90, 210, 90, 150, 75, 200, 70],
				borderWidth: 3,
				backgroundColor: 'transparent',
				borderColor: '#6259ca',
				pointBackgroundColor: '#ffffff',
				pointRadius: 0,
			}]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			tooltips: {
				enabled: true,
			},
			tooltips: {
				mode: 'index',
				intersect: false,
			},
			hover: {
				mode: 'nearest',
				intersect: true
			},
			scales: {
				xAxes: [{
					ticks: {
						fontColor: "#c8ccdb",
					},
					barPercentage: 0.7,
					display: true,
					gridLines: {
						color:'rgba(119, 119, 142, 0.2)',
						zeroLineColor: 'rgba(119, 119, 142, 0.2)',
					}
				}],
				yAxes: [{
					ticks: {
						fontColor: "#77778e",
					},
					display: true,
					gridLines: {
						color:'rgba(119, 119, 142, 0.2)',
						zeroLineColor: 'rgba(119, 119, 142, 0.2)',
					},
					ticks: {
					  min: 0,
					  max: 250,
					  stepSize: 50
                },
					scaleLabel: {
						display: true,
						labelString: 'Thousands',
						fontColor: 'transparent'
					}
				}]
			},
			legend: {
				display: true,
				width:30,
				height:30,
				borderRadius:50,
				labels: {
					fontColor: "#77778e"
				},
			},
		}
	});
	
	/*--- Apex (#chart) ---*/
	var options = {
		chart: {
		height: 265,
		type: 'radialBar',
		offsetX: 0,
		offsetY: 0,
	},
	plotOptions: {
	    radialBar: {
		startAngle: -135,
		endAngle: 135,
		size: 120,
		imageWidth: 50,
        imageHeight: 50,
		track: {	
			strokeWidth: "80%",	
			background: 'transparent',	
		},
		dropShadow: {
			enabled: false,
			top: 0,
			left: 0,
			bottom: 0,
			blur: 3,
			opacity: 0.5
		},
		dataLabels: {
		  name: {
			fontSize: '16px',
			color: undefined,
			offsetY: 30,
		  },
		  hollow: {	
			 size: "60%"	
			},
		  value: {
			offsetY: -10,
			fontSize: '22px',
			color: undefined,
			formatter: function (val) {
			  return val + "%";
			}
		  }
		}
	  }
	},
	colors: ['#6259ca'],
	fill: {
		type: "gradient",
		gradient: {
			shade: "dark",
			type: "horizontal",
			shadeIntensity: .5,
			gradientToColors: ['#6259ca'],
			inverseColors: !0,
			opacityFrom: 1,
			opacityTo: 1,
			stops: [0, 100]
		}
	},
	stroke: {
		dashArray: 4
	},
	series: [83],	
		labels: [""]
	};

	var chart = new ApexCharts(document.querySelector("#recentorders"), options);
	chart.render();
	/*--- Apex (#chart)closed ---*/

	
	
	
	
	
	
});