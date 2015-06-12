<?php
namespace APP\MVC\C;

class OD_C {

    function __construct($REQUEST,$model,$view){
    	$UI=\CORE\BC\UI::init();
        $dvm = new \APP\MVC\M\DV_M;
        switch($REQUEST->get('act')){
        	case 'ajax':
        		$do='';
        		if(isset($_GET['do'])) $do=trim($_GET['do']);
        		switch($do){
                    case 'test':

                    break;
        		}
        		exit;
        	break;
            case 'muassisaho':
                $format = (isset($_GET['format'])) ? $_GET['format'] : "json";
                switch($format){
                    case 'json':
                        $res = $dvm->db2jsongen('muassisaho', array('namud', 'name_ru', 'name_tj', 'director', 'address', 'geo_id', 'phone', 'cellphone', 'geo_lat', 'geo_lng', 'muassisa_photo'));
                        echo json_encode($res);
                        exit;
                        break;
                    case 'csv':
                        $res = $dvm->db2csvgen('muassisaho', array('namud', 'name_ru', 'name_tj', 'director', 'address', 'geo_id', 'phone', 'cellphone', 'geo_lat', 'geo_lng', 'muassisa_photo'));
                        exit;
                        break;
                        exit;
                        break;
                }
                exit;
                break;
            case 'maktabformodin':
                $format = (isset($_GET['format'])) ? $_GET['format'] : "json";
                switch($format){
                    case 'json':
                        $res = $dvm->db2jsongen('maktab_form1', array());
                        echo json_encode($res);
                        exit;
                        break;
                    case 'csv':
                        $res = $dvm->db2csvgen('maktab_form1', array());
                        exit;
                        break;
                }
                exit;
                break;
            case 'maktabformdva':
                $format = (isset($_GET['format'])) ? $_GET['format'] : "json";
                switch($format){
                    case 'json':
                        $res = $dvm->db2jsongen('maktab_form2', array());
                        echo json_encode($res);
                        exit;
                        break;
                    case 'csv':
                        $res = $dvm->db2csvgen('maktab_form2', array());
                        exit;
                        break;
                }
                exit;
                break;
            case 'maktabformtri':
                $format = (isset($_GET['format'])) ? $_GET['format'] : "json";
                switch($format){
                    case 'json':
                        $res = $dvm->db2jsongen('maktab_form3', array());
                        echo json_encode($res);
                        exit;
                        break;
                    case 'csv':
                        $res = $dvm->db2csvgen('maktab_form3', array());
                        exit;
                        break;
                }
                exit;
                break;
            case 'maktabformchetiri':
                $format = (isset($_GET['format'])) ? $_GET['format'] : "json";
                switch($format){
                    case 'json':
                        $res = $dvm->db2jsongen('maktab_form4', array());
                        echo json_encode($res);
                        exit;
                        break;
                    case 'csv':
                        $res = $dvm->db2csvgen('maktab_form4', array());
                        exit;
                        break;
                }
                exit;
                break;
            case 'maktabformpyat':
                $format = (isset($_GET['format'])) ? $_GET['format'] : "json";
                switch($format){
                    case 'json':
                        $res = $dvm->db2jsongen('maktab_form5', array());
                        echo json_encode($res);
                        exit;
                        break;
                    case 'csv':
                        $res = $dvm->db2csvgen('maktab_form5', array());
                        exit;
                        break;
                }
                exit;
                break;
            case 'kudakistonformodin':
                $format = (isset($_GET['format'])) ? $_GET['format'] : "json";
                switch($format){
                    case 'json':
                        $res = $dvm->db2jsongen('kudakiston_form1', array());
                        echo json_encode($res);
                        exit;
                        break;
                    case 'csv':
                        $res = $dvm->db2csvgen('kudakiston_form1', array());
                        exit;
                        break;
                }
                exit;
                break;
			default:
				$UI->pos['main'].=$view->main($model);
			break;
		}
    }

}