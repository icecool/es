<?php
$map_m=new \APP\MVC\M\MAP_M;
$map_v=new \APP\MVC\V\MAP_V;

$dv_m=new \APP\MVC\M\DV_M;
$dv_v=new \APP\MVC\V\DV_V;

$this->pos['main']='
<div class="col-md-4" style="text-align: center">
test
            <img src="/ui/img/reg_img.300.png"/>
          </div>
          <div class="col-md-4" style="text-align: center">
            <img src="/ui/img/map_img.300.png"/>
          </div>
          <div class="col-md-4" style="text-align: center">
            <img src="/ui/img/od_img.300.png"/>
         </div>
<p>&nbsp;</p>
<div class="row">
<div class="col-md-6"><h4 style="text-align: center; font-weight: bold">Карта покрытыя образовательных учреждений</h4>'.$map_v->main($map_m,false).'</div>
<div class="col-md-6">'.$dv_v->bar2($dv_m).'</div>
</div>
';
// '.$map_v->main($map_m).'
/*<div class="col-md-1">
<button type="button" class="btn btn-default btn-lg btn-success">Подать заявку <span class="glyphicon glyphicon-menu-right"></span> </button><br/><br/>
<button type="button" class="btn btn-default btn-lg btn-success">Проверить заявку <span class="glyphicon glyphicon-check"></span> </button>
</div>*/