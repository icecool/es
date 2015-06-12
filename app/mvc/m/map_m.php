<?php
namespace APP\MVC\M;

class MAP_M {

    public function get_muassisaho(){
    	$muassisaho=array();
    	$DB=\DB::init();
    	if($DB->connected()){
    		$sql = "SELECT * FROM `muassisaho` LEFT OUTER JOIN `geo` 
    		ON `geo_id`=`geo-id`
    		LEFT OUTER JOIN `namudi_muassisa` ON `namud`=`namud-id` ORDER BY `geo_id`,`name_ru`;";
			$sth = $DB->dbh->prepare($sql);
			$sth->execute();
			$DB->query_count(); // for counting
			if($sth->rowCount()>0){
				while($r=$sth->fetch()){
					$muassisaho[$r['m-id']]=$r;
				}
			}
    	}
    	return $muassisaho;
    }

    public function get_muassisaho_by_type($namud){
        $muassisaho=array();
        $DB=\DB::init();
        if($DB->connected()){
            $sql = "SELECT * FROM `muassisaho` LEFT OUTER JOIN `geo`
    		ON `geo_id`=`geo-id`
    		LEFT OUTER JOIN `namudi_muassisa` ON `namud`=`namud-id`
    		where namud=:namud
    		ORDER BY `geo_id`,`name_ru`;";
            $sth = $DB->dbh->prepare($sql);
            $sth->execute(array(':namud'=>$namud));
            $DB->query_count(); // for counting
            if($sth->rowCount()>0){
                while($r=$sth->fetch()){
                    $muassisaho[$r['m-id']]=$r;
                }
            }
        }
        return $muassisaho;
    }

    public function get_muassisaho_by_type_json($namud){
        $muassisaho=array();
        $DB=\DB::init();
        if($DB->connected()){
            $sql = "SELECT * FROM `muassisaho` LEFT OUTER JOIN `geo`
    		ON `geo_id`=`geo-id`
    		LEFT OUTER JOIN `namudi_muassisa` ON `namud`=`namud-id`
    		where namud=:namud
    		ORDER BY `geo_id`,`name_ru`;";
            $sth = $DB->dbh->prepare($sql);
            $sth->execute(array(':namud'=>$namud));
            $DB->query_count(); // for counting
            if($sth->rowCount()>0){
                while($r=$sth->fetch()){
                    $muassisaho['lat'][]=$r['geo_lat'];
                    $muassisaho['lng'][]=$r['geo_lng'];
                    $muassisaho['name'][]=$r['name_ru'];
                    $muassisaho['director'][]=$r['director'];
                    $muassisaho['address'][]=$r['address'];
                    $muassisaho['phone'][]=$r['phone'];
                    $muassisaho['namud'][]=$r['namud'];
                    $muassisaho['muassisa_photo'][]=$r['muassisa_photo'];
                }
            }
        }
        echo json_encode($muassisaho);
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
					$namudi_muassisa[$r['namud-id']]=$r['namud-name_'.$lang];
				}
			}
    	}
    	return $namudi_muassisa;
    }

    public function set_coords(){
    	$valid=true;
    	$id=0; $lat=0; $lng=0;
    	if(isset($_POST['id'])) $id=(int) $_POST['id'];
    	if(isset($_POST['lat'])) $lat=trim($_POST['lat']);
    	if(isset($_POST['lng'])) $lng=trim($_POST['lng']);
    	if($id==0 && $lat=='' && $lng=='') $valid=false;
    	if($valid){
    		$DB=\DB::init();
			if($DB->connected()){
				$sql = "UPDATE `muassisaho` SET `geo_lat`=:lat, `geo_lng`=:lng WHERE `m-id`=:id;";
				$sth = $DB->dbh->prepare($sql);
				$sth->execute(array(':lat'=>$lat,':lng'=>$lng,':id'=>$id));
				echo 'ok';
			} else {
				echo 'db connection err';
			}
    	}
    }

    public function getCoords(){
        $valid = true;
        $coords = array();
        if(isset($_POST['muassisa_id'])) $id=(int) $_POST['muassisa_id'];
        //if(isset($_GET['muassisa_id'])) $id=(int) $_GET['muassisa_id'];
        if($id==0) $valid=false;
        if($valid){
            $DB=\DB::init();
            if($DB->connected()){
                $sql = "Select geo_lat, geo_lng from muassisaho WHERE `m-id`=:id;";
                //echo $sql;
                $sth = $DB->dbh->prepare($sql);
                $sth->execute(array(':id'=>$id));
                $DB->query_count(); // for counting
                if($sth->rowCount()>0){
                    while($row=$sth->fetch()){
                        $coords['lat']=$row['geo_lat'];
                        $coords['lng']=$row['geo_lng'];
                    }
                    echo json_encode($coords);
                }
            } else {
                echo 'db connection err';
            }
        }else {
            echo 'not valid';
        }
    }


}