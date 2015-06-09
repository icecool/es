<?php
namespace APP\MVC\M;

class MAP_M {

    public function get_muassisaho(){
    	$muassisaho=array();
    	$DB=\DB::init();
    	if($DB->connected()){
    		$sql = "SELECT * FROM `muassisaho` LEFT OUTER JOIN `geo` 
    		ON `muassisaho`.`geo_id`=`geo`.`id`
    		LEFT OUTER JOIN `namudi_muassisa` ON `muassisaho`.`namud`=`namudi_muassisa`.`id`;";
			$sth = $DB->dbh->prepare($sql);
			$sth->execute();
			$DB->query_count(); // for counting
			if($sth->rowCount()>0){
				while($r=$sth->fetch()){
					$muassisaho[$r['id']]=$r;
				}
			}
    	}
    	return $muassisaho;
    }

    public function get_namudi_muassisa(){
    	$lang=\CORE::init()->lang;
    	$namudi_muassisa=array();
    	$DB=\DB::init();
    	if($DB->connected()){
    		$sql = "SELECT * FROM `namudi_muassisa`;";
			$sth = $DB->dbh->prepare($sql);
			$sth->execute();
			$DB->query_count(); // for counting
			if($sth->rowCount()>0){
				while($r=$sth->fetch()){
					$namudi_muassisa[$r['id']]=$r['name_'.$lang];
				}
			}
    	}
    	return $namudi_muassisa;
    }

    public function add(){
    	$valid=true;
    	$val=array(
    		'namud'=>'',
    		'name_ru'=>'',
    		'name_tj'=>'',
    		'director'=>'',
    		'address'=>'',
    		'phone'=>'',
    		'cellphone'=>'',
    	);
    	if(isset($_POST['namud'])) $val['namud']=(int) $_POST['namud'];
    	if(isset($_POST['name_ru'])) $val['name_ru']=trim($_POST['name_ru']);
    	if(isset($_POST['name_tj'])) $val['name_tj']=trim($_POST['name_tj']);
    	if(isset($_POST['director'])) $val['director']=trim($_POST['director']);
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

    public function del($id=0){
	if($id==0 && isset($_POST['id'])){ $id=(int) $_POST['id']; }
	if($id>0){
		$DB=\DB::init();
		if($DB->connected()){
			$sql = "DELETE FROM `muassisaho` WHERE `id`=:id;";
			$sth = $DB->dbh->prepare($sql);
			$sth->execute(array('id'=>$id));
			echo 'ok';
		}
	}
}

}