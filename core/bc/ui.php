<?php
namespace CORE\BC;

class UI {

    private static $inst;

    private $tpl='';
    public $pos=array(
        'meta'=>'',
        'link'=>'',
        'title'=>'',
        'js'=>'',
        'mainmenu'=>'',
        'user1'=>'',
        'user2'=>'',
        'main'=>'',
        );
    private $pages=array('home'=>'home','about'=>'about','team'=>'team');

    public static function init() {
        if(empty(self::$inst)) {
            self::$inst = new self();
        }
        return self::$inst;
    }

    private function __construct() {
        global $conf;
        if(isset($conf['tpl']) && is_readable($conf['tpl'].'/tpl.php')){
            $this->tpl=$conf['tpl'].'/tpl.php';
        } else {
            if(is_readable(UIPATH.'/tpl/default/tpl.php')){
                $this->tpl=UIPATH.'/tpl/default/tpl.php';
            } else {
                echo 'Template not found<br>';
            }
        }
    }

    public function tpl(){ return $this->tpl; }
    public function get_pages(){ return $this->pages; }
    //public function set_page($alias,$name){
    //    $this->pages[$alias]=$name;
    //}

    public function show($name='main'){
        if(isset($this->pos[$name])){
            echo $this->pos[$name];
        }
    }

    public function static_page($alias=''){
        if(isset($GLOBALS['langs'])) {$lang='_'.\CORE::init()->lang;} else {$lang='';}
        if(isset($this->pages[$alias])){
            $path=ADIR.'/pages/'.$this->pages[$alias].$lang.'.php';
            if(is_readable($path)){
                if(true){ // \SEC::init()->acl('page',$alias)
                    include($path);
                    // \CORE::msg('debug','Include page: '.$this->pages[$alias]);
                }
            } else {
                \CORE::msg('error','Page not found');
            }
        } else {
            \CORE::msg('error','Page not found');
        }
    }

    public static function lang_bar(){
        global $langs;
        $result='';
        $lang=\CORE::init()->lang;
        if(count($langs)>0){
            $result.='
            <div class="form-group">
                <div class="dropdown">
                  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="true">
                    <i class="langflag langflag-'.$lang.'"></i>&nbsp;<small>'.$langs[$lang].'</small>
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu2">
                        ';
                        foreach ($langs as $key => $value) {
                            if($key!=$lang){
                                $result.='
                        <li role="usermenu">
                            <a role="menuitem" tabindex="-1" href="./?lang='.$key.'">
                            <i class="langflag langflag-'.$key.'"></i>&nbsp;<small>'.$langs[$key].'</small>
                            </a>
                        </li>
                        ';
                            }
                        }
                        $result.='
                  </ul>
                </div>
            </div>
            ';
        }
        return $result;
    }

    public static function modal($id='xModal',$title='xModalTitle',$btn=''){
        $result='
    <!-- Modal -->
    <div class="modal fade" id="'.$id.'" tabindex="-1" role="dialog" aria-labelledby="'.$id.'Label" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="'.$id.'Label">'.$title.'</h4>
          </div>
          <div id="'.$id.'Body" class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <!-- /Modal -->
    ';
        return $result;
    }

    // add some method to show specific menu


}