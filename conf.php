<?php
// environment
define('BDIR',str_replace('\\','/',realpath(dirname(__FILE__)))); // base dir
define('CDIR',BDIR.'/core'); // abs core dir
define('ADIR',BDIR.'/app'); // app dir
define('APPNAME','es'); // app name
define('PREFX',APPNAME.'_'); // prefix for sessions, etc.
define('APPATH','./app'); // app path, url
define('UIPATH','./ui'); // ui path, url
define('NL_MODE',0); // 1 is maintenance on
define('NL_DEBUG',1);
// database
$conf['db_server']='localhost';
$conf['db_port']='';
$conf['db_charset']='utf8';
$conf['db_name']=APPNAME;
$conf['db_user']='root';
$conf['db_pass']='';
$conf['db_con']=false;
// user interface
$langs=array('ru'=>'Русский','tj'=>'Тоҷикӣ');
$conf['tpl']=UIPATH.'/tpl/es'; // template
