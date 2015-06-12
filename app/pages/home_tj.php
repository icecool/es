<?php
$map_m=new \APP\MVC\M\MAP_M;
$map_v=new \APP\MVC\V\MAP_V;

$dv_m=new \APP\MVC\M\DV_M;
$dv_v=new \APP\MVC\V\DV_V;

$this->pos['main']='<br>
<div class="col-md-4" style="text-align: center">
            <a href="./?c=reg"><img border="0" src="'.UIPATH.'/img/reg_img.300.png"/></a>
          </div>
          <div class="col-md-4" style="text-align: center">
            <a href="./?c=map"><img border="0" src="'.UIPATH.'/img/map_img.300.png"/></a>
          </div>
          <div class="col-md-4" style="text-align: center">
            <a href="./?c=od"><img border="0" src="'.UIPATH.'/img/od_img.300.png"/></a>
         </div>
<p>&nbsp;</p>
<br><br>
<div class="row">
<div class="col-md-12">
<h3 class="text-center form_sep_blue"><strong>'.lang("karta_pokrytiya","Карта покрытия образовательных учреждений г. Душанбе").'</strong></h3>
'.$map_v->main($map_m,false).'
</div>
</div>
<br><br>
<h3 class="text-center form_sep_red"><strong>'.lang("dv","Визуализация данных").'</strong></h3>
<br>
<div class="row">
<div class="col-md-6">'.$dv_v->lines($dv_m,1).'</div>
<div class="col-md-6">'.$dv_v->dbar($dv_m,1).'</div>
</div>
';
