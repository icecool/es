<?php
namespace APP\MVC\V;

class DV_V {

    public function main($model){
    	$result='<h3>'.lang('dvmodule','Модуль визуализации данных').':</h3>
    	<br>
    	<ul class="list-group">
		    <li class="list-group-item"><a href="./?c=dv&act=donut">Соотношение мальчиков и девочек в школах (2013г.)</a></li>
		    <li class="list-group-item"><a href="./?c=dv&act=bar">Количество учащихся в школах по районам г. Душанбе</a></li>        
		    <li class="list-group-item"><a href="./?c=dv&act=lines">Динамика изменения количества мальчиков и девочек в школах г. Душанбе в период 2006-2013 гг.</a></li>        
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

	    	$.get("./?c=dv&act=lines1",function(data){
	    		var obj = jQuery.parseJSON( data );
	    		//console.log(data);
			//var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
			var lineChartData = {
				labels : [obj[0]["year"],obj[1]["year"],obj[2]["year"],obj[3]["year"],obj[4]["year"],obj[5]["year"],obj[6]["year"],obj[7]["year"]],
				datasets : [
					{
					label: "Девочки",
					fillColor : "rgba(219,48,48,0.2)",
					strokeColor : "rgba(219,48,48,1)",
					pointColor : "rgba(219,48,48,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(220,220,220,1)",
					data : [obj[0]["girls"],obj[1]["girls"],obj[2]["girls"],obj[3]["girls"],obj[4]["girls"],obj[5]["girls"],obj[6]["girls"],obj[7]["girls"]]
					},
					{
					label: "Мальчики",
					fillColor : "rgba(151,187,205,0.2)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					data : [obj[0]["boys"],obj[1]["boys"],obj[2]["boys"],obj[3]["boys"],obj[4]["boys"],obj[5]["boys"],obj[6]["boys"],obj[7]["boys"]]
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
    	// style="margin-left:auto;margin-right:auto;"
    	$result.='<h3 class="text-center form_sep_blue">
    	Динамика изменения количества мальчиков и девочек 
    	в школах г. Душанбе в период 2006-2013 гг.:</h3>
    	<div id="canvas-holder2" style="margin-left:50px;">
			<canvas id="chart-area2" width="900" height="400"/>
		</div>
		<table style="margin-left:240px;margin-top:20px;">
		<tr>
		<td>
			<div style="border:1px solid #97bbcd;background-color:#eaf1f5;width:20px;height:15px;display:inline-block;"></div>
			<small>- кол-во мальчиков;</small>
		</td>
		<td width="100"></td>
		<td>
			<div style="border:1px solid #cd4b4f;background-color:#e4d0d4;width:20px;height:15px;display:inline-block;"></div>
			<small>- кол-во девочек;</small>
		</td>
		</tr>
		</table>
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

    public function bar2($model){
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
        $result.='<h4 class="text-center" style="color:#555;">Количество учащихся школ за 2013-2014 уч.год</h4>
    	<div id="canvas-holder3_2">
			<canvas id="chart-area3" width="900" height="500"/>
		</div>
		';
        return $result;
    }

}