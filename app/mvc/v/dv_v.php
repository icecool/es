<?php
namespace APP\MVC\V;

class DV_V {

    public function main($model){
    	$result='Data Visualization module';
    	$UI=\CORE\BC\UI::init();
    	$UI->pos['js'].='<script src="'.UIPATH.'/ext/js/Chart.min.js"></script>';
    	$UI->pos['js'].='<script>

    	</script>';
		return $result;
    }

    public function x($model){
    	$array=$model->db2json('muassisaho','m-id',array(),'');
    	echo json_encode($array);
    }

}