<?php
namespace APP\MVC\V;

class DV_V {

    public function main($model){
    	$result='';
    	//$result.='Data Visualization module';
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
    	$UI->pos['js'].='<script src="'.UIPATH.'/js/raphael-min.js"></script>';
    	$UI->pos['js'].='<script src="'.UIPATH.'/js/morris.min.js"></script>';
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
    	$UI->pos['link'].='<link href="./ui/css/morris.css" rel="stylesheet">';
    	$UI->pos['js'].='<script src="'.UIPATH.'/js/raphael-min.js"></script>';
    	$UI->pos['js'].='<script src="'.UIPATH.'/js/morris.min.js"></script>';
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

}