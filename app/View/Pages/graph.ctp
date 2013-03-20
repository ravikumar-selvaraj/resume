<?php 
 $one_month_before_date = date("Y-m-d",mktime(0,0,0,date("m")-1,date("d")));
 $current_date = date("Y-m-d"); 
 $count = array();
	while (strtotime($one_month_before_date) < strtotime($current_date)) {
		$one_month_before_date = date ("Y-m-d", strtotime("+1 day", strtotime($one_month_before_date)));
		$count[] = ClassRegistry::init('Profileview')->find('count',array('conditions'=>array('DATE_FORMAT(created_date,"%Y-%m-%d")'=>$one_month_before_date,'uid'=>$this->Session->read('User.uid'))));
	}
?>


<script type="text/javascript">
				var LOCALE = "us";
				var chart_views_y_title = 'Pageviews';
				var chart_views_x_data = [{
									name: 'Views',
									pointInterval: 24 * 3600 * 1000,
									pointStart: Date.UTC(<?php echo date("Y, m, d",mktime(0,0,0,date("m")-2,date("d")+1));?>),
									data : [<?php echo implode(',',$count);?>]
				}];
				var date_day_format = "%m/%d/%Y";
				var date_week_format = "%m/%e";
	
							</script>

					<div id="views_chart_d"></div>
					
					
					<?php echo $this->html->script(array('page/jquery_005','page/highcharts','page/user_view')); ?>