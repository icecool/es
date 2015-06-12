<?php
namespace APP\MVC\V;

class OD_V {


public function main($model){
    $result='
    <h4><strong>Список открытых данных для использования в приложениях третей стороны</strong></h4>
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr><th>Название</th><th>Форматы данных</th></tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <h4>Список всех учебных учреждений г. Душанбе</h4></td>
                <td>
                    <ul class="dataset-resources unstyled">
                        <li><a title="Скачать в формате CSV" href="/?c=od&act=muassisaho&format=csv"><img src="'.UIPATH.'/img/csv.png" /> </a></li>
                        <li><a title="Скачать в формате JSON" href="/?c=od&act=muassisaho&format=json"><img src="'.UIPATH.'/img/json.png" /> </a></li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>Таксимоти синфхои таълими  ва хонандагон аз руи забон</h4></td>
                <td>
                    <ul class="dataset-resources unstyled">
                        <li><a title="Скачать в формате CSV" href="/?c=od&act=maktabformodin&format=csv"><img src="'.UIPATH.'/img/csv.png" /> </a></li>
                        <li><a title="Скачать в формате JSON" href="/?c=od&act=maktabformodin&format=json"><img src="'.UIPATH.'/img/json.png" /> </a></li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>Маълумоти чамъбасти оид ба хайати хонандагон</h4>
                <td>
                    <ul class="dataset-resources unstyled">
                        <li><a title="Скачать в формате CSV" href="/?c=od&act=maktabformdva&format=csv"><img src="'.UIPATH.'/img/csv.png" /> </a></li>
                        <li><a title="Скачать в формате JSON" href="/?c=od&act=maktabformdva&format=json"><img src="'.UIPATH.'/img/json.png" /> </a></li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>Шумораи хонандагон вобаста ба зинаи тахсилот</h4>
                <td>
                    <ul class="dataset-resources unstyled">
                        <li><a title="Скачать в формате CSV" href="/?c=od&act=maktabformtri&format=csv"><img src="'.UIPATH.'/img/csv.png" /> </a></li>
                        <li><a title="Скачать в формате JSON" href="/?c=od&act=maktabformtri&format=json"><img src="'.UIPATH.'/img/json.png" /> </a></li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>Микдори муассисахои тахсилоти миёнаи умумии таълимашон рузона ва шумораи хонандагон</h4>
                <td>
                    <ul class="dataset-resources unstyled">
                        <li><a title="Скачать в формате CSV" href="/?c=od&act=maktabformchetiri&format=csv"><img src="'.UIPATH.'/img/csv.png" /> </a></li>
                        <li><a title="Скачать в формате JSON" href="/?c=od&act=maktabformchetiri&format=json"><img src="'.UIPATH.'/img/json.png" /> </a></li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>Хатмкунандагони синфхои 11 дар чанд соли охир</h4>
                <td>
                    <ul class="dataset-resources unstyled">
                        <li><a title="Скачать в формате CSV" href="/?c=od&act=maktabformpyat&format=csv"><img src="'.UIPATH.'/img/csv.png" /> </a></li>
                        <li><a title="Скачать в формате JSON" href="/?c=od&act=maktabformpyat&format=json"><img src="'.UIPATH.'/img/json.png" /> </a></li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>Маълумот оид  ба муассисахои томактабии ш. Душанбе</h4></td>
                <td>
                    <ul class="dataset-resources unstyled">
                        <li><a title="Скачать в формате CSV" href="/?c=od&act=kudakistonformodin&format=csv"><img src="'.UIPATH.'/img/csv.png" /> </a></li>
                        <li><a title="Скачать в формате JSON" href="/?c=od&act=kudakistonformodin&format=json"><img src="'.UIPATH.'/img/json.png" /> </a></li>
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>';
	return $result;
}

}