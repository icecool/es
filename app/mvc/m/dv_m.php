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

    public function boysgirls(){
    	$result='';
    	$DB=\DB::init();
    	if($DB->connected()){
    		$sql = "SELECT * FROM `maktab_form1` WHERE `soli_tahsil`=2013;";
			$sth = $DB->dbh->prepare($sql);
			$sth->execute();
			$DB->query_count();
			$total=0; $girls=0;
			if($sth->rowCount()>0){
				while($r=$sth->fetch()){
					$total+=$r['shumorai_khonanda'];
					$girls+=$r['duxtaron'];
				}
			}
    	}
    	$boys=$total-$girls;
    	$boysp=round((100*$boys)/$total);
    	$girlsp=100-$boysp;
    	$dt=array(
    		'total'=>$total,
    		'girls'=>$girls,
    		'boys'=>$boys,
    		'boysp'=>$boysp,
    		'girlsp'=>$girlsp
    		);
    	$result=json_encode($dt);
    	return $result;
    }

    public function lines(){
    	$result=''; $data=array();
    	$DB=\DB::init();
    	if($DB->connected()){
    		$sql = "SELECT `muassisa_id`,`muassisa_name` FROM `maktab_form1` WHERE `soli_tahsil`=2013;";
			$sth = $DB->dbh->prepare($sql);
			$sth->execute();
			$DB->query_count();
			if($sth->rowCount()>0){
				while($r=$sth->fetch()){
					
				}
			}
    	}
    	
    	$result=json_encode($data);
    	return $result;
    }


}