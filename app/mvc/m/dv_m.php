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
					//$data[$r[$idfield]]=$r;
                    $data[$r[$idfield]]=$r;
				}
			}
    	}
    	return $data;
    }

    public function db2jsongen($table,$idfields=array()){
        // 'muassisaho', 'm-id', array('name_ru','namud','director'), 'name_ru'
        $data=array();
        $DB=\DB::init();
        if($DB->connected()){
            if (count($idfields)==0){
                $sql = "SHOW COLUMNS FROM `".$table."`;";
                $sth = $DB->dbh->prepare($sql);
                $sth->execute();
                $DB->query_count();
                if($sth->rowCount()>0){
                    $idfields = array();
                    while($r=$sth->fetch()){
                        $idfields[] = $r['Field'];
                    }
                }
            }
            //print_r($idfields);
            //die();
            $sql = "SELECT * FROM `".$table."`;";
            $sth = $DB->dbh->prepare($sql);
            $sth->execute();
            $DB->query_count();
            if($sth->rowCount()>0){
                while($r=$sth->fetch()){
                    //$data[] = $r;
                    //$data[$r[$idfield]]=$r;
                    $res = array();
                    foreach($idfields as $idfield) {
                        $res[$idfield] = $r[$idfield];
                    }
                    $data[] = $res;
                }
            }
        }
        return $data;
    }

    public function db2arraygen($table,$idfields=array()){
        // 'muassisaho', 'm-id', array('name_ru','namud','director'), 'name_ru'
        $data=array();
        $DB=\DB::init();
        if($DB->connected()){
            if (count($idfields)==0){
                $sql = "SHOW COLUMNS FROM `".$table."`;";
                $sth = $DB->dbh->prepare($sql);
                $sth->execute();
                $DB->query_count();
                if($sth->rowCount()>0){
                    $idfields = array();
                    while($r=$sth->fetch()){
                        $idfields[] = $r['Field'];
                    }
                }
            }
            //print_r($idfields);
            //die();
            $sql = "SELECT * FROM `".$table."`;";
            $sth = $DB->dbh->prepare($sql);
            $sth->execute();
            $DB->query_count();
            if($sth->rowCount()>0){
                while($r=$sth->fetch()){
                    //$data[] = $r;
                    //$data[$r[$idfield]]=$r;
                    $res = array();
                    foreach($idfields as $idfield) {
                        $res[$idfield] = $r[$idfield];
                    }
                    $data[] = $res;
                }
            }
        }
        return $data;
    }

    public function db2csvgen($table,$idfields=array()){
        // 'muassisaho', 'm-id', array('name_ru','namud','director'), 'name_ru'
        $data=array();
        $DB=\DB::init();
        if($DB->connected()){
            if (count($idfields)==0){
                $sql = "SHOW COLUMNS FROM `".$table."`;";
                $sth = $DB->dbh->prepare($sql);
                $sth->execute();
                $DB->query_count();
                if($sth->rowCount()>0){
                    $idfields = array();
                    while($r=$sth->fetch()){
                        $idfields[] = $r['Field'];
                    }
                }
            }
            // output headers so that the file is downloaded rather than displayed
            header('Content-Type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment; filename=data.csv');
            // create a file pointer connected to the output stream
            $output = fopen('php://output', 'w');
            // output the column headings
            fputcsv($output, $idfields);

            $sql = "SELECT * FROM `".$table."`;";
            $sth = $DB->dbh->prepare($sql);
            $sth->execute();
            $DB->query_count();
            if($sth->rowCount()>0){
                while($r=$sth->fetch()){
                    $res = array();
                    foreach($idfields as $idfield) {
                        $res[$idfield] = $r[$idfield];
                    }
                    // loop over the rows, outputting them
                    fputcsv($output, $res);
                }
            }
        }
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

    public function shumora_maktab_rayon($geoid=2){
    	$result=''; $data=array();
    	$DB=\DB::init();
    	if($DB->connected()){
    		$sql = "SELECT `muassisa_id`,`shumorai_khonanda`,`name_ru`,`namud`,`geo_id`,`geo-name`
    		FROM `maktab_form1`
    		LEFT OUTER JOIN `muassisaho` ON `maktab_form1`.`muassisa_id`=`muassisaho`.`m-id`
    		LEFT OUTER JOIN `geo` ON `muassisaho`.`geo_id`=`geo`.`geo-id`   		
    		WHERE `namud`=2 AND `soli_tahsil`=2013 AND `geo_id`=".$geoid." ORDER BY `geo_id`,`name_ru`;";
			$sth = $DB->dbh->prepare($sql);
			$sth->execute();
			$DB->query_count();
			if($sth->rowCount()>0){
				while($r=$sth->fetch()){
					if($r['geo-name']!='') $data[$r['geo-name']][$r['name_ru']]=$r['shumorai_khonanda'];
				}
			}
    	}
    	//$result=json_encode($data);
    	$result.='
    	var barChartData = {
		    labels: [';
		    $fl=false;
		    foreach ($data as $rayon => $maktabho) {
		    	foreach ($maktabho as $maktab => $shumora) {
		    		if($fl) $result.=',';
			    	$result.='"'.$maktab.'"';
			    	if(!$fl) $fl=true;
		    	}		    	
		    }
		    $result.='],
		    datasets: [
		    ';
		    $fl=false; $f2=false;
		    foreach ($data as $rayon => $maktabho) {
		    	if($f2) $result.=',';
		    	$result.='
		        {
		            label: "'.$rayon.'",
		            fillColor: "rgba(151,187,205,0.5)",
		            strokeColor: "rgba(151,187,205,0.8)",
		            highlightFill: "rgba(151,187,205,0.75)",
		            highlightStroke: "rgba(151,187,205,1)",
		            data: [';
		            foreach ($maktabho as $maktab => $shumora) {
			    		if($fl) $result.=',';
				    	$result.=$shumora;
				    	if(!$fl) $fl=true;
			    	}
		            $result.=']
		        }';
		        if(!$f2) $f2=true;
		    }
		    $result.='
		    ]
		};
		';
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

    public function lines1(){
        $result=''; $data=array();
        $DB=\DB::init();
        if($DB->connected()){
            $sql = "SELECT * FROM `maktab_form3` ORDER BY `soli_tahsil`;";
            $sth = $DB->dbh->prepare($sql);
            $sth->execute();
            $DB->query_count();
            if($sth->rowCount()>0){
                while($r=$sth->fetch()){
                    $boys=$r['xonandagon_umumi']-$r['xonandagon_duxtar'];
                    $data[$r['soli_tahsil']]=array($r['xonandagon_duxtar'],$boys);
                }
            }
        }
        $result=json_encode($data);
        return $result;
    }

}