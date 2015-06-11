<?php
namespace APP\MVC\V;

class DV_V {

    public function main($model){
    	$result='<h3>'.lang('dvmodule','Модуль визуализации данных').'</h3>
    	<ul>
    		<li><a href="./?c=dv&act=donut">Соотношение мальчиков и девочек в школах (2013г.)</a></li>
    		<li><a href="./?c=dv&act=bar">Количество учащихся в школах по районам г. Душанбе</a></li>
    	</ul>
    	';
		return $result;
    }

    public function x($model){
    	$array=$model->db2json('muassisaho','m-id',array(),'');
    	echo json_encode($array);
    }

    public function donut($model){
    	$result='';
    	$UI=\CORE\BC\UI::init();
    	$UI->pos['js'].='<script src="'.UIPATH.'/ext/js/Chart.min.js"></script>';
    	$UI->pos['js'].='<script>
    	$(document).ready(function(){

	    	$.get("./?c=dv&act=boysgirls",function(data){
	    		var obj = jQuery.parseJSON( data );
	    		var doughnutData = [
				{
					value: obj.boys,
					color: "#3581bf",
					highlight: "#2072b5",
					label: "Мальчиков"
				},
				{
					value: obj.girls,
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "Девочек"
				}

			];

			var ctx = document.getElementById("chart-area").getContext("2d");
			window.myDoughnut = new Chart(ctx).Doughnut(doughnutData, {
				responsive : true,
				animationEasing : "easeOutBounce",
				animateScale : false,
				animateRotate : true,
				percentageInnerCutout : 70
				});
	    	});


	    	
			
		});
    	</script>';
    	$result.='<div id="canvas-holder">
			<canvas id="chart-area" width="300" height="300"/>
		</div>';
		return $result;
    }

    public function donut2($model){
    	$result='';
    	$UI=\CORE\BC\UI::init();
    	$UI->pos['link'].='<link href="./ui/css/morris.css" rel="stylesheet">';
    	$UI->pos['js'].='<script src="'.UIPATH.'/ext/js/raphael-min.js"></script>';
    	$UI->pos['js'].='<script src="'.UIPATH.'/ext/js/morris.min.js"></script>';
    	$UI->pos['js'].='<script>
    	$(document).ready(function(){

	    	$.get("./?c=dv&act=boysgirls",function(data){
	    		var obj = jQuery.parseJSON( data );

				Morris.Donut({
				  element: "xgraph",
				  data: [
				    {value: obj.boys, label: "Мальчики"},
				    {value: obj.girls, label: "Девочки"}
				  ],
				  colors: [
				    "#0b62a4",
				    "#ce4844"
				  ]
				  //, formatter: function (x) { return x + "%"}
				}).on("click", function(i, row){
				  console.log(i, row);
				});

	    	});	    	
			
		});
    	</script>';
    	$result.='<h3 class="text-center">Количество девочек и мальчиков в школах г.
    	Душанбе за 2013-2014 уч. год:</h3>
    	<div id="xgraph"></div>';
		return $result;
    }

    public function lines($model){
    	$result='';
    	$UI=\CORE\BC\UI::init();
    	$UI->pos['js'].='<script src="'.UIPATH.'/ext/js/Chart.min.js"></script>';
    	$UI->pos['js'].='<script>
    	$(document).ready(function(){

	    	$.get("./?c=dv&act=boysgirls",function(data){
	    		var obj = jQuery.parseJSON( data );

			var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
			var lineChartData = {
				labels : ["January","February","March","April","May","June","July"],
				datasets : [
					{
					label: "My First dataset",
					fillColor : "rgba(220,220,220,0.2)",
					strokeColor : "rgba(220,220,220,1)",
					pointColor : "rgba(220,220,220,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(220,220,220,1)",
					data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
					},
					{
					label: "My Second dataset",
					fillColor : "rgba(151,187,205,0.2)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
					}
				]

			}


			var ctx = document.getElementById("chart-area2").getContext("2d");
				window.myLine = new Chart(ctx).Line(lineChartData, {
					responsive: true
				});


	    	});	    	
			
		});
    	</script>';
    	$result.='<h3 class="text-center">Количество учащихся по районам в школах г.
    	Душанбе за 2013-2014 уч. год:</h3>
    	<div id="canvas-holder2">
			<canvas id="chart-area2" width="800" height="400"/>
		</div>
		';
		return $result;
    }

    public function bar($model){
    	$result='';
    	$geoid=2;
    	$geo=array(
    		'2'=>'И. Сомони',
    		'3'=>'Сино',
    		'4'=>'Шохмансур',
    		'5'=>'Фирдавси',
    		);
    	if(isset($_GET['geoid'])){
    		if(isset($geo[$_GET['geoid']])){
    			$geoid=(int) $_GET['geoid'];
    		}
    	}
    	$UI=\CORE\BC\UI::init();
    	$geolist='<select id="geolist">';
    	foreach ($geo as $g => $gname) {
    		$sel='';
    		if($g==$geoid) $sel=' selected="selected"';
    		$geolist.='<option value="'.$g.'"'.$sel.'> '.$gname.' </option>';
    	}
    	$geolist.='</select>';

    	$UI->pos['js'].='<script src="'.UIPATH.'/ext/js/Chart.min.js"></script>';
    	$UI->pos['js'].='<script>
    	$(document).ready(function(){

	    	$.get("./?c=dv&act=shumora",function(data){
	    		//var obj = jQuery.parseJSON( data );
	    		//console.log(obj);

				'.$model->shumora_maktab_rayon($geoid).'

				var ctx = document.getElementById("chart-area3").getContext("2d");
					window.myBar = new Chart(ctx).Bar(barChartData, {
						responsive : true
					});

	    	});

			$("#geolist").change(function(){
				var xgeoid = $(this).val();
				window.location.href = "./?c=dv&act=bar&geoid="+xgeoid;
			});
			
		});
    	</script>';
    	$result.='<h3 class="text-center">Количество учащихся школ района '.$geolist.' г.
    	Душанбе за 2013-2014 уч. год:</h3>
    	<div id="canvas-holder3">
			<canvas id="chart-area3" width="900" height="500"/>
		</div>
		';
		return $result;
    }

}