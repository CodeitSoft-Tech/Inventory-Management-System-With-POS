$(function() {
	
	/*LIne-Chart */
	var ctx = document.getElementById("chartLine").getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ["Sun", "Mon", "Tus", "Wed", "Thu", "Fri", "Sat"],
			datasets: [{
				label: 'Profits',
				data: [20, 420, 210, 354, 580, 320, 480],
				borderWidth: 2,
				backgroundColor: 'transparent',
				borderColor: '#6259ca',
				borderWidth: 3,
				pointBackgroundColor: '#ffffff',
				pointRadius: 2
			}]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,

			scales: {
				xAxes: [{
					ticks: {
						fontColor: "#77778e",
					 },
					display: true,
					gridLines: {
						color: 'rgba(119, 119, 142, 0.2)'
					}
				}],
				yAxes: [{
					ticks: {
						fontColor: "#77778e",
					 },
					display: true,
					gridLines: {
						color: 'rgba(119, 119, 142, 0.2)'
					},
					scaleLabel: {
						display: false,
						labelString: 'Thousands',
						fontColor: 'rgba(119, 119, 142, 0.2)'
					}
				}]
			},
			legend: {
				labels: {
					fontColor: "#77778e"
				},
			},
		}
	});

	/* Bar-Chart1 */
	var ctx = document.getElementById("chartBar1").getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
			datasets: [{
				label: 'Sales',
				data: [200, 450, 290, 367, 256, 543, 345],
				borderWidth: 2,
				backgroundColor: '#9877f9',
				borderColor: '#9877f9',
				borderWidth: 2.0,
				pointBackgroundColor: '#ffffff',

			}]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			legend: {
				display: true
			},
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true,
						stepSize: 150,
						fontColor: "#77778e",
					},
					gridLines: {
						color: 'rgba(119, 119, 142, 0.2)'
					}
				}],
				xAxes: [{
					ticks: {
						display: true,
						fontColor: "#77778e",
					},
					gridLines: {
						display: false,
						color: 'rgba(119, 119, 142, 0.2)'
					}
				}]
			},
			legend: {
				labels: {
					fontColor: "#77778e"
				},
			},
		}
	});

	/* Bar-Chart2*/
	var ctx = document.getElementById("chartBar2");
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
			datasets: [{
				label: "Data1",
				data: [65, 59, 80, 81, 56, 55, 40],
				borderColor: "#6259ca",
				borderWidth: "0",
				backgroundColor: "#6259ca"
			}, {
				label: "Data2",
				data: [28, 48, 40, 19, 86, 27, 90],
				borderColor: "#53caed",
				borderWidth: "0",
				backgroundColor: "#53caed"
			}]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			scales: {
				xAxes: [{
					ticks: {
						fontColor: "#77778e",
					 },
					gridLines: {
						color: 'rgba(119, 119, 142, 0.2)'
					}
				}],
				yAxes: [{
					ticks: {
						beginAtZero: true,
						fontColor: "#77778e",
					},
					gridLines: {
						color: 'rgba(119, 119, 142, 0.2)'
					},
				}]
			},
			legend: {
				labels: {
					fontColor: "#77778e"
				},
			},
		}
	});

	/* Area Chart*/
	var ctx = document.getElementById("chartArea");
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
			datasets: [{
				label: "Data1",
				borderColor: "rgba(113, 76, 190, 0.9)",
				borderWidth: "1",
				backgroundColor: "rgba(113, 76, 190, 0.5)",
				data: [22, 44, 67, 43, 76, 45, 12]
			}, {
				label: "Data2",
				borderColor: "rgba(235, 111, 51 ,0.9)",
				borderWidth: "1",
				backgroundColor: "rgba(	235, 111, 51, 0.7)",
				pointHighlightStroke: "rgba(235, 111, 51 ,1)",
				data: [16, 32, 18, 26, 42, 33, 44]
			}]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			tooltips: {
				mode: 'index',
				intersect: false
			},
			hover: {
				mode: 'nearest',
				intersect: true
			},
			scales: {
				xAxes: [{
					ticks: {
						fontColor: "#77778e",
					 },
					gridLines: {
						color: 'rgba(119, 119, 142, 0.2)'
					}
				}],
				yAxes: [{
					ticks: {
						beginAtZero: true,
						fontColor: "#77778e",
					},
					gridLines: {
						color: 'rgba(119, 119, 142, 0.2)'
					},
				}]
			},
			legend: {
				labels: {
					fontColor: "#77778e"
				},
			},
		}
	});

	/* Pie Chart*/
	var datapie = {
		labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
		datasets: [{
			data: [20, 20, 30, 5, 25],
			backgroundColor: ['#6259ca', '#53caed', '#01b8ff', '#f16d75', '#29ccbb']
		}]
	};
	var optionpie = {
		maintainAspectRatio: false,
		responsive: true,
		legend: {
			display: false,
		},
		animation: {
			animateScale: true,
			animateRotate: true
		}
	};

	/* Doughbut Chart*/
	var ctx6 = document.getElementById('chartPie');
	var myPieChart6 = new Chart(ctx6, {
		type: 'doughnut',
		data: datapie,
		options: optionpie
	});

	/* Pie Chart*/
	var ctx7 = document.getElementById('chartDonut');
	var myPieChart7 = new Chart(ctx7, {
		type: 'pie',
		data: datapie,
		options: optionpie
	});

	/* Radar chart*/
	var ctx = document.getElementById("chartRadar");
	var myChart = new Chart(ctx, {
		type: 'radar',
		data: {
			labels: [

				["Eating", "Dinner"],
				["Drinking", "Water"], "Sleeping", ["Designing", "Graphics"], "Coding", "Cycling", "Running",

			],
			datasets: [{

				label: "Data1",
				data: [65, 59, 66, 45, 56, 55, 40],
				borderColor: "rgba(113, 76, 190, 0.9)",
				borderWidth: "1",
				backgroundColor: "rgba(113, 76, 190, 0.5)"
			}, {
				label: "Data2",
				data: [28, 12, 40, 19, 63, 27, 87],
				borderColor: "rgba(235, 111, 51,0.8)",
				borderWidth: "1",
				backgroundColor: "rgba(235, 111, 51,0.4)"
			}]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			legend: {
				display:false
			},
			scale: {
				angleLines: { color: '#77778e' },
				gridLines: {
					color: 'rgba(119, 119, 142, 0.2)'
				},
				ticks: {
					beginAtZero: true,
				},
				pointLabels: {
					fontColor:'#77778e',
				},
			},

		}
	});

	/* polar chart */
	var ctx = document.getElementById("chartPolar");
	var myChart = new Chart(ctx, {
		type: 'polarArea',
		data: {
			datasets: [{
				data: [18, 15, 9, 6, 19],
				backgroundColor: ['#6259ca', '#53caed', '#01b8ff', '#f16d75', '#29ccbb'],
				hoverBackgroundColor: ['#6259ca', '#53caed', '#01b8ff', '#f16d75', '#29ccbb'],
				borderColor:'transparent',
			}],
			labels: ["Data1", "Data2", "Data3", "Data4"]
		},
		options: {
			scale: {
				gridLines: {
						color: 'rgba(119, 119, 142, 0.2)'
				}
			},
			responsive: true,
			maintainAspectRatio: false,
			legend: {
				labels: {
					fontColor: "#77778e"
				},
			},
		}
	});

});