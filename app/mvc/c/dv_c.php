<?php
namespace APP\MVC\C;

class DV_C {

    function __construct($REQUEST,$model,$view){
    	$UI=\CORE\BC\UI::init();
        switch($REQUEST->get('act')){
            case 'x':
                $view->x($model);
                exit;              
            break;
			default:
				$UI->pos['main'].=$view->main($model);
			break;
		}
    }

}