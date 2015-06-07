<?php
namespace APP\MVC\V;

class MUASSISAHO_V {

    public function main($model){
    	$result='';
    	$muassisaho=$model->get_muassisaho();
    	$result.='<div class="btn-group" role="group" aria-label="...">
			  <button id="new_group" type="button" class="btn btn-default"
			  data-toggle="modal" data-target="#myModal">'.lang('add','Add').'</button>
			</div>
			'.\CORE\BC\UI::init()->modal('myModal',lang('newfac','New facility'));
    	if(count($muassisaho)){
    		// output table
    		$result.='<table class="table table-bordered table-hover" style="width:auto;">
			<thead><tr>
	          <th>#</th>
	          <th>Group</th>
	          <th>Action</th>
	        </tr></thead><tbody>
	        ';
    		foreach($muassisaho as $k => $v){

    		}
    		$result.='</tbody></table>
    		';
    	} else {    		
			$result.='<h4 class="text-danger">'.lang('nodbrecords','No records found in the database').'
			</h4>';
    	}
		return $result;
    }

}