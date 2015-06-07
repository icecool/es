<?php
namespace APP\MVC\V;

class XARITA_V {

    public function main($model){
    	$result='';
    	$muassisaho=$model->get_muassisaho();
    	$result.='<div class="btn-group" role="group" aria-label="...">
			  <button id="new_group" type="button" class="btn btn-default"
			  data-toggle="modal" data-target="#myModal">'.lang('add2','Add2').'</button>
			</div>
			'.\CORE\BC\UI::init()->modal('myModal',lang('facilities','Facilities'));
    	if(count($muassisaho)){
    		// output table

    		foreach($muassisaho as $k => $v){

    		}
    	} else {    		
			$result.='<h4 class="text-danger">'.lang('nodbrecords','No records found in the database').'
			</h4>';
    	}
		return $result;
    }

}