<?php
namespace APP\MVC\V;

class DV_V {

    public function main($model){
    	$result='';
    	//$result.='Data Visualization module';
    	$UI=\CORE\BC\UI::init();
    	$UI->pos['js'].='<script src="'.UIPATH.'/ext/js/Chart.min.js"></script>';
    	$UI->pos['js'].='<script>
    	$(document).ready(function(){

    	var doughnutData = [
			{
				value: 300,
				color: "#3581bf",
				highlight: "#2072b5",
				label: "Обработано"
			},
			{
				value: 120,
				color:"#F7464A",
				highlight: "#FF5A5E",
				label: "Осталось"
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
    	</script>';
    	$result.='<div id="canvas-holder">
			<canvas id="chart-area" width="300" height="300"/>
		</div>';
		return $result;
    }

    public function x($model){
    	$array=$model->db2json('muassisaho','m-id',array(),'');
    	echo json_encode($array);
    }

}