<?php
$USER=\CORE\BC\USER::init();
$UI=\CORE\BC\UI::init();
if($USER->auth()){
	if($USER->get('gid')==1){
		/*
		$UI->pos['user2'].='<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true">
		  Administration
		  <span class="caret"></span></a>
		  <ul class="dropdown-menu" role="menu">
		    <li><a href="./?c=user&act=manage">Manage users</a></li>
		    <li><a href="./?c=user&act=groups">Manage groups</a></li>
		  </ul>
		</li>
		<!--<li><a href="#about">About</a></li>-->';
		*/
	}
	$UI->pos['user2'].='<li class="dropdown">
	  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true">
	  Modules
	  <span class="caret"></span></a>
	  <ul class="dropdown-menu" role="menu">
	    <li><a href="./?c=muas">Muassisaho</a></li>
	  </ul>
	</li>';
}
