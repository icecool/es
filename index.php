<?php
$start=microtime(true);
if(is_readable('./conf.php')){require('./conf.php');} else {echo 'Configuration not found';exit;}
if(is_readable(CDIR.'/main.php')){require(CDIR.'/main.php');} else {echo 'Main not connected';exit;}
?>