<?php
namespace APP\MVC\C;

class OD_C {

    function __construct($REQUEST,$model,$view){
    	$UI=\CORE\BC\UI::init();
        $dvm = new \APP\MVC\M\DV_M;
        switch($REQUEST->get('act')){
        	case 'ajax':
        		$do='';
        		if(isset($_GET['do'])) $do=trim($_GET['do']);
        		switch($do){
                    case 'test':

                    break;
        		}
        		exit;
        	break;
            case 'muassisaho':
                $format = (isset($_GET['format'])) ? $_GET['format'] : "json";
                switch($format){
                    case 'json':
                        $res = $dvm->db2jsongen('muassisaho', array('namud', 'name_ru', 'name_tj', 'director', 'address', 'geo_id', 'phone', 'cellphone', 'geo_lat', 'geo_lng', 'muassisa_photo'));
                        echo json_encode($res);
                        exit;
                        break;
                    case 'csv':
                        $res = $dvm->db2csvgen('muassisaho', array('namud', 'name_ru', 'name_tj', 'director', 'address', 'geo_id', 'phone', 'cellphone', 'geo_lat', 'geo_lng', 'muassisa_photo'));
                        exit;
                        break;
                        exit;
                        break;
                    case 'xml':
                        $data = $dvm->db2arraygen('muassisaho', array('namud', 'name_ru', 'name_tj', 'director', 'address', 'geo_id', 'phone', 'cellphone', 'geo_lat', 'geo_lng', 'muassisa_photo'));
                        //$data = array('color'=>'red','colors'=>array('#fff','#ddd','#eee'));
                        echo ArrayToXML::toXML($data);
                        exit;
                        break;
                }
                exit;
                break;
            case 'maktabformodin':
                $format = (isset($_GET['format'])) ? $_GET['format'] : "json";
                switch($format){
                    case 'json':
                        $res = $dvm->db2jsongen('maktab_form1', array());
                        echo json_encode($res);
                        exit;
                        break;
                    case 'csv':
                        $res = $dvm->db2csvgen('maktab_form1', array());
                        exit;
                        break;
                }
                exit;
                break;
            case 'maktabformdva':
                $format = (isset($_GET['format'])) ? $_GET['format'] : "json";
                switch($format){
                    case 'json':
                        $res = $dvm->db2jsongen('maktab_form2', array());
                        echo json_encode($res);
                        exit;
                        break;
                    case 'csv':
                        $res = $dvm->db2csvgen('maktab_form2', array());
                        exit;
                        break;
                }
                exit;
                break;
            case 'maktabformtri':
                $format = (isset($_GET['format'])) ? $_GET['format'] : "json";
                switch($format){
                    case 'json':
                        $res = $dvm->db2jsongen('maktab_form3', array());
                        echo json_encode($res);
                        exit;
                        break;
                    case 'csv':
                        $res = $dvm->db2csvgen('maktab_form3', array());
                        exit;
                        break;
                }
                exit;
                break;
            case 'maktabformchetiri':
                $format = (isset($_GET['format'])) ? $_GET['format'] : "json";
                switch($format){
                    case 'json':
                        $res = $dvm->db2jsongen('maktab_form4', array());
                        echo json_encode($res);
                        exit;
                        break;
                    case 'csv':
                        $res = $dvm->db2csvgen('maktab_form4', array());
                        exit;
                        break;
                }
                exit;
                break;
            case 'maktabformpyat':
                $format = (isset($_GET['format'])) ? $_GET['format'] : "json";
                switch($format){
                    case 'json':
                        $res = $dvm->db2jsongen('maktab_form5', array());
                        echo json_encode($res);
                        exit;
                        break;
                    case 'csv':
                        $res = $dvm->db2csvgen('maktab_form5', array());
                        exit;
                        break;
                }
                exit;
                break;
            case 'kudakistonformodin':
                $format = (isset($_GET['format'])) ? $_GET['format'] : "json";
                switch($format){
                    case 'json':
                        $res = $dvm->db2jsongen('kudakiston_form1', array());
                        echo json_encode($res);
                        exit;
                        break;
                    case 'csv':
                        $res = $dvm->db2csvgen('kudakiston_form1', array());
                        exit;
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

class ArrayToXML
{
    /**
     * Функция конвертации массива в XML объект
     * На вход подается мульти вложенный массив, на выходе получается с помощью рекурсии валидный xml
     *
     * @param array $data
     * @param string $rootNodeName - корень вашего xml.
     * @param SimpleXMLElement $xml - используется рекурсивно
     * @return string XML
     */
    public static function toXml($data, $rootNodeName = 'root', $xml=null)
    {
        // включить режим совместимости, не совсем понял зачем это но лучше делать
        if (ini_get('zend.ze1_compatibility_mode') == 1)
        {
            ini_set ('zend.ze1_compatibility_mode', 0);
        }

        if ($xml == null)
        {
            $xml = simplexml_load_string("<?xml version=\"1.0\" encoding=\"utf-8\"?><$rootNodeName />");
        }

        //цикл перебора массива
        foreach($data as $key => $value)
        {
            // нельзя применять числовое название полей в XML
            if (is_numeric($key))
            {
                // поэтому делаем их строковыми
                $key = "data";
            }

            // удаляем не латинские символы
            $key = preg_replace('/[^a-z0-9]/i', '', $key);

            // если значение массива также является массивом то вызываем себя рекурсивно
            if (is_array($value))
            {
                $node = $xml->addChild($key);
                // рекурсивный вызов
                ArrayToXML::toXml($value, $rootNodeName, $node);
            }
            else
            {
                // добавляем один узел
                $value = htmlentities($value);
                $xml->addChild($key,$value);
            }

        }
        // возвратим обратно в виде строки  или просто XML-объект
        return $xml->asXML();
    }
}