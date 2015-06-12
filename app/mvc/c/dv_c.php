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
            case 'lines1':
                echo $model->lines1($model);
                exit;
            break;
            case 'lines':
                echo $view->lines($model);
            break;
            case 'bar':
                echo $view->bar($model);
            break;
            case 'bar2':
                echo $view->bar2($model);
                break;
            case 'donut':
                echo $view->donut2($model);
            break;
            case 'boysgirls':
                echo $model->boysgirls();
                exit;
            break;
            case 'shumora':
                echo $model->shumora_maktab_rayon();
                exit;
            break;            
			default:
				$UI->pos['main'].=$view->main($model);
			break;
		}
    }

}