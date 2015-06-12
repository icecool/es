<?php
namespace APP\MVC\V;

class MUASSISAHO_V {

    public function main($model){
    	$result='';
    	$lang=\CORE::init()->lang;
    	$muassisaho=$model->get_muassisaho();
    	$namudi_muassisa=$model->get_namudi_muassisa();
    	$result.='<div class="btn-group" role="group" aria-label="...">
    		<h3>'.lang("spisok_uch","Список образовательных учреждений").':</h3>
			  <p><button id="new_muassisa" type="button" class="btn btn-default"
			  data-toggle="modal" data-target="#myModal1">'.lang('add','Добавить').'</button>
			  </p>
			</div>
			<!-- Modal -->
		    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModal1Label" aria-hidden="true">
		      <div class="modal-dialog">
		        <div class="modal-content">
		          <div class="modal-header">
		            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		            <span aria-hidden="true">&times;</span></button>
		            <h4 class="modal-title" id="myModal1Label">'.lang('newfac','Новое учреждение').':</h4>
		          </div>
		          <form id="frm_new_muassisa">
		          <div id="myModal1Body" class="modal-body">
					  <div class="form-group">
					    <label for="Namud">'.lang('factype','Тип учреждения').'</label>
					    '.$this->namudho($namudi_muassisa,"Namud").'
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
					    <label for="Address">'.lang('adres','Адрес').'</label>
					    <input type="text" class="form-control" id="Address" placeholder="'.lang('adres','адрес').'">
					  </div>
					  <div class="form-group">
					    <label for="Phone">'.lang('telefon','Телефон').'</label>
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
		            <button type="button" id="muassisa_add" class="btn btn-primary">'.lang('add','Add').'</button>
		          </div>
		          </form>
		        </div>
		      </div>
		    </div>
		    <!-- /Modal -->
			';
\CORE\BC\UI::init()->pos['js'].="\n".'<script src="'.UIPATH.'/js/muassisaho.js"></script>';
    	if(count($muassisaho)>0){
    		// output table
    		$result.='<!--<br><code>я думаю, может не стоит тут выводить все поля, а выводить их при 
    		редактировании, т.к. получается очень длинным, или все же лучше делать полным, 
    		чтобы было все видно?</code>-->
    		<table class="table table-bordered table-hover" style="width:auto;">
			<thead>
			<tr>
	          <th>id</th>
	          <th>'.lang('facility','Учреждение').'</th>
	          <th>'.lang('type','Тип').'</th>
	          <th>'.lang('director','Директор').'</th>
	          <th>'.lang('adres','Адрес').'</th>
	          <th>'.lang('telefon','Телефон').'</th>
	          <th>'.lang('cellphone','Мобильный').'</th>
	          <th>'.lang('action','Действие').'</th>
	        </tr>
	        </thead>
	        <tbody>
	        ';
    		foreach($muassisaho as $k => $v){
    			$namud_title='';
    			if(isset($namudi_muassisa[$v['namud']])) $namud_title=$namudi_muassisa[$v['namud']];
				$result.='<tr>
				<td>'.$k.'</td>
				<td>'.$v['name_'.$lang].'</td>
				<td>'.$namud_title.'</td>
				<td>'.$v['director'].'</td>
				<td>'.$v['address'].'</td>
				<td>'.$v['phone'].'</td>
				<td>'.$v['cellphone'].'</td>
				<td rel="'.$k.'" class="text-center">
					<a role="menuitem" tabindex="-1" class="muassisa_edit" href="#edit" title="'.lang('edit','Редактировать').'">
			    		<i class="glyphicon glyphicon-edit"></i>
			    	</a>
			    	&nbsp;
					<a role="menuitem" tabindex="-1" class="muassisa_del" href="#del" title="'.lang('delete','Удалить').'">
			    		<i class="glyphicon glyphicon-remove"></i>
			    	</a>
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

    public function namudho($namudi_muassisa,$id,$sel=0){
    	$result='';
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