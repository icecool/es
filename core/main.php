<?php
if(!defined('BDIR')){echo '[+_+]'; exit;}

if(is_readable(CDIR.'/bc/core.php')) {require(CDIR.'/bc/core.php');} else {echo 'Core not found'; exit;}

$CORE=CORE::init();
$USER=\CORE\BC\USER::init();
$UI=\CORE\BC\UI::init();
$APP=\CORE\BC\APP::init();

$UI->pos['main']=$CORE->lang('test','Ин тест мебошад');

$CORE::unload();
if($UI->tpl()!=''){include($UI->tpl());}
