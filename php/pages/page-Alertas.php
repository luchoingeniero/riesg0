<div class="portlet">

        <h3 class="portlet-title">
          Ultimas Alertas

        </h3>

        <div class="portlet-body">

    
        
       <div id="content-table">
       <?php echo $tabla;?>
          
</div>
        </div> <!-- /.portlet-body -->

      </div> <!-- /.portlet -->


      <div id="div-overlay" class="overlay-out demo-card-square mdl-card mdl-shadow--2dp">
      <div class="contenido-div-overlay">
  
  <div class="mdl-card__supporting-text" style="background-color:#fff">
      <div id="item-alerta-overlay" class="cerrar-overlay item-alerta mdl-js-button mdl-js-ripple-effect" >
    <div class="item-alerta-body">
      <img id="overlay-img" src="" >
      <div>
      <strong id="overlay-nombres">....</strong> Alertó Sobre <strong id="overlay-categoria">...</strong>Nivel <strong id="overlay-nivel">....</strong>
      </div>
      <p  >
      <span id="overlay-direccion" > en ...</span></p>
    </div>
</div>

  </div>

  <div class="row"> 

  <div class="mdl-card__title  col-md-6"  id="maps_canvas_overlay">
   </div>
   <div class="mdl-card__title-2 col-md-6" id="overlay-imagen" >
   <img src="" class="imagen" id="overlay_imagen_" style="height:250px;">
   </div>
  </div>
  <?php if($obj->TienePermiso_('CREAR',$_SESSION['User']->id,'alertas_por_asignar')){ ?>
  <form action="" id="AsignarAlerta" method="post" onsubmit="">
  <div class="row">
  <input type="hidden" id="alerta_id">
    <div class="col-sm-4">
                        <select id="user_id" name="user_id" required="required" class="form-control">
                          <?php /* foreach ($usuarios as $key => $usuario) {
                            echo '<option value="'.$usuario->id.'">'.$usuario->login.'</option>';
                          } */?>
                        </select>
          </div>
    <div class="col-sm-4">
      <input type="submit" class="btn btn-primary"  onclick="" value="Asignar">
    </div>      
  </div>
  </form>
  <?php } ?>
  <div class="mdl-card__actions mdl-card--border">
    <a  class="cerrar-overlay mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
      Cerrar
    </a>
  </div>
</div>
</div>