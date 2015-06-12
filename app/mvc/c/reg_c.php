<?php
namespace APP\MVC\C;

class REG_C {

    function __construct($REQUEST,$model,$view){
    	$UI=\CORE\BC\UI::init();
        switch($REQUEST->get('act')){
        	case 'ajax':
        		$do='';
        		if(isset($_GET['do'])) $do=trim($_GET['do']);
        		switch($do){
        			case 'muassisalist':
                        $rayon=0; $namud=0;
                        if(isset($_GET['rayon'])) $rayon=(int) $_GET['rayon'];
                        if(isset($_GET['namud'])) $namud=(int) $_GET['namud'];
                        echo $view->xlist($model->muassisaho($rayon,$namud),'rayon');
        			break;
                    case 'monthdays':
                        echo $view->xlist($view->monthdays(),'day',0,false);
                    break;
                    case 'status':
                        echo $view->status($model);
                    break;

        		}
        		exit;
        	break;
            case 'check':
                $UI->pos['main'].=$view->checkform();

            break;
			default:
                if(isset($_POST['frmhash'])) {
                    $model->add();
                    $UI->pos['main'].=$view->afteradd($model);
                } else {
                    $UI->pos['main'].=$view->main($model);
                }				
			break;
		}
    }

}