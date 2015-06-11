<?php
namespace APP\MVC\V;

class REG_V {

	public function xlist($array,$id='',$sel=0,$cl=true){
		$result='';
		if(count($array)>0){
			if($cl) {$c=' class="form-control"';} else {$c='';}
			$result.='<select'.$c.' id="'.$id.'">'."\n";
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
			<input type="hidden" id="frmhash" value="'.md5(time()).'">
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
				<input type="text" class="form-control" id="childname" placeholder="'.lang('name','Имя').'">
			</div>
			<div class="form-group">
				<label for="childsurname">'.lang('surname','Фамилия').'</label>
				<input type="text" class="form-control" id="childsurname" placeholder="'.lang('surname','Фамилия').'">
			</div>
			<div class="form-group">
				<label for="childfathername">'.lang('fathername','Отчество').'</label>
				<input type="text" class="form-control" id="childfathername" placeholder="'.lang('fathername','Отчество').'">
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
				<label for="shahodatnoma">'.lang('shahodatnoma','Номер метрики ребенка').'</label>
				<input type="text" class="form-control" id="shahodatnoma" placeholder="'.lang('number','номер').'">
			</div>

			<br><h4 class="text-center form_sep_blue">'.lang('volidoninfo','Данные родителей (опекунов)').'</h4><br>
			<div class="form-group">
				<label for="vname">'.lang('name','Имя').'</label>
				<input type="text" class="form-control" id="vname" placeholder="'.lang('name','Имя').'">
			</div>
			<div class="form-group">
				<label for="vsurname">'.lang('surname','Фамилия').'</label>
				<input type="text" class="form-control" id="vsurname" placeholder="'.lang('surname','Фамилия').'">
			</div>
			<div class="form-group">
				<label for="vfathername">'.lang('fathername','Отчество').'</label>
				<input type="text" class="form-control" id="vfathername" placeholder="'.lang('fathername','Отчество').'">
			</div>
			<div class="form-group">
				<label for="address">'.lang('address','Адрес').'</label>
				<input type="text" class="form-control" id="address" placeholder="'.lang('address','Адрес').'">
			</div>
			<div class="form-group">
				<label for="email">'.lang('email','E-mail').'</label>
				<input type="text" class="form-control" id="email" placeholder="'.lang('email','E-mail').'">
			</div>
			<div class="form-group">
				<label for="phone">'.lang('phone','Телефон').'</label>
				<input type="text" class="form-control" id="phone" placeholder="'.lang('phone','Телефон').'">
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

    public static function monthdays($month=0,$year=0){
        if(isset($_GET['month'])) $month=(int) $_GET['month'];
        if(isset($_GET['year'])) $year=(int) $_GET['year'];
        $number=cal_days_in_month(CAL_GREGORIAN, $month, $year);
        for($i=1;$i<=$number;$i++) {
           $result[(string) $i]=$i;
        }
        return $result;
    }

}