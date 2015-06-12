<?php
$USER=\CORE\BC\USER::init();
$UI=\CORE\BC\UI::init();
$APP=\CORE\BC\APP::init();
$APP->set_modules(array('fcs','test'));
if($USER->auth()){
	if($USER->get('gid')==1){
		/*
		$UI->pos['user2'].='<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true">
		  '.lang('administration','Administration').'
		  <span class="caret"></span></a>
		  <ul class="dropdown-menu" role="menu">
		    <li><a href="./?c=user&act=manage">'.lang('users','Users').'</a></li>
		    <li><a href="./?c=user&act=groups">'.lang('groups','Groups').'</a></li>
		  </ul>
		</li>
		<!--<li><a href="#about">About</a></li>-->';
		*/
	}
	$UI->pos['user2'].='
	<li><a href="./?c=muassisaho">'.lang('facilities','Facilities').'</a></li>
	<li><a href="./?c=reg">'.lang('registration','Регистрация').'</a></li>
    <li><a href="./?c=map">'.lang('map','Карта').'</a></li>
    <li><a href="./?c=od">'.lang('od','Открытые данные').'</a></li>
    <li><a href="./?c=dv">'.lang('dv','Визуализации данных').'</a></li>


    <li class="dropdown">
	  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true">
	  '.lang('registration','Регистрация').'
	  <span class="caret"></span></a>
	  <ul class="dropdown-menu" role="menu">
	    li><a href="./?c=reg">'.lang('regform','Форма регистрации').'</a></li>
	    <li><a href="./?c=reg&act=check">'.lang('checkreg','Проверить статус заявки').'</a></li>
	  </ul>
	</li>
	';
}
