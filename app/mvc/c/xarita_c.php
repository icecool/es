<?php
namespace APP\MVC\C;

class XARITA_C {
    //http://es/?c=muassisaho&act=main2
    function __construct($REQUEST,$model,$view){
    	$UI=\CORE\BC\UI::init();
        switch($REQUEST->get('act')){
            case "edit":
                $UI->pos['main'].=$view->edit($model);
                break;
			default:
                $UI->pos['js'].='<>';
				$UI->pos['main'].=$view->main($model);
			break;
		}
    }

}