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
            case 'lines':
                echo $model->lines();
                exit;
            break;
            case 'boysgirls':
                echo $model->boysgirls();
                exit;
            break;
            case 'donut':
                echo $view->donut2($model);
            break;
			default:
				$UI->pos['main'].=$view->main($model);
			break;
		}
    }

}