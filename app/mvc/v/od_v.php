<?php
namespace APP\MVC\V;

class OD_V {

/*
 *



 * */
public function main($model){
    \CORE\BC\UI::init()->pos['js'].='<script>
    $(document).ready(function() {
        /*$("a.odnavail").click(function(e){
            e.preventDefault();
            alert("Данный формат в настоящее время недоступен для скачивания");
        });*/
    });
    </script>';
    $result='
    <h3 class="form_sep_blue"><strong>Список открытых данных для использования в приложениях третей стороны</strong></h3>
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr><th>Наименование набора данных</th><th class="text-center">Форматы данных</th></tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <h4>Список всех учебных учреждений г. Душанбе</h4>
                </td>
                <td class="text-center">
                    <ul class="dataset-resources unstyled">
                        <li><a title="Скачать в формате CSV" href="./?c=od&act=muassisaho&format=csv"><img src="'.UIPATH.'/img/csv.png" /> </a></li>
                        <li><a title="Скачать в формате JSON" href="./?c=od&act=muassisaho&format=json"><img src="'.UIPATH.'/img/json.png" /> </a></li>
                        <li><a class="odnavail" title="Скачать в формате XML" href="#./?c=od&act=muassisaho&format=xml"><img src="'.UIPATH.'/img/xml2.png" /> </a></li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>Распределение классов и учеников по языку обучения</h4>
                </td>
                <td class="text-center">
                    <ul class="dataset-resources unstyled">
                        <li><a title="Скачать в формате CSV" href="./?c=od&act=maktabformodin&format=csv"><img src="'.UIPATH.'/img/csv.png" /> </a></li>
                        <li><a title="Скачать в формате JSON" href="./?c=od&act=maktabformodin&format=json"><img src="'.UIPATH.'/img/json.png" /> </a></li>
                        <li><a class="odnavail" title="Скачать в формате XML" href="#./?c=od&act=muassisaho&format=xml"><img src="'.UIPATH.'/img/xml2.png" /> </a></li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>Суммарная информация о составе учеников</h4>
                </td>
                <td class="text-center">
                    <ul class="dataset-resources unstyled">
                        <li><a title="Скачать в формате CSV" href="./?c=od&act=maktabformdva&format=csv"><img src="'.UIPATH.'/img/csv.png" /> </a></li>
                        <li><a title="Скачать в формате JSON" href="./?c=od&act=maktabformdva&format=json"><img src="'.UIPATH.'/img/json.png" /> </a></li>
                        <li><a class="odnavail" title="Скачать в формате XML" href="#./?c=od&act=muassisaho&format=xml"><img src="'.UIPATH.'/img/xml2.png" /> </a></li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>Число учащихся в зависимости от уровня обучения</h4>
                </td>
                <td class="text-center">
                    <ul class="dataset-resources unstyled">
                        <li><a title="Скачать в формате CSV" href="./?c=od&act=maktabformtri&format=csv"><img src="'.UIPATH.'/img/csv.png" /> </a></li>
                        <li><a title="Скачать в формате JSON" href="./?c=od&act=maktabformtri&format=json"><img src="'.UIPATH.'/img/json.png" /> </a></li>
                        <li><a class="odnavail" title="Скачать в формате XML" href="#./?c=od&act=muassisaho&format=xml"><img src="'.UIPATH.'/img/xml2.png" /> </a></li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>Общее количество средних дневных учебных заведений и число учащихся</h4>
                </td>
                <td class="text-center">
                    <ul class="dataset-resources unstyled">
                        <li><a title="Скачать в формате CSV" href="./?c=od&act=maktabformchetiri&format=csv"><img src="'.UIPATH.'/img/csv.png" /> </a></li>
                        <li><a title="Скачать в формате JSON" href="./?c=od&act=maktabformchetiri&format=json"><img src="'.UIPATH.'/img/json.png" /> </a></li>
                        <li><a class="odnavail" title="Скачать в формате XML" href="#./?c=od&act=muassisaho&format=xml"><img src="'.UIPATH.'/img/xml2.png" /> </a></li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>Выпускники 11 классов за последние несколько лет</h4>
                </td>
                <td class="text-center">
                    <ul class="dataset-resources unstyled">
                        <li><a title="Скачать в формате CSV" href="./?c=od&act=maktabformpyat&format=csv"><img src="'.UIPATH.'/img/csv.png" /> </a></li>
                        <li><a title="Скачать в формате JSON" href="./?c=od&act=maktabformpyat&format=json"><img src="'.UIPATH.'/img/json.png" /> </a></li>
                        <li><a class="odnavail" title="Скачать в формате XML" href="#./?c=od&act=muassisaho&format=xml"><img src="'.UIPATH.'/img/xml2.png" /> </a></li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>Общая информация о дошкольных учреждениях г. Душанбе</h4>
                </td>
                <td class="text-center">
                    <ul class="dataset-resources unstyled">
                        <li><a title="Скачать в формате CSV" href="./?c=od&act=kudakistonformodin&format=csv"><img src="'.UIPATH.'/img/csv.png" /> </a></li>
                        <li><a title="Скачать в формате JSON" href="./?c=od&act=kudakistonformodin&format=json"><img src="'.UIPATH.'/img/json.png" /> </a></li>
                        <li><a class="odnavail" title="Скачать в формате XML" href="#./?c=od&act=muassisaho&format=xml"><img src="'.UIPATH.'/img/xml2.png" /> </a></li>
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>';
	return $result;
}

}