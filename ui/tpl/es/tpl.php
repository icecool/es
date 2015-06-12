<?php if(!defined('BDIR')){echo '[+_+]'; exit;} ?>
<!DOCTYPE html>
<html lang="en,ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $UI->show('meta'); ?>
    <link rel="icon" href="<?php echo $conf['tpl']; ?>/img/ico/ves.png">

    <title><?php $UI->show('title'); ?></title>

    <!-- Bootstrap core CSS -->
    <link href="./ui/ext/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="./ui/ext/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo $conf['tpl']; ?>/css/style.css" rel="stylesheet">
    <?php $UI->show('link'); ?>

  </head>

  <body role="document">

    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./">
          <strong><?php echo lang('openedu','OpenEDU'); ?></strong></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <?php $UI->show('mainmenu'); $UI->show('user2'); ?>
          </ul>
          <div class="navbar-right">
            <?php $UI->show('user1'); ?>
          </div>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <?php if(!isset($_GET['c'])) { ?><div class="shapka">
        <div class="intro">
            <div class="dtable hw100">
                <div class="dtable-cell hw100">
                    <div class="container text-center">
                        <h1 class="intro-title animated fadeInDown"> 
                        Открытые данные общеобразовательных учреждений г. Душанбе</h1>
                    </div>
                </div>
            </div>
        </div>
        </div><?php } ?>
    <div id="xcontent" class="container-fluid">

      <div class="row">
        <div class="col-md-12">
          <?php
          $CORE::show('error');
          $CORE::show('info');
          $CORE::show('debug');
          ?>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <?php $UI->show('main'); ?>
        </div>
      </div>

      <hr>

      <footer>
          <div class="row">
              <div class="col-md-3">
                  <p class="text-center text-muted"><small>ES &#169; 2015 :: <?php echo microtime(true)-$start;; ?></small></p>
              </div>
              <div class="col-md-6"></div>
              <div class="col-md-3">
                  <a href="http://opendata.tj/" target="_blank"> <img src="<?php echo UIPATH; ?>/img/od_tj.png" /> OPENDATA.TJ</a>
                  &nbsp;<a href="http://www.opendata-hackathon.com/" target="_blank"> <img src="<?php echo UIPATH; ?>/img/logo_small.png" /></a>
              </div>
          </div>

      </footer>
    </div> <!-- /container -->

    <!-- JavaScript -->
    <script type="text/javascript" src="<?php echo UIPATH; ?>/ext/jquery/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="<?php echo UIPATH; ?>/ext/bootstrap/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo UIPATH; ?>/ext/bootstrap/js/ie10-viewport-bug-workaround.js"></script>
    <?php $UI->show('js'); ?>

  </body>
</html>