(function($){
	
	$('.info_activation').bind('click', function() {
		var id = $(this).attr('id');
		$('#order_activation_tip_' + id).show();
		$('body').click(function(){
			$('#order_activation_tip_' + id).hide();
		});
		return false;
	});
	
	$('.share-cv').click( function() {
		$(this).popup({
			onOpen: function( o ){
				o.popup.find('form').share_cv_email_form();
			}
		});
		return false;
	});
	
	$('#closeTips').click( 
			function(event) {
				$.ajax({
						type: 'GET',
						url: $(this).attr('href'),
						success: function() {
								$('#friends-check').hide();
						}
					});
				event.preventDefault();
			}
	);
	
})(jQuery);

$(document).ready(function() {
	
	
	if ($('#views_chart_d').length > 0) {
	
		if (LOCALE == 'fr') {
			Highcharts.setOptions({
				lang: {
					months: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 
						'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
					weekdays: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi']
				}
			});
		}
		
	// define the options
	try {	
		views_chart = new Highcharts.Chart({
		      chart: {
		         renderTo: 'views_chart_d',
		         defaultSeriesType: 'area', /*areaspline*/
		         margin: [50, 10, 25, 35],
		         height: 260
		      },
		      credits:{
		    	  enabled:false
		      },
		      title: {
		         text: chart_views_y_title,
			 align: 'left',
			 floating: true,
			 x: 6,
			 y: 35,
			 style: {
				color: '#50a3d9',
				fontSize: '12px'
			    }
		      },
		      xAxis: {
		         type: 'datetime',
	
		    	 title: {
		             text: null
		          }
		      },
		      yAxis: {
			 allowDecimals: false,
		    	 min: 0,
			 lineWidth: 0.5,
			 gridLineWidth: 0.5,
			 gridLineColor: '#cccccc',
		         title: {
		            text: null
		         }
		      },
		      legend: {
		         enabled: false
		      },
		      tooltip: {
		         formatter: function() {
		                   return '<strong>'+ this.series.name +'</strong><br/>'+
		                   Highcharts.dateFormat(date_day_format, this.x) + ': '+ this.y +'';
		         }
		      },
		      plotOptions: {
		    	  area: {
		    	  	fillOpacity: 0.1,
				lineColor: '#50a3d9',
				color: '#50a3d9'
		    	  }
		      },
		      series: chart_views_x_data
		   });
	} catch (err) {
		
	}

	try {	
		$('#downloads_chart_tabLink').bind('click', function(evt) {
			if ($('#downloads_chart_d').length > 0) {
				if (typeof(download_chart) == 'undefined') {
					download_chart = new Highcharts.Chart({
					      chart: {
					         renderTo: 'downloads_chart_d',
					         defaultSeriesType: 'area', /*areaspline*/
					         margin: [50, 10, 25, 35],
						 	 height: 260
					      },
					      credits:{
					    	  enabled:false
					      },
					       title: {
					         text: chart_downloads_y_title,
						 align: 'left',
						 floating: true,
						 x: 6,
						 y: 35,
						 style: {
							color: '#50a3d9',
							fontSize: '12px'
						    }
					      },
					      xAxis: {
					         type: 'datetime',
				
					    	 title: {
					             text: null
					          }
					      },
					      yAxis: {
						 allowDecimals: false,
					    	 min: 0,
						 lineWidth: 0.5,
						 gridLineWidth: 0.5,
						 gridLineColor: '#cccccc',
					         title: {
					            text: null
					         }
					      },
					      legend: {
					         enabled: false
					      },
					      tooltip: {
					         formatter: function() {
					                   return '<strong>'+ this.series.name +'</strong><br/>'+
					                   Highcharts.dateFormat(date_day_format, this.x) + ': '+ this.y +'';
					         }
					      },
					      plotOptions: {
					    	  area: {
					    	  	fillOpacity: 0.1,
							lineColor: '#50a3d9',
							color: '#50a3d9'
					    	  }
					      },
					      series: chart_downloads_x_data
					   });
				}
				evt.preventDefault();
			}});
	} catch (err) {
		
	}
	}
});

