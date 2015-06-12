<?php
namespace APP\MVC\V;

class OD_V {


public function main($model){
	$result='
    <ul class="unstyled">
        <li class="dataset-item">
            <h4>Количество девочек и мальчиков в школах г. Душанбе за 2013-2014 уч. год:</h4>
            <ul class="dataset-resources unstyled">
                <li><a href="#"><img src="'.UIPATH.'/img/csv.png" /> </a></li>
                <li><a href="/?c=dv&act=boysgirls"><img src="'.UIPATH.'/img/json.png" /> </a></li>
                <li><a href="#"><img src="'.UIPATH.'/img/xml.png" /> </a></li>
            </ul>
        </li>
        <li class="dataset-item">
            <h4>Проекты ООН</h4>
            <p>Проекты ООН</p>
            <ul class="dataset-resources unstyled">
                <li><a href="#"><img src="'.UIPATH.'/img/csv.png" /> </a></li>
                <li><a href="#"><img src="'.UIPATH.'/img/json.png" /> </a></li>
                <li><a href="#"><img src="'.UIPATH.'/img/xml.png" /> </a></li>
            </ul>
        </li>
    </ul>
    ';

	return $result;
}

}