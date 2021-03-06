<?php
namespace APP\MVC\C;

class MUASSISAHO_C {

    function __construct($REQUEST,$model,$view){
    	$UI=\CORE\BC\UI::init();
        switch($REQUEST->get('act')){
        	case 'ajax':
        		$do='';
        		if(isset($_GET['do'])) $do=trim($_GET['do']);
        		switch($do){
        			case 'add':
        				$model->add();
        			break;
        			case 'del':
        				$model->del();
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