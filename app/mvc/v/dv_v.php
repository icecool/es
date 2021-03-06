<?php
namespace APP\MVC\V;

class DV_V {

    public function main($model){
    	$result='<h3>'.lang('dvmodule','Модуль визуализации данных').':</h3>
    	<br>
    	<ul class="list-group">
		    <li class="list-group-item"><a href="./?c=dv&act=donut">'.lang("report1","Соотношение количества девочек и мальчиков
		    в школах г. Душанбе на 2013-2014 уч. год").'</a></li>
		    <li class="list-group-item"><a href="./?c=dv&act=bar">'.lang("report2","Количество учащихся в средних школах, по районам города Душанбе").'</a></li>
		    <li class="list-group-item"><a href="./?c=dv&act=lines">'.lang("report3","Динамика изменения количества мальчиков и девочек в школах г. Душанбе в период 2006-2013 гг.").'</a></li>
		    <li class="list-group-item"><a href="./?c=dv&act=lnfrm4">'.lang("report4","Динамика изменения кол-ва образовательных учреждений г. Душанбе в период с 2006 по 2013 гг.").'</a></li>
		    <li class="list-group-item"><a href="./?c=dv&act=dbar">'.lang("report5","Показатели общего количества учащихся школ по районам г. Душанбе (2010-2013гг.)").'</a></li>
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
					label: "'.lang("boys","Мальчиков").'"
				},
				{
					value: obj.girls,
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "'.lang("girls","Девочек").'"
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
				    {value: obj.boys, label: "'.lang("boys","Мальчиков").'"},
				    {value: obj.girls, label: "'.lang("girls","Девочек").'"}
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
    	$result.='<h3 class="text-center">'.lang("report1","Соотношение количества девочек и мальчиков в школах г. Душанбе на 2013-2014 уч. год").':</h3>
    	<div id="xgraph"></div>';
		return $result;
    }

    public function lines($model,$ver=0){
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
					label: "'.lang("girls","Девочек").'",
					fillColor : "rgba(219,48,48,0.2)",
					strokeColor : "rgba(219,48,48,1)",
					pointColor : "rgba(219,48,48,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(220,220,220,1)",
					data : [obj[0]["girls"],obj[1]["girls"],obj[2]["girls"],obj[3]["girls"],obj[4]["girls"],obj[5]["girls"],obj[6]["girls"],obj[7]["girls"]]
					},
					{
					label: "'.lang("boys","Мальчиков").'",
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


			var ctx = document.getElementById("chart-area2'.$ver.'").getContext("2d");
				window.myLine = new Chart(ctx).Line(lineChartData, {
					responsive: true
				});


	    	});	    	
			
		});
    	</script>';
    	// style="margin-left:auto;margin-right:auto;"
    	if($ver>0){
    		$result.='<h4 class="text-center" style="color:#555;">
    	'.lang('dynamica','Динамика изменения кол-ва мальчиков и девочек в школах г. Душанбе (2006-2013 гг.):').'</h4>
    	<div id="canvas-holder2'.$ver.'" style="margin-left:50px;">
			<canvas id="chart-area2'.$ver.'" width="520" height="280"/>
		</div>
		<table align="center">
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
    	} else {
    		$result.='<h4 class="text-center form_sep_blue">
    	Динамика изменения количества мальчиков и девочек 
    	в школах г. Душанбе в период 2006-2013 гг.:</h4>
    	<div id="canvas-holder2'.$ver.'" style="margin-left:50px;">
			<canvas id="chart-area2'.$ver.'" width="900" height="400"/>
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
    	}
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

    public function bar2($model,$geoid=2){
        $result='';
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
    	if($geoid==0){
    	$result.='<h4 class="text-center" style="color:#555;">
        Количество учащихся в школах г. Душанбе за 2013-2014 уч. год:</h4>
    	<div id="canvas-holder3_22">
			<canvas id="chart-area3" width="100%" height="500"/>
		</div>
		';
    	} else {
        $result.='<h4 class="text-center" style="color:#555;">
        Количество учащихся в школах г. Душанбе за 2013-2014 уч. год:</h4>
    	<div id="canvas-holder3_2">
			<canvas id="chart-area3" width="900" height="500"/>
		</div>
		';
		}
        return $result;
    }

    public function lnfrm4($model){
    	$result='';
    	$UI=\CORE\BC\UI::init();
    	$UI->pos['link'].='<link href="./ui/css/morris.css" rel="stylesheet">';
    	$UI->pos['js'].='<script src="'.UIPATH.'/ext/js/raphael-min.js"></script>';
    	$UI->pos['js'].='<script src="'.UIPATH.'/ext/js/morris.min.js"></script>';
    	$UI->pos['js'].='<script>
    	$(document).ready(function(){

	    	$.get("./?c=dv&act=lnfrm4data",function(data){
	    		var obj = jQuery.parseJSON( data );
	    		//console.log(obj);
				Morris.Area({
				  element: "xlnfrm4",
				  data: [
				    { y: obj[0]["sol"], a: obj[0]["goibona"], b: obj[0]["ruzona"], c: obj[0]["umumi"] },
				    { y: obj[1]["sol"], a: obj[1]["goibona"],  b: obj[1]["ruzona"], c: obj[1]["umumi"] },
				    { y: obj[2]["sol"], a: obj[2]["goibona"],  b: obj[2]["ruzona"], c: obj[2]["umumi"] },
				    { y: obj[3]["sol"], a: obj[3]["goibona"],  b: obj[3]["ruzona"], c: obj[3]["umumi"] },
				    { y: obj[4]["sol"], a: obj[4]["goibona"],  b: obj[4]["ruzona"], c: obj[4]["umumi"] },
				    { y: obj[5]["sol"], a: obj[5]["goibona"],  b: obj[5]["ruzona"], c: obj[5]["umumi"] },
				    { y: obj[6]["sol"], a: obj[6]["goibona"], b: obj[6]["ruzona"], c: obj[6]["umumi"] },
				    { y: obj[7]["sol"], a: obj[7]["goibona"], b: obj[7]["ruzona"], c: obj[7]["umumi"] }
				  ],
				  xkey: "y",
				  ykeys: ["a", "b", "c"],
				  labels: ["Заочные учреждения", "Очные учреждения", "Общее количество учреждений"]
				});

	    	});	    	
			
		});
    	</script>';
    	$result.='<h3 class="text-center">Динамика изменения кол-ва образовательных учреждений
    	г. Душанбе в период с 2006 по 2013 гг.:</h3>
    	<div id="xlnfrm4"></div>';
		return $result;
    }

    public function dbar($model,$ver=0){
    	$result='';
    	$UI=\CORE\BC\UI::init();
    	$data=$model->dbar();
    	//print_r($data);exit;
		$UI->pos['js'].='<script src="'.UIPATH.'/ext/js/Chart.min.js"></script>';
    	$UI->pos['js'].='<script>
    	$(document).ready(function(){


				var barChartData = {
				    labels: [';
				    $f=false;
				    foreach($data as $rayon=>$sol) {
				    	if($f) $UI->pos['js'].=', ';
				    	$UI->pos['js'].='"'.$rayon.'"';
				    	if(!$f) $f=true;
				    }
				    $UI->pos['js'].='],
				    datasets: [
				        {
				            label: "2010",
				            fillColor: "rgba(151,187,205,0.7)",
				            strokeColor: "rgba(151,187,205,0.7)",
				            highlightFill: "rgba(151,187,205,0.5)",
				            highlightStroke: "rgba(151,187,205,1)",
				            data: [';
				    $f=false;
				    foreach($data as $rayon=>$sol) {
				    	if($f) $UI->pos['js'].=', ';
				    	$UI->pos['js'].='"'.$sol['2010'].'"';
				    	if(!$f) $f=true;
				    }
				    $UI->pos['js'].=']
				        },
				        {
				            label: "2011",
				            fillColor: "rgba(219,201,0,0.7)",
				            strokeColor: "rgba(219,201,0,0.7)",
				            highlightFill: "rgba(219,201,0,0.5)",
				            highlightStroke: "rgba(219,201,0,1)",
				            data: [';
				    $f=false;
				    foreach($data as $rayon=>$sol) {
				    	if($f) $UI->pos['js'].=', ';
				    	$UI->pos['js'].='"'.$sol['2011'].'"';
				    	if(!$f) $f=true;
				    }
				    $UI->pos['js'].=']
				        },
				        {
				            label: "2012",
				            fillColor: "rgba(0,219,29,0.7)",
				            strokeColor: "rgba(0,219,29,0.7)",
				            highlightFill: "rgba(0,219,29,0.5)",
				            highlightStroke: "rgba(0,219,29,1)",
				            data: [';
				    $f=false;
				    foreach($data as $rayon=>$sol) {
				    	if($f) $UI->pos['js'].=', ';
				    	$UI->pos['js'].='"'.$sol['2012'].'"';
				    	if(!$f) $f=true;
				    }
				    $UI->pos['js'].=']
				        },
				        {
				            label: "2013",
				            fillColor: "rgba(220,51,0,0.7)",
				            strokeColor: "rgba(220,51,0,0.7)",
				            highlightFill: "rgba(220,51,0,0.5)",
				            highlightStroke: "rgba(220,51,0,1)",
				            data: [';
				    $f=false;
				    foreach($data as $rayon=>$sol) {
				    	if($f) $UI->pos['js'].=', ';
				    	$UI->pos['js'].='"'.$sol['2013'].'"';
				    	if(!$f) $f=true;
				    }
				    $UI->pos['js'].=']
				        }
				    ]
				};


				var ctx = document.getElementById("xdbar'.$ver.'").getContext("2d");
					window.myBar = new Chart(ctx).Bar(barChartData, {
						legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
						responsive : true
					});
					window.myBar.generateLegend();

		});
    	</script>';
    	if($ver>0){
    		$result.='<h4 class="text-center" style="color:#555;">
    		'.lang('kolvo_uchashixsya','Кол-во учащихся ср. школ по районам г. Душанбе (2010-2013гг.):').'</h4>
	    	<div id="xdbar'.$ver.'-holder" style="margin-left:50px;">
				<canvas id="xdbar'.$ver.'" width="480" height="300"/>
			</div>';
			$result.='<table align="center">
		<tr>
		<td>
			<div style="border:1px solid #97bbcd;background-color:#97bbcd;width:20px;height:15px;display:inline-block;"></div>
			<small> - 2010;</small>
		</td>
		<td width="20"></td>
		<td>
			<div style="border:1px solid #e2d331;background-color:#e6d94c;width:20px;height:15px;display:inline-block;"></div>
			<small> - 2011;</small>
		</td>
		<td width="20"></td>
		<td>
			<div style="border:1px solid #31e248;background-color:#4ce660;width:20px;height:15px;display:inline-block;"></div>
			<small> - 2012;</small>
		</td>
		<td width="20"></td>
		<td>
			<div style="border:1px solid #cd4b4f;background-color:#dc3300;width:20px;height:15px;display:inline-block;"></div>
			<small> - 2013;</small>
		</td>
		</tr>
		</table>
		';
    	} else {
    		$result.='<h3 class="text-center">Показатели общего количества учащихся школ по районам г. Душанбе (2010-2013гг.):</h3>
	    	<div id="xdbar'.$ver.'-holder" style="margin-left:50px;">
				<canvas id="xdbar'.$ver.'" width="1000" height="480"/>
			</div>';
			$result.='<table style="margin-left:340px;margin-top:20px;">
		<tr>
		<td>
			<div style="border:1px solid #97bbcd;background-color:#97bbcd;width:20px;height:15px;display:inline-block;"></div>
			<small> - 2010;</small>
		</td>
		<td width="20"></td>
		<td>
			<div style="border:1px solid #e2d331;background-color:#e6d94c;width:20px;height:15px;display:inline-block;"></div>
			<small> - 2011;</small>
		</td>
		<td width="20"></td>
		<td>
			<div style="border:1px solid #31e248;background-color:#4ce660;width:20px;height:15px;display:inline-block;"></div>
			<small> - 2012;</small>
		</td>
		<td width="20"></td>
		<td>
			<div style="border:1px solid #cd4b4f;background-color:#dc3300;width:20px;height:15px;display:inline-block;"></div>
			<small> - 2013;</small>
		</td>
		</tr>
		</table>
		';
    	}
		return $result;
    }

}