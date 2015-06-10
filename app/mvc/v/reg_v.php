<?php
namespace APP\MVC\V;

class REG_V {

    public function main($model){
    	$result='';
    	$lang=\CORE::init()->lang;
    	$muassisaho=$model->muassisaho();
    	/*
    	$result.='<div class="btn-group" role="group" aria-label="...">
			  <p><button id="regform" type="button" class="btn btn-default"
			  data-toggle="modal" data-target="#myReg">'.lang('add','Add').'</button></p>
			</div>
			<!-- Modal -->
		    <div class="modal fade" id="myReg" tabindex="-1" role="dialog" aria-labelledby="myRegLabel" aria-hidden="true">
		      <div class="modal-dialog">
		        <div class="modal-content">
		          <div class="modal-header">
		            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		            <span aria-hidden="true">&times;</span></button>
		            <h4 class="modal-title" id="myRegLabel">'.lang('regform','Форма регистрации').':</h4>
		          </div>
		          <form id="frm_reg">
		          		<input type="hidden" id="frmhash" value="'.md5(time()).'">
		          <div id="myRegBody" class="modal-body">
					  <div class="form-group">
					    <label for="Namud">'.lang('factype','Тип учреждения').'</label>
					    
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
		            <button type="button" id="makereg" class="btn btn-primary">'.lang('add','Add').'</button>
		          </div>
		          </form>
		        </div>
		      </div>
		    </div>
		    <!-- /Modal -->
			';
			*/
			$result.='
			<div id="regformbox">
			<h4>'.lang('regform','Форма регистрации').'</h4>
			<form id="frm_reg">
	          <input type="hidden" id="frmhash" value="'.md5(time()).'">
	          <div id="myRegBody" class="modal-body">

				  <div class="form-group">
				    <label for="name">'.lang('name','Имя').'</label>
				    <input type="text" class="form-control" id="name" placeholder="'.lang('name','Имя').'">
				  </div>
				  <div class="form-group">
				    <label for="name">'.lang('surname','Фамилия').'</label>
				    <input type="text" class="form-control" id="name" placeholder="'.lang('surname','Фамилия').'">
				  </div>
				  <div class="form-group">
				    <label for="name">'.lang('fathername','Отчество').'</label>
				    <input type="text" class="form-control" id="name" placeholder="'.lang('fathername','Отчество').'">
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
	            <button type="button" id="makereg" class="btn btn-primary">'.lang('add','Add').'</button>
	          </div>
	          </form>
	          </div>
	          ';
		\CORE\BC\UI::init()->pos['js'].="\n".'<script src="'.UIPATH.'/js/reg.js"></script>';
		return $result;
    }


}