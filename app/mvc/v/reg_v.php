<?php
namespace APP\MVC\V;

class REG_V {

	public function xlist($array,$id='',$sel=0,$cl=true){
		$result='';
		if(count($array)>0){
			if($cl) {$c=' class="form-control"';} else {$c='';}
			$result.='<select'.$c.' id="'.$id.'" name="'.$id.'">'."\n";
			foreach ($array as $k => $v) {
				if($sel==$k) {$s=' selected="selected"';} else {$s='';}
				$result.='<option value="'.$k.'"'.$s.'>'.$v."</option>\n";
			}
			$result.="</select>\n";
		}
		return $result;
	}

    public function main($model){
    	$result='';
    	$lang=\CORE::init()->lang;
    	$muassisaho=$model->muassisaho();
    	$d=(int) date('d');
    	$m=(int) date('n');
    	$y=(int) date('Y');
    	$days=$this->monthdays($m,$y);
    	$months=array(
    		'1'=>'Январь',
    		'2'=>'Февраль',
    		'3'=>'Март',
    		'4'=>'Апрель',
    		'5'=>'Май',
    		'6'=>'Июнь',
    		'7'=>'Июль',
    		'8'=>'Август',
    		'9'=>'Сентябрь',
    		'10'=>'Октябрь',
    		'11'=>'Ноябрь',
    		'12'=>'Декабрь'
    		);
    	for($i=1995;$i<=$y;$i++) $years[(string) $i]=$i;
		$result.='
		<div id="regformbox">
		<h2 class="text-center form_sep_red">'.lang('regform','Форма регистрации').'</h2>
		<form id="frm_reg" action="./?c=reg" method="post">
			<input type="hidden" id="frmhash" name="frmhash" value="'.md5(time()).'">
			<div id="myRegBody" class="modal-body">

			<h4 class="text-center form_sep_blue">'.lang('choosefac','Выбор образовательного учреждения').'</h4><br>
			<div class="form-group">
				<label for="geoid">'.lang('rayon','Район').':</label><br>
				'.$this->xlist($model->rayons(),'rayon').'
			</div>
			<div class="form-group">
				<label for="namud">'.lang('factype','Тип учреждения').':</label><br>
				'.$this->xlist($model->namudho(),'namud').'
			</div>
			<div class="form-group">
				<label for="muassisa">'.lang('facility','Учреждение').':</label><br>
				<span id="xmuassisalist">'.$this->xlist($muassisaho,'muassisa').'</span>
			</div>

			<br><h4 class="text-center form_sep_blue">'.lang('childinfo','Данные ребенка').'</h4><br>
			<div class="form-group">
				<label for="childname">'.lang('name','Имя').'</label>
				<input type="text" class="form-control" id="nom" name="nom" placeholder="'.lang('name','Имя').'">
			</div>
			<div class="form-group">
				<label for="childsurname">'.lang('surname','Фамилия').'</label>
				<input type="text" class="form-control" id="nasab" name="nasab" placeholder="'.lang('surname','Фамилия').'">
			</div>
			<div class="form-group">
				<label for="childfathername">'.lang('fathername','Отчество').'</label>
				<input type="text" class="form-control" id="nomi_padar" name="nomi_padar" placeholder="'.lang('fathername','Отчество').'">
			</div>
			<div class="form-group">
				<label for="birthday">'.lang('birthday','Дата рождения').': </label>
				<span id="xdayslist">
				'.$this->xlist($days,'day',$d,false).
				'</span>
				'.$this->xlist($months,'month',$m,false).'
				'.$this->xlist($years,'year',$y,false).'
			</div>
			<div class="form-group">
				<label for="shahodatnoma">'.lang('shahodatnoma','Номер свидетельства о рождении (метрики)').'</label>
				<input type="text" class="form-control" id="shahodatnoma" name="shahodatnoma" placeholder="'.lang('number','номер').'">
			</div>

			<br><h4 class="text-center form_sep_blue">'.lang('volidoninfo','Данные родителей (опекунов)').'</h4><br>
			<div class="form-group">
				<label for="vname">'.lang('fio','ФИО').'</label>
				<input type="text" class="form-control" id="nomi_volidon" name="nomi_volidon" placeholder="'.lang('fio','ФИО').'">
			</div>
			<div class="form-group">
				<label for="address">'.lang('adres','Адрес').'</label>
				<input type="text" class="form-control" id="address" name="address" placeholder="'.lang('adres','Адрес').'">
			</div>
			<div class="form-group">
				<label for="email">'.lang('email','E-mail').'</label>
				<input type="text" class="form-control" id="email" name="email" placeholder="'.lang('email','E-mail').'">
			</div>
			<div class="form-group">
				<label for="phone">'.lang('telefon','Телефон').'</label>
				<input type="text" class="form-control" id="phone" name="phone" placeholder="'.lang('telefon','Телефон').'">
			</div>

			</div>
			<div class="modal-footer">
				<input type="submit" id="makereg" class="btn btn-primary" value="'.lang('send','Отправить заявку').'">
			</div>
		</form>
		</div>
		';
		\CORE\BC\UI::init()->pos['js'].="\n".'<script src="'.UIPATH.'/js/reg.js"></script>';
		return $result;
    }

    public static function afteradd(){
    	$result='';
    	if(isset($GLOBALS['didreg'])){
    		$result.='<div class="text-center"><hr>
    		<h3><span class="form_sep_red">'.lang("zayavka_prinyata","Заявка принята на обработку.").'<br><br>
    		'.lang("vash_kod","Ваш код для отслеживания:").'</span>
    			<span class="label label-primary" style="font-size:22px;">'.$GLOBALS['uniqid'].'</span>
	    	</h3><hr><br>
    		</div>';
    	}
    	return $result;
    }

    public static function monthdays($month=0,$year=0){
        if(isset($_GET['month'])) $month=(int) $_GET['month'];
        if(isset($_GET['year'])) $year=(int) $_GET['year'];
        $number=cal_days_in_month(CAL_GREGORIAN, $month, $year);
        for($i=1;$i<=$number;$i++) {
           $result[(string) $i]=$i;
        }
        return $result;
    }

    public static function checkform(){
    	$result='';
    	\CORE\BC\UI::init()->pos['js'].="\n".'<script src="'.UIPATH.'/js/reg.js"></script>';
		$result.='<h3 class="text-center form_sep_blue">'.lang("proverka_statusa","Проверка статуса Вашей заявки по трекинг-коду:").'</h3>
		<div id="xstatuscheck" class="text-center" style="width:500px;margin:auto;margin-top:30px;margin-bottom:100px;">
		<form id="checkfrm" class="form-inline" action="./?c=reg&act=check">
		<br><br><br>
		  <div class="form-group">
		    <label class="sr-only" for="yourID">ID (hash)</label>
		    <div class="input-group">
		      <div class="input-group-addon">'.lang("vash_kod","Ваш код:").'</div><!-- example: 5579bdad8f2bc -->
		      <input type="text" class="form-control" id="yourID" placeholder="" style="font-size:20px;width:170px;">
		    </div>
		  </div>
		  <button id="xcheck" type="button" class="btn btn-primary">'.lang('check','Проверить статус').'</button>
		</form>
		</div>
		<br><br><br>
		';
    	return $result;
    }

    public static function status($model){
    	$result='';
    	$code=''; $cmt=''; $msg='undefined status...';
    	if(isset($_POST['code'])) {$code=trim($_POST['code']);}
    	$status_array=$model->check_status($code);
    	switch($status_array[0]){
    		case 0:
    			$msg='<h3 class="text-danger">'.lang("wrong_kod","Введен некорректный код").'</h3>
    			<a href="./?c=reg&act=check">'.lang("try_again","Попробовать еще раз?").'</a>';
    		break;
    		case 1:
    			$msg='<h3 class="text-primary">'.lang("zayavka_in_process","Заявка находится в процессе обработки ...").'</h3>';
    		break;
    		case 2:
    			$msg='<h3 class="text-danger">'.lang("zayavka_canceled","Ваша заявка не принята (отказано)").'</h3>';
    			$cmt=htmlspecialchars($status_array[1]);
    			$cmt='<code>'.lang("cancelation_reason","Причина отказа: в данном учреждении колличество заявок превысило количество мест. Вы можете оформить заявку в другое уреждение.").'</code>';
    		break;
    		case 3:
    			$msg='<h3 class="text-success">'.lang("zayavka_accepted","Ваша заявка принята (с Вами свяжутся)").'</h3>';
    			$cmt=htmlspecialchars($status_array[1]);
    			$cmt='<code>'.lang("s_vami_svyajutsya","С Вами должны связаться за месяц до начала процесса обучения/посещения").'</code>';
    		break;
    	}
		$result.='
		<div><img src="'.UIPATH.'/img/status'.$status_array[0].'.gif" border="0"></div>
		'.$msg.'<br><br>
		<div>'.$cmt.'</div>
		';
    	return $result;
    }

    public function reglist($model){
    	$result='';
    	$result.='';
    	return $result;
    }

}