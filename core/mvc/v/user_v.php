<?php
namespace CORE\MVC\V;

class USER_V {

public static function user_menu(){
	$UI=\CORE\BC\UI::init();
	$USER=\CORE\BC\USER::init();
	if($USER->auth()){
	/*
	$UI->pos['user1']='<form class="navbar-form">
		<a href="./?c=user&act=logout" class="btn btn-success">'.lang('signout','Sign out').'</a>
	</form>';
	*/
	$UI->pos['user1'].='
		<form class="navbar-form">
		'.$UI->lang_bar().'
		<div class="dropdown form-group">
		  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
		    '.$USER->get('username').'
		    <span class="caret"></span>
		  </button>
		  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
		    <li role="usermenu">
		    	<a role="menuitem" tabindex="-1" href="./?c=user&act=profile">
		    		<small><i class="glyphicon glyphicon-user"></i>&nbsp;</small> <span class="text">'.lang('profile','Profile').'</span>
		    	</a>
		    </li>
		    <!--
		    <li role="usermenu">
		    	<a role="menuitem" tabindex="-1" href="#">
		    		<small><i class="glyphicon glyphicon-cog"></i>&nbsp;</small> <span class="text">'.lang('settings','Settings').'</span>
		    	</a>
		    </li>
		    -->
		    <li role="usermenu" class="divider"></li>
		    <li role="usermenu">
		    	<a role="menuitem" tabindex="-1" href="./?c=user&act=logout">
		    		<small><i class="glyphicon glyphicon-off"></i>&nbsp;</small> <span class="text">'.lang('signout','Sign out').'</span>
		    	</a>
		    </li>
		  </ul>
		</div>
	</form>';
	} else {
	$UI->pos['user1'].='<form action="./?c=user&act=login" method="post" class="navbar-form">
		'.$UI->lang_bar().'
	    <div class="form-group">
	      <input type="text" name="login" placeholder="'.lang('login','Login').'" class="form-control">
	    </div>
	    <div class="form-group">
	      <input type="password" name="password" placeholder="'.lang('password','Password').'" class="form-control">
	    </div>
	    <button type="submit" class="btn btn-success">'.lang('signin','Sign in').'</button>
	  </form>
	';
	}

}

public function profile($model){
	if($model!=null){
		//\CORE::init()->msg('debug','Viewing user profile');
		//$UI->pos['main'].='';

	}
}

public function manage_users($model){
	if($model!=null){
		//\CORE::init()->msg('debug','Managing users accounts');
		//print_r($model->pwdGenerator('opendata'));
	}
}

public function manage_groups($model){
	if($model!=null){
		$UI=\CORE\BC\UI::init();
		$groups=$model->get_groups();
		$count=count($groups);
		$UI->pos['main'].='<div class="btn-group" role="group" aria-label="...">
		  <button id="new_group" type="button" class="btn btn-default"
		  data-toggle="modal" data-target="#myModal">New</button>
		</div>'.$UI::modal();
		if($count>0){
			//... show table
		} else {
			$UI->pos['main'].='<h4 class="text-danger">No records found in the database</h4>';
		}
	}
}

}
