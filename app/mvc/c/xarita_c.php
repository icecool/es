<?php
namespace APP\MVC\C;

class XARITA_C {

    function __construct($REQUEST,$model,$view){
    	$UI=\CORE\BC\UI::init();
        switch($REQUEST->get('act')){
			default:
				$UI->pos['main'].=$view->main($model);
			break;
		}
    }

}