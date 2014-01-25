<!-- JQueryUI v1.9.2 --> 
<script src="<?php echo base_url()?>files/theme/scripts/jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js"></script> 

<!-- JQueryUI Touch Punch --> 
<!-- small hack that enables the use of touch events on sites using the jQuery UI user interface library --> 
<script src="<?php echo base_url()?>files/theme/scripts/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script> 

<!-- MiniColors --> 
<script src="<?php echo base_url()?>files/theme/scripts/jquery-miniColors/jquery.miniColors.js"></script> 
<script src="<?php echo base_url()?>files/theme/scripts/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url()?>files/theme/scripts/form_validator.js" type="text/javascript"></script> 
<!-- Select2 --> 
<script src="<?php echo base_url()?>files/theme/scripts/select2/select2.js"></script> 

<!-- Themer --> 
<script>
	var themerPrimaryColor = '#71c39a';
	</script> 
<script src="<?php echo base_url()?>files/theme/scripts/jquery.cookie.js"></script> 
<script src="<?php echo base_url()?>files/theme/scripts/themer.js"></script> 
<script type="text/javascript" src="https://www.google.com/jsapi"></script> 

<!-- Sparkline --> 
<script src="<?php echo base_url()?>files/theme/scripts/jquery.sparkline.min.js" type="text/javascript"></script> 
<script type="text/javascript">
/*
	function genSparklines()
	{
		if ($('.sparkline').length)
		{
			$.each($('.sparkline'), function(k,v) 
			{
				var data = [[1, 3+charts.utility.randNum()], [2, 5+charts.utility.randNum()], [3, 8+charts.utility.randNum()], [4, 11+charts.utility.randNum()],[5, 14+charts.utility.randNum()],[6, 17+charts.utility.randNum()],[7, 20+charts.utility.randNum()], [8, 15+charts.utility.randNum()], [9, 18+charts.utility.randNum()], [10, 22+charts.utility.randNum()]];
			 	$(v).sparkline(data, 
				{ 
					width: 70,
					height: 28,
					lineColor: themerPrimaryColor,
					fillColor: '#fafafa',
					spotColor: '#467e8c',
					maxSpotColor: '#9FC569',
					minSpotColor: '#ED7A53',
					spotRadius: 3,
					lineWidth: 2
				});
			});
		}
	}
	$(function()
	{
		genSparklines();
	});*/
	</script> 

<!--  Flot (Charts) JS --> 
<script src="<?php echo base_url()?>files/theme/scripts/flot/jquery.flot.js" type="text/javascript"></script> 
<script src="<?php echo base_url()?>files/theme/scripts/flot/jquery.flot.pie.js" type="text/javascript"></script> 
<script src="<?php echo base_url()?>files/theme/scripts/flot/jquery.flot.tooltip.js" type="text/javascript"></script> 
<script src="<?php echo base_url()?>files/theme/scripts/flot/jquery.flot.selection.js"></script> 
<script src="<?php echo base_url()?>files/theme/scripts/flot/jquery.flot.resize.js" type="text/javascript"></script> 
<script src="<?php echo base_url()?>files/theme/scripts/flot/jquery.flot.orderBars.js" type="text/javascript"></script> 
<script>
	var charts = 
	{
		// init all charts
		init: function()
		{
						// mark weekends on the website traffic main graph
			this.website_traffic_graph.options.markings = this.utility.weekendAreas;

			// init website traffic main graph
			this.website_traffic_graph.init();

			// init website traffic toolbar
			this.utility.website_traffic_toolbar();

			// init website traffic overview graph
			this.website_traffic_overview.init();

			// connect website traffic graphs
			this.utility.website_traffic_connect();

			// init traffic sources pie
			this.traffic_sources_pie.init();
											},

		// utility class
		utility:
		{
			chartColors: [ "#71c39a", "#444", "#777", "#999", "#DDD", "#EEE" ],
			chartBackgroundColors: ["#fff", "#fff"],

			applyStyle: function(that)
			{
				that.options.colors = charts.utility.chartColors;
				that.options.grid.backgroundColor = { colors: charts.utility.chartBackgroundColors };
				that.options.grid.borderColor = charts.utility.chartColors[0];
				that.options.grid.color = charts.utility.chartColors[0];
			},
			
						// connect website_traffic_graph with website_traffic_overview
			website_traffic_connect: function()
			{
				$("#placeholder").bind("plotselected", function (event, ranges) 
				{
			        // do the zooming // rewrite chart object
			        charts.website_traffic_graph.plot = $.plot(
						$("#placeholder"), 
						[{ data: charts.website_traffic_graph.d1, label: "Visitors" }, { data: charts.website_traffic_graph.d2, label: "Conversions" }],
						$.extend(true, {}, charts.website_traffic_graph.options, {
			            	xaxis: { min: ranges.xaxis.from, max: ranges.xaxis.to }
						})
					);

			        // don't fire event on the overview to prevent eternal loop
			        charts.website_traffic_overview.plot.setSelection(ranges, true);

			     	// enable website traffic clear selection button
			    	$('#websiteTrafficClear').prop('disabled', false);
			    });
			    
			    $("#overview").bind("plotselected", function (event, ranges) 
				{
					// set selection
			    	charts.website_traffic_graph.plot.setSelection(ranges);

			    	// enable website traffic clear selection button
			    	$('#websiteTrafficClear').prop('disabled', false);
			    });
			},

			website_traffic_toolbar: function()
			{
				// clear selection button
				$("#websiteTrafficClear").click(function()
				{
					charts.utility.website_traffic_clear();
				});

				// last 24 hours button
				$('#websiteTraffic24Hours').click(function()
				{
					charts.website_traffic_graph.plot.setSelection(
					{
						xaxis: 
						{
							from: 1362787200000,
							to: 1362873600000						}
					});
				});

				// last 7 days button
				$('#websiteTraffic7Days').click(function()
				{
					charts.website_traffic_graph.plot.setSelection(
					{
						xaxis: 
						{
							from: 1362268800000,
							to: 1362873600000						}
					});
				});

				// last 14 days button
				$('#websiteTraffic14Days').click(function()
				{
					charts.website_traffic_graph.plot.setSelection(
					{
						xaxis: 
						{
							from: 1361664000000,
							to: 1362873600000						}
					});
				});
			},
			
			// clear selection on website traffic charts
			website_traffic_clear: function()
			{
				// disable clear button
				$('#websiteTrafficClear').prop('disabled', true);
				
				// clear selection on website traffic main chart / rewrite chart object
				charts.website_traffic_graph.plot = $.plot(
					$("#placeholder"), 
					[{ data: charts.website_traffic_graph.d1, label: "Visitors" }, { data: charts.website_traffic_graph.d2, label: "Conversions" }],
					charts.website_traffic_graph.options
				);

				// clear selection on website traffic overview chart
				charts.website_traffic_overview.plot.clearSelection();
			},
			
			// helper for returning the weekends in a period
			weekendAreas: function(axes)
			{
				var markings = [];
		        var d = new Date(axes.xaxis.min);
		        // go to the first Saturday
		        d.setUTCDate(d.getUTCDate() - ((d.getUTCDay() + 1) % 7))
		        d.setUTCSeconds(0);
		        d.setUTCMinutes(0);
		        d.setUTCHours(0);
		        var i = d.getTime();
		        do {
		            // when we don't set yaxis, the rectangle automatically
		            // extends to infinity upwards and downwards
		            markings.push({ xaxis: { from: i, to: i + 2 * 24 * 60 * 60 * 1000 } });
		            i += 7 * 24 * 60 * 60 * 1000;
		        } while (i < axes.xaxis.max);
		
		        return markings;
			},
						
			// generate random number for charts
			randNum: function()
			{
				return (Math.floor( Math.random()* (1+40-20) ) ) + 20;
			}
		},

				// main website traffic chart
		website_traffic_graph:
		{
			// data
			d1: [[1360368000000, 3159],[1360454400000, 2181],[1360540800000, 3025],[1360627200000, 2194],[1360713600000, 2115],[1360800000000, 3248],[1360886400000, 3459],[1360972800000, 2328],[1361059200000, 3222],[1361145600000, 2624],[1361232000000, 3930],[1361318400000, 3469],[1361404800000, 3495],[1361491200000, 2941],[1361577600000, 2879],[1361664000000, 2016],[1361750400000, 2110],[1361836800000, 2541],[1361923200000, 3369],[1362009600000, 2243],[1362096000000, 3309],[1362182400000, 2688],[1362268800000, 3594],[1362355200000, 2160],[1362441600000, 3203],[1362528000000, 2048],[1362614400000, 2175],[1362700800000, 3213],[1362787200000, 3204],[1362873600000, 3082]],
			d2: [[1360368000000, 629],[1360454400000, 468],[1360540800000, 487],[1360627200000, 545],[1360713600000, 434],[1360800000000, 625],[1360886400000, 641],[1360972800000, 661],[1361059200000, 554],[1361145600000, 668],[1361232000000, 536],[1361318400000, 683],[1361404800000, 561],[1361491200000, 409],[1361577600000, 691],[1361664000000, 700],[1361750400000, 648],[1361836800000, 583],[1361923200000, 520],[1362009600000, 680],[1362096000000, 674],[1362182400000, 562],[1362268800000, 529],[1362355200000, 502],[1362441600000, 513],[1362528000000, 451],[1362614400000, 604],[1362700800000, 426],[1362787200000, 586],[1362873600000, 546]],

			// will hold the chart object
			plot: null,
			
			// chart options
			options:
			{
		        xaxis: { mode: "time", tickLength: 5 },
		        selection: { mode: "x" },
		        grid: { 
			        markingsColor: "rgba(0,0,0, 0.02)",
			        backgroundColor : { },
					borderColor : "#f1f1f1",
					borderWidth: 0,
					color : "#DA4C4C",
					hoverable : true,
					clickable: true
			    },
		        series : {
					lines : {
						show : true,
						fill: true
					},
					points : {
						show : true
					}
				},
				colors: [],
				tooltip: true,
				tooltipOpts: {
					content: "%x: <strong>%y %s</strong>",
					dateFormat: "%y-%0m-%0d",
					shifts: {
						x: 10,
						y: 20
					},
					defaultTheme: false
				},
				legend: {
			        show: true,
			        noColumns: 2
			    }
		    },

		 	// initialize
			init: function()
			{
				// apply styling
				charts.utility.applyStyle(this);
				
				// first correct the timestamps - they are recorded as the daily
			    // midnights in UTC+0100, but Flot always displays dates in UTC
			    // so we have to add one hour to hit the midnights in the plot
			    for (var i = 0; i < this.d1.length; ++i)
			    {
			    	this.d1[i][0] += 60 * 60 * 1000;
			    	this.d2[i][0] += 60 * 60 * 1000;
			    }

				// create the chart object
			    this.plot = $.plot(
					$("#placeholder"), 
					[{ data: this.d1, label: "Visitors" }, { data: this.d2, label: "Conversions" }], 
					this.options
				);
			}
		},

		// website traffic overview chart
		website_traffic_overview: 
		{
			// data
			d1: [[1360368000000, 3159],[1360454400000, 2181],[1360540800000, 3025],[1360627200000, 2194],[1360713600000, 2115],[1360800000000, 3248],[1360886400000, 3459],[1360972800000, 2328],[1361059200000, 3222],[1361145600000, 2624],[1361232000000, 3930],[1361318400000, 3469],[1361404800000, 3495],[1361491200000, 2941],[1361577600000, 2879],[1361664000000, 2016],[1361750400000, 2110],[1361836800000, 2541],[1361923200000, 3369],[1362009600000, 2243],[1362096000000, 3309],[1362182400000, 2688],[1362268800000, 3594],[1362355200000, 2160],[1362441600000, 3203],[1362528000000, 2048],[1362614400000, 2175],[1362700800000, 3213],[1362787200000, 3204],[1362873600000, 3082]],
			d2: [[1360368000000, 629],[1360454400000, 468],[1360540800000, 487],[1360627200000, 545],[1360713600000, 434],[1360800000000, 625],[1360886400000, 641],[1360972800000, 661],[1361059200000, 554],[1361145600000, 668],[1361232000000, 536],[1361318400000, 683],[1361404800000, 561],[1361491200000, 409],[1361577600000, 691],[1361664000000, 700],[1361750400000, 648],[1361836800000, 583],[1361923200000, 520],[1362009600000, 680],[1362096000000, 674],[1362182400000, 562],[1362268800000, 529],[1362355200000, 502],[1362441600000, 513],[1362528000000, 451],[1362614400000, 604],[1362700800000, 426],[1362787200000, 586],[1362873600000, 546]],

			// will hold the chart object
			plot: null,

			// chart options
			options: 
			{
		        series: {
			        /*
		            bars: {
						show: true,
	                    lineWidth: 35,
	                    align: "left"
					},
					*/
					lines: { show: true, lineWidth: 1, fill: true },
	                shadowSize: 0
		        },
		        xaxis: { ticks: [], mode: "time" },
		        yaxis: { ticks: [], min: 0, autoscaleMargin: 0.1 },
		        selection: { mode: "x" },
		        grid: {
		        	borderColor : "#DA4C4C",
		        	borderWidth: 0,
		        	minBorderMargin: 0,
		        	axisMargin: 0,
		        	labelMargin: 0,
		        	margin: 0,
		        	backgroundColor : {}
			    },
			    colors: [],
			    legend: {
			        show: false
			    }
		    },

			// initialize
			init: function()
			{
				// apply styling
				charts.utility.applyStyle(this);
				
				// first correct the timestamps - they are recorded as the daily
			    // midnights in UTC+0100, but Flot always displays dates in UTC
			    // so we have to add one hour to hit the midnights in the plot
			    for (var i = 0; i < this.d1.length; ++i)
			    {
			    	this.d1[i][0] += 60 * 60 * 1000;
			    	this.d2[i][0] += 60 * 60 * 1000;
			    }

			    // create chart object
			    this.plot = $.plot(
					$("#overview"), 
					[{ data: this.d1, label: "Visitors" }, { data: this.d2, label: "Conversions" }], 
					this.options
				);
			}
		},

		traffic_sources_pie: 
		{
			// data
			data: [
				{ label: "organic",  data: 60 },
				{ label: "direct",  data: 22.1 },
				{ label: "referral",  data: 16.9 },
				{ label: "cpc",  data: 1 }
			],
			
			// chart object
			plot: null,
			
			// chart options
			options: {
				series: {
		            pie: {
		                show: true,
		                redraw: true,
		                radius: 1,
		                tilt: 0.9,
		                label: {
		                    show: true,
		                    radius: 1,
		                    formatter: function(label, series){
		                        return '<div style="font-size:8pt;text-align:center;padding:5px;color:#fff;">'+Math.round(series.percent)+'%</div>';
		                    },
		                    background: { opacity: 0.8 }
		                }
		            }
		        },
		        legend: {
		            show: true
		        },
		        colors: [],
		        grid: { hoverable: true },
		        tooltip: true,
				tooltipOpts: {
					content: "<strong>%y% %s</strong>",
					dateFormat: "%y-%0m-%0d",
					shifts: {
						x: 10,
						y: 20
					},
					defaultTheme: false
				}
			},
			
			// initialize
			init: function()
			{
				// apply styling
				charts.utility.applyStyle(this);
				
				this.plot = $.plot($("#pie"), this.data, this.options);
			}
		},

		// traffic sources dataTables
		// we are now using Google Charts instead of Flot
		traffic_sources_dataTables:
		{
			// tables data
			data: 
			{
				tableSources:  
				{
					data: null,
					init: function()
					{
						var data = new google.visualization.DataTable();
				        data.addColumn('string', 'Source');
				        data.addColumn('string', 'Medium');
				        data.addColumn('number', 'Visits');
				        data.addColumn('number', 'Pg.Views');
				        data.addColumn('string', 'avg.time');

				        data.addRows(7);
				        data.setCell(0, 0, 'google', null, {'style': 'text-align: center;'});
				        data.setCell(0, 1, 'organic', null, {'style': 'text-align: center;'});
				        data.setCell(0, 2, 89, null, {'style': 'text-align: center;'});
				        data.setCell(0, 3, 299, null, {'style': 'text-align: center;'});
				        data.setCell(0, 4, '00:01:48', null, {'style': 'text-align: center;'});
				        data.setCell(1, 0, '(direct)', null, {'style': 'text-align: center;'});
				        data.setCell(1, 1, '(none)', null, {'style': 'text-align: center;'});
				        data.setCell(1, 2, 14, null, {'style': 'text-align: center;'});
				        data.setCell(1, 3, 34, null, {'style': 'text-align: center;'});
				        data.setCell(1, 4, '00:03:15', null, {'style': 'text-align: center;'});
				        data.setCell(2, 0, 'yahoo', null, {'style': 'text-align: center;'});
				        data.setCell(2, 1, 'organic', null, {'style': 'text-align: center;'});
				        data.setCell(2, 2, 3, null, {'style': 'text-align: center;'});
				        data.setCell(2, 3, 3, null, {'style': 'text-align: center;'});
				        data.setCell(2, 4, '00:00:00', null, {'style': 'text-align: center;'});
				        data.setCell(3, 0, 'ask', null, {'style': 'text-align: center;'});
				        data.setCell(3, 1, 'organic', null, {'style': 'text-align: center;'});
				        data.setCell(3, 2, 1, null, {'style': 'text-align: center;'});
				        data.setCell(3, 3, 3, null, {'style': 'text-align: center;'});
				        data.setCell(3, 4, '00:01:34', null, {'style': 'text-align: center;'});
				        data.setCell(4, 0, 'bing', null, {'style': 'text-align: center;'});
				        data.setCell(4, 1, 'organic', null, {'style': 'text-align: center;'});
				        data.setCell(4, 2, 1, null, {'style': 'text-align: center;'});
				        data.setCell(4, 3, 1, null, {'style': 'text-align: center;'});
				        data.setCell(4, 4, '00:00:00', null, {'style': 'text-align: center;'});
				        data.setCell(5, 0, 'conduit', null, {'style': 'text-align: center;'});
				        data.setCell(5, 1, 'organic', null, {'style': 'text-align: center;'});
				        data.setCell(5, 2, 1, null, {'style': 'text-align: center;'});
				        data.setCell(5, 3, 1, null, {'style': 'text-align: center;'});
				        data.setCell(5, 4, '00:00:00', null, {'style': 'text-align: center;'});
				        data.setCell(6, 0, 'google', null, {'style': 'text-align: center;'});
				        data.setCell(6, 1, 'cpc', null, {'style': 'text-align: center;'});
				        data.setCell(6, 2, 1, null, {'style': 'text-align: center;'});
				        data.setCell(6, 3, 1, null, {'style': 'text-align: center;'});
				        data.setCell(6, 4, '00:00:00', null, {'style': 'text-align: center;'});

				        this.data = data;
				        return data;
					}
				},
				tableReffering:
				{
					data: null,
					init: function()
					{
						var data = new google.visualization.DataTable();
						data.addColumn('string', 'Source');
				        data.addColumn('number', 'Pg.Views');
				        data.addColumn('string', 'avg.time');
				        data.addColumn('string', 'Exits');
				        
						data.addRows(6);
						data.setCell(0, 0, 'google.ro');
						data.setCell(0, 1, 14, null, {'style': 'text-align: center;'});
						data.setCell(0, 2, '00:05:51', null, {'style': 'text-align: center;'});
						data.setCell(0, 3, '3', null, {'style': 'text-align: center;'});
						data.setCell(1, 0, 'search.sweetim.com');
						data.setCell(1, 1, 5, null, {'style': 'text-align: center;'});
						data.setCell(1, 2, '00:03:29', null, {'style': 'text-align: center;'});
						data.setCell(1, 3, '1', null, {'style': 'text-align: center;'});
						data.setCell(2, 0, 'start.funmoods.com');
						data.setCell(2, 1, 5, null, {'style': 'text-align: center;'});
						data.setCell(2, 2, '00:01:02', null, {'style': 'text-align: center;'});
						data.setCell(2, 3, '1', null, {'style': 'text-align: center;'});
						data.setCell(3, 0, 'google.md');
						data.setCell(3, 1, 2, null, {'style': 'text-align: center;'});
						data.setCell(3, 2, '00:03:56', null, {'style': 'text-align: center;'});
						data.setCell(3, 3, '1', null, {'style': 'text-align: center;'});
						data.setCell(4, 0, 'searchmobileonline.com');
						data.setCell(4, 1, 2, null, {'style': 'text-align: center;'});
						data.setCell(4, 2, '00:02:21', null, {'style': 'text-align: center;'});
						data.setCell(4, 3, '1', null, {'style': 'text-align: center;'});
						data.setCell(5, 0, 'google.com');
						data.setCell(5, 1, 1, null, {'style': 'text-align: center;'});
						data.setCell(5, 2, '00:00:00', null, {'style': 'text-align: center;'});
						data.setCell(5, 3, '1', null, {'style': 'text-align: center;'});
						
						this.data = data;
						return data;
					}
				}
			},
			
			// chart
			chart: 
			{
				tableSources: null,
				tableReffering: null
			},
			
			// options
			options: 
			{
				tableSources: 
				{
					page: 'enable',
					pageSize: 6,
					allowHtml: true,
					cssClassNames: {
						headerRow: 'tableHeaderRow',
						tableRow: 'tableRow',
						selectedTableRow: 'selectedTableRow',
						hoverTableRow: 'hoverTableRow'
					},
					width: '100%',
					alternatingRowStyle: false,
					pagingSymbols: { prev: '<span class="btn btn-inverse">prev</btn>', next: '<span class="btn btn-inverse">next</span>' }
				},
				
				tableReffering:
				{
					page: 'enable',
					pageSize: 6,
					allowHtml: true,
					cssClassNames: {
						headerRow: 'tableHeaderRow',
						tableRow: 'tableRow',
						selectedTableRow: 'selectedTableRow',
						hoverTableRow: 'hoverTableRow'
					},
					width: '100%',
					alternatingRowStyle: false,
					pagingSymbols: { prev: '<span class="btn btn-inverse">prev</btn>', next: '<span class="btn btn-inverse">next</span>' }
				}
			},
			
			// initialize
			init: function()
			{
				// data
				//charts.traffic_sources_dataTables.data.tableSources.init();
				//charts.traffic_sources_dataTables.data.tableReffering.init();
				
				// charts
				//charts.traffic_sources_dataTables.drawTableSources();
				//charts.traffic_sources_dataTables.drawTableReffering();
			},

			// draw Traffic Sources Table
			drawTableSources: function()
			{
				this.chart.tableSources = new google.visualization.Table(document.getElementById('dataTableSources'));
				this.chart.tableSources.draw(this.data.tableSources.data, this.options.tableSources);
			},

			// draw Refferals Table
			drawTableReffering: function()
			{
				this.chart.tableReffering = new google.visualization.Table(document.getElementById('dataTableReffering'));
				this.chart.tableReffering.draw(this.data.tableReffering.data, this.options.tableReffering);
			}
		}
							};

	$(function()
	{
		// initialize charts
		//charts.init();
	});
	</script> 

<!-- Resize Script --> 
<script src="<?php echo base_url()?>files/theme/scripts/jquery.ba-resize.js"></script> 

<!-- Uniform --> 
<script src="<?php echo base_url()?>files/theme/scripts/pixelmatrix-uniform/jquery.uniform.min.js"></script> 

<!-- Bootstrap Script --> 
<script src="<?php echo base_url()?>files/bootstrap/js/bootstrap.min.js"></script> 

<!-- Bootstrap Extended --> 
<script src="<?php echo base_url()?>files/bootstrap/extend/bootstrap-select/bootstrap-select.js"></script> 
<script src="<?php echo base_url()?>files/bootstrap/extend/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script> 
<script src="<?php echo base_url()?>files/bootstrap/extend/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js"></script> 
<script src="<?php echo base_url()?>files/bootstrap/extend/jasny-bootstrap/js/jasny-bootstrap.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url()?>files/bootstrap/extend/jasny-bootstrap/js/bootstrap-fileupload.js" type="text/javascript"></script> 
<script src="<?php echo base_url()?>files/bootstrap/extend/bootbox.js" type="text/javascript"></script> 
<script src="<?php echo base_url()?>files/bootstrap/extend/bootstrap-wysihtml5/js/wysihtml5-0.3.0_rc2.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url()?>files/bootstrap/extend/bootstrap-wysihtml5/js/bootstrap-wysihtml5-0.0.2.js" type="text/javascript"></script> 

<!-- Custom Onload Script --> 
<script src="<?php echo base_url()?>files/theme/scripts/load.js"></script> 

<!-- Layout Options --> 
<script src="<?php echo base_url()?>files/theme/scripts/layout.js"></script> 
<script>
	//Load the Visualization API and the piechart package.
	google.load('visualization', '1.0', {'packages':['table', 'corechart']});
	
	// Set a callback to run when the Google Visualization API is loaded.
	google.setOnLoadCallback(charts.traffic_sources_dataTables.init);
	</script>