<?php
namespace APP\MVC\M;

class REG_M {

	public function rayons(){
    	$geo=array();
    	$DB=\DB::init();
    	if($DB->connected()){
    		$sql = "SELECT * FROM `geo` WHERE `geo-type`=3;";
			$sth = $DB->dbh->prepare($sql);
			$sth->execute();
			$DB->query_count(); // for counting
			if($sth->rowCount()>0){
				while($r=$sth->fetch()){
					$geo[$r['geo-id']]=$r['geo-name'];
				}
			}
    	}
    	return $geo;
    }

    public function namudho(){
    	$namudho=array();
    	$DB=\DB::init();
    	if($DB->connected()){
    		$sql = "SELECT * FROM `namudi_muassisa` WHERE `namud-id`=1 OR `namud-id`=2;";
			$sth = $DB->dbh->prepare($sql);
			$sth->execute();
			$DB->query_count(); // for counting
			if($sth->rowCount()>0){
				while($r=$sth->fetch()){
					$namudho[$r['namud-id']]=$r['namud-name_ru'];
				}
			}
    	}
    	return $namudho;
    }

    public function muassisaho($rayon=2,$namud=1){
    	$muassisaho=array();
    	$DB=\DB::init();
    	if($DB->connected()){
    		if($namud==0) {$where=" WHERE `namud`=1 OR `namud`=2";} else {$where=" WHERE `namud`=".$namud;}
    		if($rayon>0) {$where.=' AND `geo_id`='.$rayon;}
    		$sql = "SELECT * FROM `muassisaho`".$where." ORDER BY `namud`,`name_ru`;";
			$sth = $DB->dbh->prepare($sql);
			$sth->execute();
			$DB->query_count(); // for counting
			if($sth->rowCount()>0){
				while($r=$sth->fetch()){
					$muassisaho[$r['m-id']]=$r['name_ru'];
				}
			}
    	}
    	return $muassisaho;
    }

    public function add(){
    	$valid=true;
    	$val=array(
    		'muassisa'=>'',
    		'nom'=>'',
    		'nasab'=>'',
    		'nomi_padar'=>'',
    		'zodruz'=>'0000-00-00',
    		'shahodatnoma'=>'',
    		'nomi_volidon'=>'',
    		'address'=>'',
    		'email'=>'',
    		'phone'=>'',
    	);
    	$day=0; $month=0; $year=0;
    	if(isset($_POST['muassisa'])) $val['muassisa']=(int) $_POST['muassisa'];
    	if(isset($_POST['nom'])) $val['nom']=trim($_POST['nom']);
    	if(isset($_POST['nasab'])) $val['nasab']=trim($_POST['nasab']);
    	if(isset($_POST['nomi_padar'])) $val['nomi_padar']=trim($_POST['nomi_padar']);

    	if(isset($_POST['day'])) $day=(int) $_POST['day'];
    	if(isset($_POST['month'])) $month=(int) $_POST['month'];
    	if(isset($_POST['year'])) $year=(int) $_POST['year'];

    	$val['zodruz']=date('Y-m-d',strtotime($year.'-'.$month.'-'.$day));

    	if(isset($_POST['shahodatnoma'])) $val['shahodatnoma']=trim($_POST['shahodatnoma']);
    	if(isset($_POST['nomi_volidon'])) $val['nomi_volidon']=trim($_POST['nomi_volidon']);
    	if(isset($_POST['address'])) $val['address']=trim($_POST['address']);
    	if(isset($_POST['email'])) $val['email']=trim($_POST['email']);
    	if(isset($_POST['phone'])) $val['phone']=trim($_POST['phone']);
    	// here should be some data validation
    	if($val['nom']=='') $valid=false;
    	if($val['nasab']=='') $valid=false;
    	if($val['nomi_padar']=='') $valid=false;
		if($valid){
			$DB=\DB::init();
			if($DB->connected()){
				$sql = "SELECT * FROM `registration_form` 
				WHERE `reg-muassisa`=:muassisa AND `reg-nom`=:nom AND `reg-nasab`=:nasab AND `shahodatnoma`=:shahodatnoma;";
				$sth = $DB->dbh->prepare($sql);
				$sth->execute(array('muassisa'=>$val['muassisa'],'nom'=>$val['nom'],'nasab'=>$val['nasab'],'shahodatnoma'=>$val['shahodatnoma']));
				if($sth->rowCount()>0){
					\CORE::init()->msg('error','Похоже, что такая запись уже существует в БД');
				} else {
					foreach($val as $k => $v){
						if($v=='') $val[$k]=NULL;
					}
					$uniqid=uniqid();
					$sql = "INSERT INTO `registration_form` SET `reg-muassisa`=:muassisa,
					`reg-nom`=:nom,
					`reg-nasab`=:nasab,
					`reg-nomi_padar`=:nomi_padar,
					`zodruz`=:zodruz,
					`shahodatnoma`=:shahodatnoma,
					`nomi_volidon`=:nomi_volidon,
					`reg-address`=:address,
					`reg-email`=:email,
					`reg-phone`=:phone,
					`reg-code`='".$uniqid."'
					";
					$sth = $DB->dbh->prepare($sql);
					$sth->execute($val);
					$GLOBALS['uniqid']=$uniqid;
					$GLOBALS['didreg']=true;
					//\CORE::init()->msg('info','Ваша заявка принята на обработку');
				}
			}
		} else {
			\CORE::init()->msg('error','Проверьте корректность введенных данных');
		}
    }


}