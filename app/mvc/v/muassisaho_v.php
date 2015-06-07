<?php
namespace APP\MVC\V;

class MUASSISAHO_V {

    public function main($model){
    	$result='';
    	$muassisaho=$model->get_muassisaho();
    	$result.='<div class="btn-group" role="group" aria-label="...">
			  <button id="new_group" type="button" class="btn btn-default"
			  data-toggle="modal" data-target="#myModal">New</button>
			</div>'.\CORE\BC\UI::init()->modal('myModal');
    	if(count($muassisaho)){
    		// output table

    	} else {    		
			$result.='<h4 class="text-danger">No records found in the database</h4>';
    	}
		return $result;
    }

}