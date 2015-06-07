<?php
namespace APP\MVC\M;

class XARITA_M {

    public function get_muassisaho(){
    	$muassisaho=array();
    	$DB=\DB::init();
    	if($DB->connected()){
    		$sql = "SELECT * FROM `muassisaho`;";
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



}