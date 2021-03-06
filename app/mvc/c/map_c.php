<?php
namespace APP\MVC\C;

class MAP_C {

    function __construct($REQUEST,$model,$view){
    	$UI=\CORE\BC\UI::init();
        switch($REQUEST->get('act')){
        	case 'ajax':
        		$do='';
        		if(isset($_GET['do'])) $do=trim($_GET['do']);
        		switch($do){
        			case 'marker':
        				$model->set_coords();
        			break;
        		}
        		exit;
        	break;
            case 'getcoords':
                $model->getCoords();
                exit;
                break;
            case 'getmuassisabynamud':
                $namud = $_POST['namud'];
                $model->get_muassisaho_by_type_json($namud);
                exit;
                break;
			default:
				$UI->pos['main'].=$view->main($model);
			break;
		}
    }

}