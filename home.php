<?php
	define("admin_access", true);
	include('php/variables.php');
?>
<!DOCTYPE html>
<html>
    <head>
		<meta charset="UTF-8">
		<title>Riesg0 (<?php echo $sPage; ?>)</title>
        <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="logo.ico">

        <!-- bootstrap framework -->
		<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
		
        <!-- icon sets -->
            <!-- elegant icons -->
                <link href="assets/icons/elegant/style.css" rel="stylesheet" media="screen">
            <!-- elusive icons -->
                <link href="assets/icons/elusive/css/elusive-webfont.css" rel="stylesheet" media="screen">
            <!-- flags -->
                <link rel="stylesheet" href="assets/icons/flags/flags.css">
            <!-- scrollbar -->
                <link rel="stylesheet" href="assets/lib/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
                <link rel="stylesheet" href="assets/js/plugins/growl/jquery.growl.css">
                <link rel="stylesheet" href="//kendo.cdn.telerik.com/2016.2.607/styles/kendo.common-material.min.css" />
    <link rel="stylesheet" href="//kendo.cdn.telerik.com/2016.2.607/styles/kendo.material.min.css" />
                
<?php if (isset($css)) {?>
        <!-- page specific stylesheets -->
<?php echo $css; }?>

        <!-- google webfonts -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
         <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4F0mqHD-N32TuLYI2MMtEBoSySY7dItc"> </script>

        <!-- main stylesheet -->
		<link href="assets/css/main.min.css" rel="stylesheet" media="screen" id="mainCss">

        <!-- moment.js (date library) -->
        <script src="assets/js/moment-with-langs.min.js"></script>
        <script src="assets/js/jquery.min.js"></script>
        <link href="assets/css/select/bootstrap-select.css" rel="stylesheet" />
        <script src="assets/js/select/bootstrap-select.js"></script>
<style type="text/css">
    select{ width: 100%;}

</style>
    </head>
    <body class="side_menu_active side_menu_expanded">
        <div id="page_wrapper">

<?php include('php/pages/partials/header.php');?>

<?php include('php/pages/partials/breadcrumbs.php');?>

            <!-- main content -->
            <div id="main_wrapper">
                <div class="container-fluid">
<?php if (isset($includePage)) {
include($includePage);
} else {
echo '<div class="alert alert-danger text-center">Page not found</div>';
} ?>
                </div>
            </div>
            
<?php include('php/pages/partials/side_menu.php');?>


        </div>


<form id="CambiarDatosPerfil" method="post" action="?page=GuardarObjetoUsers">

<input type="hidden" id="id" name="id" value="<?php echo $_SESSION['User']->id?>">
<input type="hidden" name="back" value="<?php echo $_SERVER['REQUEST_URI'];?>">
 

<div class="modal fade bs-example-modal-lg" id="FormModalPerfil" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><span >Modificar Perfil</h4>
      </div>
      <div class="modal-body">

        
          <div class="form-group">
            <label for="descripcion" class="control-label">Nick:</label>
            <input type="text" class="form-control" disabled="disabled" value="<?php echo $_SESSION['User']->login; ?>" id="login" name="login">
          </div>
           <div class="form-group">
            <label for="password" class="control-label">Password:</label>
            <input type="hidden" class="form-control" value="<?php echo $_SESSION['User']->password?>" name="password_old" id="password_old">
            <input type="password" class="form-control" value="<?php echo $_SESSION['User']->password?>"  required="required" id="password" name="password">
          </div>
          
         
          
        
      </div>
      <div class="modal-footer">
        <button type="button" id="btn-cancelar" class="pull-left btn btn-warning" data-dismiss="modal">Cancelar</button>
        <input type="submit"  class="pull-right btn btn-info" id="btn-guardar" value="Guardar"/>
      </div>
    </div>
  </div>
</div>
</form>



        <!-- jQuery -->

        
        <!-- jQuery Cookie -->
        <script src="assets/js/jqueryCookie.min.js"></script>
        <!-- Bootstrap Framework -->
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <!-- retina images -->
        <script src="assets/js/retina.min.js"></script>
        <!-- switchery -->
        <script src="assets/lib/switchery/dist/switchery.min.js"></script>
        <!-- typeahead -->
        <script src="assets/lib/typeahead/typeahead.bundle.min.js"></script>
        <!-- fastclick -->
        <script src="assets/js/fastclick.min.js"></script>
        <!-- match height -->
        <script src="assets/lib/jquery-match-height/jquery.matchHeight-min.js"></script>
        <!-- scrollbar -->
        <script src="assets/lib/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

        <script src="assets/js/plugins/dataTables/jquery.dataTables.js"></script>
        <script src="assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
        <script src="assets/js/plugins/growl/jquery.growl.js"></script>
        <!-- Yukon Admin functions -->
         <script src="assets/js/countUp.min.js"></script>

     
        <script src="assets/lib/shuffle/jquery.shuffle.modernizr.min.js"></script>
        <script type="text/javascript" src="assets/js/pubnub.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.timeago.js"></script>
        <!-- Yukon Admin functions -->
        <script src="assets/js/yukon_all.js"></script>
       
        <script src="assets/js/controllers/controller.js"></script>
        <script src="assets/js/controllers/app/alertas.js"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="assets/js/printThis.js"></script>
        <script src="//kendo.cdn.telerik.com/2016.2.607/js/kendo.all.min.js"></script>

        

        
   <?php if (isset($script)) { ?>
        <!-- page specific plugins -->
    <?php echo $script; }; ?>

        <script type="text/javascript">
        pubnub = PUBNUB.init({  publish_key: 'pub-c-991debf1-2d35-42bc-aadf-6138cc7b2f22',subscribe_key: 'sub-c-44e356d2-8740-11e5-9320-02ee2ddab7fe'});
        pubnub.subscribe({channel  : "alertas",callback : CargarAlerta_});
        pubnub.subscribe({channel  : "alertas_asignadas_<?php echo $_SESSION['User']->id?>",callback : CargarAlerta_As});
        
         </script>


<?php //include('php/pages/partials/style_switcher.php');?>

<script type="text/javascript">
    $(".cerrar-overlay").click(function(){$("#div-overlay").hide();});
    $(function() {
           var table_1 = $('#tabla-personalizada').dataTable ({
   
            "fnInitComplete": function(oSettings, json) {
            $(this).parents ('.dataTables_wrapper').find ('.dataTables_filter input').prop ('placeholder', 'Buscar en la Tabla...').addClass ('form-control input-sm')
            }
            });
          $(".tool_tip").tooltip({container:"body"});
         });
   <?php if(isset($_SESSION['mensaje'])){
            if(isset($_SESSION['mensaje']['ok'])){echo '$.growl.notice({ message: "'.$_SESSION['mensaje']['ok'].'" });';}
            else if (isset($_SESSION['mensaje']['error'])){echo '$.growl.error({ message: "'.$_SESSION['mensaje']['error'].'"});';}
            unset($_SESSION['mensaje']);

    }?> 


</script>
<script type="text/javascript">
  $('select').selectpicker({
                                liveSearch: true
                                });
</script>


    </body>
</html>
