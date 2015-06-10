<?php
namespace APP\MVC\M;

class DV_M {

	public function db2json($table,$idfield,$fields,$sortfield=''){ 
	// 'muassisaho', 'm-id', array('name_ru','namud','director'), 'name_ru'
    	$data=array();
    	$DB=\DB::init();
    	if($DB->connected()){
    		$sql = "SELECT * FROM `".$table."`;";
			$sth = $DB->dbh->prepare($sql);
			$sth->execute();
			$DB->query_count();
			if($sth->rowCount()>0){
				while($r=$sth->fetch()){
					$data[$r[$idfield]]=$r;
				}
			}
    	}
    	return $data;
    }

    public function donut1(){
    	$result='';
    	$DB=\DB::init();
    	if($DB->connected()){
    		$sql = "SELECT * FROM `maktab_form1` WHERE `soli-tahsil`=2013;";
			$sth = $DB->dbh->prepare($sql);
			$sth->execute();
			$DB->query_count();
			$total=0; $girls=0;
			if($sth->rowCount()>0){
				while($r=$sth->fetch()){
					$total+=$r['shumorai_honanda'];
					$girls+=$r['duxtaron'];
				}
			}
    	}
    	$result=json_encode(array($total,$girls,($total-$girls)));
    	return $result;
    }

}