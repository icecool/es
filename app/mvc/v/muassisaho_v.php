<?php
namespace APP\MVC\V;

class MUASSISAHO_V {

    public function main($model){
    	$result='';
    	$muassisaho=$model->get_muassisaho();
    	$result.='<div class="btn-group" role="group" aria-label="...">
			  <p><button id="new_group" type="button" class="btn btn-default"
			  data-toggle="modal" data-target="#myModal1">'.lang('add','Add').'</button></p>
			</div>
			<!-- Modal -->
		    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModal1Label" aria-hidden="true">
		      <div class="modal-dialog">
		        <div class="modal-content">
		          <div class="modal-header">
		            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		            <span aria-hidden="true">&times;</span></button>
		            <h4 class="modal-title" id="myModal1Label">'.lang('newfac','New facility').':</h4>
		          </div>
		          <form id="frm_new_muassisa">
		          <div id="myModal1Body" class="modal-body">
					  <div class="form-group">
					    <label for="Namud">'.lang('factype','Тип учреждения').'</label>
					    '.$this->namudho($model,"Namud").'
					  </div>
					  <div class="form-group">
					    <label for="NameRu">'.lang('facname','Название учреждения').' (ru)</label>
					    <input type="text" class="form-control" id="NameRu" placeholder="'.lang('title','название').'">
					  </div>
					  <div class="form-group">
					    <label for="NameTj">'.lang('facname','Название учреждения').' (tj)</label>
					    <input type="text" class="form-control" id="NameTj" placeholder="'.lang('title','название').'">
					  </div>
					  <div class="form-group">
					    <label for="Director">'.lang('director','Директор').'</label>
					    <input type="text" class="form-control" id="Director" placeholder="'.lang('fio','Ф.И.О.').'">
					  </div>
					  <div class="form-group">
					    <label for="Address">'.lang('address','Адрес').'</label>
					    <input type="text" class="form-control" id="Address" placeholder="'.lang('address','адрес').'">
					  </div>
					  <div class="form-group">
					    <label for="Phone">'.lang('phone','Телефон').'</label>
					    <input type="text" class="form-control" id="Phone" placeholder="'.lang('number','номер').'">
					  </div>
					  <div class="form-group">
					    <label for="Cellphone">'.lang('cellphone','Мобильный').'</label>
					    <input type="text" class="form-control" id="Cellphone" placeholder="'.lang('number','номер').'">
					  </div>

		          </div>
		          <div class="modal-footer">
		            <button type="button" class="btn btn-default" data-dismiss="modal">
		            '.lang('close','Close').'</button>
		            <button type="button" id="add_new_muassisa" class="btn btn-primary">'.lang('add','Add').'</button>
		          </div>
		          </form>
		        </div>
		      </div>
		    </div>
		    <!-- /Modal -->
			';
\CORE\BC\UI::init()->pos['js'].="\n".'<script src="'.UIPATH.'/js/muassisaho.js"></script>';
    	if(count($muassisaho)){
    		// output table
    		$result.='
    		<table class="table table-bordered table-hover" style="width:auto;">
			<thead>
			<tr>
	          <th>id</th>
	          <th>Namudi muassisa</th>
	          <th>Muassisa</th>
	          <th>Director</th>
	          <th>Address</th>
	          <th>Phone</th>
	          <th>Cellphone</th>
	          <th>action</th>
	        </tr>
	        </thead>
	        <tbody>
	        ';
    		foreach($muassisaho as $k => $v){
				$result.='<tr>
				<td>'.$k.'</td>
				<td>'.$v['namud'].'</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>
					edit, del
				</td>
				</tr>';
    		}
    		$result.='</tbody>
    		</table>
    		';
    	} else {    		
			$result.='<h4 class="text-danger">'.lang('nodbrecords','No records found').'</h4>';
    	}
		return $result;
    }

    public function namudho($model,$id,$sel=0){
    	$result='';
    	$namudi_muassisa=$model->get_namudi_muassisa();
    	if(count($namudi_muassisa)>0){
    		$result.='<select class="form-control" id="'.$id.'">'."\n";
    		foreach($namudi_muassisa as $id => $name){
    			$result.='<option value="'.$id.'">'.$name."</option>\n";
    		}
    		$result.="</select>\n";
    	}
    	return $result;
    }

}