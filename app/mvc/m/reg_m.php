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
    		'zodruz'=>'',
    		'shahodatnoma'=>'',
    		'yatim'=>'',
    		'nomi_volidon'=>'',
    		'address'=>'',
    		'email'=>'',
    		'phone'=>'',
    	);
    	if(isset($_POST['muassisa'])) $val['muassisa']=(int) $_POST['muassisa'];
    	if(isset($_POST['nom'])) $val['nom']=trim($_POST['nom']);
    	if(isset($_POST['nasab'])) $val['nasab']=trim($_POST['nasab']);
    	if(isset($_POST['nomi_padar'])) $val['nomi_padar']=trim($_POST['nomi_padar']);
    	if(isset($_POST['zodruz'])) $val['zodruzv']=trim($_POST['zodruz']);
    	if(isset($_POST['shahodatnoma'])) $val['shahodatnoma']=trim($_POST['shahodatnomazodruz']);

    	if(isset($_POST['address'])) $val['address']=trim($_POST['address']);
    	if(isset($_POST['phone'])) $val['phone']=trim($_POST['phone']);
    	if(isset($_POST['cellphone'])) $val['cellphone']=trim($_POST['cellphone']);
    	// here should be some data validation
    	if($val['name_ru']=='') $valid=false; // хотя бы название должно быть указано =)
		if($valid){
			$DB=\DB::init();
			if($DB->connected()){
				$sql = "SELECT * FROM `muassisaho` WHERE `namud`=:namud AND `name_ru`=:name_ru;";
				$sth = $DB->dbh->prepare($sql);
				$sth->execute(array('namud'=>$val['namud'],'name_ru'=>$val['name_ru']));
				if($sth->rowCount()>0){
					echo 'Похоже, что такая запись уже существует в БД';
					// or system message
				} else {
					// add new facility here
					foreach($val as $k => $v){
						if($v=='') $val[$k]=NULL;
					}
					$sql = "INSERT INTO `muassisaho` SET `namud`=:namud,
					`name_ru`=:name_ru,
					`name_tj`=:name_tj,
					`director`=:director,
					`address`=:address,
					`phone`=:phone,
					`cellphone`=:cellphone
					";
					$sth = $DB->dbh->prepare($sql);
					$sth->execute($val);
					echo 'ok';
				}
			} else {
				echo 'db connection err';
			}
		} else {
			// \CORE::init()->msg('error','Проверьте корректность введенных данных');
			echo 'Проверьте корректность введенных данных';
		}
    }


}