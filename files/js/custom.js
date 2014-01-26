if($('#completed').size()>0){
$('#completed').highcharts({
							chart: {
								plotBackgroundColor: null,
								plotBorderWidth: null,
								plotShadow: false
							},
							title: {
								text: 'Completed Projects'
							},
							tooltip: {
								pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
							},
							plotOptions: {
								pie: {
									allowPointSelect: true,
									cursor: 'pointer',
									dataLabels: {
										enabled: true,
										color: '#000000',
										connectorColor: '#000000',
										format: '<b>{point.name}</b>: {point.percentage:.1f} %'
									}
								}
							},
							series: [{
								type: 'pie',
								name: 'Browser share',
								data: [
									['Police',   45.0],
									['Health',       26.8],
									{
										name: 'Bribery',
										y: 12.8,
										sliced: true,
										selected: true
									},
									['Traffic',    8.5],
									['Wapda',     6.2],
									['Development Work',   0.7]
								]
							}]
						});
}
if($('#failed').size()>0){
$('#failed').highcharts({
							chart: {
								plotBackgroundColor: null,
								plotBorderWidth: null,
								plotShadow: false
							},
							title: {
								text: 'Failed Projects'
							},
							tooltip: {
								pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
							},
							plotOptions: {
								pie: {
									allowPointSelect: true,
									cursor: 'pointer',
									dataLabels: {
										enabled: true,
										color: '#000000',
										connectorColor: '#000000',
										format: '<b>{point.name}</b>: {point.percentage:.1f} %'
									}
								}
							},
							series: [{
								type: 'pie',
								name: 'Browser share',
								data: [
									['Police',   45.0],
									['Health',       26.8],
									{
										name: 'Bribery',
										y: 12.8,
										sliced: true,
										selected: true
									},
									['Traffic',    8.5],
									['Wapda',     6.2],
									['Development Work',   0.7]
								]
							}]
						});
}
if($('#inprogress').size()>0){
$('#inprogress').highcharts({
							chart: {
								plotBackgroundColor: null,
								plotBorderWidth: null,
								plotShadow: false
							},
							title: {
								text: 'In Progress Projects'
							},
							tooltip: {
								//pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
							},
							plotOptions: {
								pie: {
									allowPointSelect: true,
									cursor: 'pointer',
									dataLabels: {
										enabled: true,
										color: '#000000',
										connectorColor: '#000000',
										format: '<b>{point.name}</b>: {point.percentage:.1f} %'
									}
								}
							},
							series: [{
								type: 'pie',
								name: 'Browser share',
								data: [
									['Police',   45.0],
									['Health',       26.8],
									{
										name: 'Bribery',
										y: 12.8,
										sliced: true,
										selected: true
									},
									['Traffic',    8.5],
									['Wapda',     6.2],
									['Development Work',   0.7]
								]
							}]
						});
}
$(document).ready(function(e) {
    $('body').scroll('top','200px');
});