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
				<label for="muassisa">'.lang('fac','Учреждение').':</label><br>
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
				<label for="address">'.lang('address','Адрес').'</label>
				<input type="text" class="form-control" id="address" name="address" placeholder="'.lang('address','Адрес').'">
			</div>
			<div class="form-group">
				<label for="email">'.lang('email','E-mail').'</label>
				<input type="text" class="form-control" id="email" name="email" placeholder="'.lang('email','E-mail').'">
			</div>
			<div class="form-group">
				<label for="phone">'.lang('phone','Телефон').'</label>
				<input type="text" class="form-control" id="phone" name="phone" placeholder="'.lang('phone','Телефон').'">
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
    		<h3><span class="form_sep_red">Заявка принята на обработку.<br><br> 
    		Ваш код для отслеживания:</span> 
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
		$result.='
		<form class="form-inline">
		  <div class="form-group">
		    <label class="sr-only" for="yourID">ID (hash)</label>
		    <div class="input-group">
		      <div class="input-group-addon">ID:</div>
		      <input type="text" class="form-control" id="yourID" placeholder="">
		    </div>
		  </div>
		  <button type="button" class="btn btn-primary">'.lang('check','Проверить статус').'</button>
		</form>
		';
    	return $result;
    }

}