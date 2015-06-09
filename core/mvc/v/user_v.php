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
	$result='';
	if($model!=null){
		$UI=\CORE\BC\UI::init();
		$groups=$model->get_groups();
		$count=count($groups);
    	$result.='<div class="btn-group" role="group" aria-label="...">
			  <p><button id="new_group" type="button" class="btn btn-default"
			  data-toggle="modal" data-target="#newGroup">'.lang('add','Добавить').'</button></p>
			</div>
			<!-- Modal -->
		    <div class="modal fade" id="newGroup" tabindex="-1" role="dialog" aria-labelledby="newGroupLabel" aria-hidden="true">
		      <div class="modal-dialog">
		        <div class="modal-content">
		          <div class="modal-header">
		            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		            <span aria-hidden="true">&times;</span></button>
		            <h4 class="modal-title" id="newGroupLabel">'.lang('newgroup','Новая группа').':</h4>
		          </div>
		          <form id="frm_new_group">
		          <div id="newGroupBody" class="modal-body">
					  <div class="form-group">
					    <label for="groupname">'.lang('groupname','Название группы').'</label>
					    <input type="text" class="form-control" id="groupname" placeholder="'.lang('group','группа').'">
					  </div>

		          </div>
		          <div class="modal-footer">
		            <button type="button" class="btn btn-default" data-dismiss="modal">
		            '.lang('close','Close').'</button>
		            <button type="button" id="group_add" class="btn btn-primary">'.lang('add','Add').'</button>
		          </div>
		          </form>
		        </div>
		      </div>
		    </div>
		    <!-- /Modal -->
			';
$UI->pos['js'].="\n".'<script src="'.UIPATH.'/js/groups.js"></script>';
    	if(count($groups)>0){
    		// output table
    		$result.='
    		<table class="table table-bordered table-hover" style="width:auto;">
			<thead>
			<tr>
	          <th>id</th>
	          <th>'.lang('groupname','Название группы').'</th>
	          <th>'.lang('action','Действие').'</th>
	        </tr>
	        </thead>
	        <tbody>
	        ';
    		foreach($groups as $id => $v){
				$result.='<tr>
				<td>'.$id.'</td>
				<td>'.$v.'</td>
				<td rel="'.$id.'" class="text-center">
					<a role="menuitem" tabindex="-1" class="edit" href="#edit" title="'.lang('edit','Редактировать').'">
			    		<i class="glyphicon glyphicon-edit"></i>
			    	</a>
			    	&nbsp;
					<a role="menuitem" tabindex="-1" class="del" href="#del" title="'.lang('delete','Удалить').'">
			    		<i class="glyphicon glyphicon-remove"></i>
			    	</a>
				</td>
				</tr>';
    		}
    		$result.='</tbody>
    		</table>
    		';
    	} else {
			$result.='<h4 class="text-danger">'.lang('nodbrecords','No records found').'</h4>';
    	}
		return $result;
	}
}

}
