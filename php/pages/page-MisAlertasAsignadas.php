<div class="portlet">

        <h3 class="portlet-title">
         Mis Alertas Asignadas

        </h3>

        <div class="portlet-body">

    
        
       <div id="content-table3">
       <?php echo $tabla;?>
          
</div>
        </div> <!-- /.portlet-body -->

      </div> <!-- /.portlet -->


      <div id="div-overlay" class="overlay-out demo-card-square mdl-card mdl-shadow--2dp">
        <div class="contenido-div-overlay">
  <div class="mdl-card__supporting-text">
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

  <div class="mdl-card__title imagen col-md-6"  id="maps_canvas_overlay">
   </div>
   <div class="mdl-card__title-2 col-md-6" id="overlay-imagen" >
   <img src="" class="imagen" id="overlay_imagen_" style="height:250px;">
   </div>
  </div>
  <form action="" id="RespuestaCenso">
    <div class="row">
  <input type="hidden" id="alerta_id">
    <div class="col-sm-4">
                        <select required="required" id="respuestasalerta_id" class="form-control">
                      <?php 
                              foreach ($respuestas as $key => $p) {
                                echo '<option value="'.$p->id.'">'.$p->descripcion.'</option>';
                              }
                      ?>
                          
                        </select>
          </div>
    <div class="col-sm-2"><label>Crear Censo?</label><input type="checkbox" id="crear-censo"></div> 
        
         
  </div>
  <div class="row">
    
       <div  class="col-sm-4 datos-contacto">
            <strong>Nombre Contacto</strong>
            <input class="form-control" type="text" name="nombrecontacto" id="nombrecontacto">
          </div>
         
          <div class="col-sm-4 datos-contacto">
            <strong>Tel Contacto</strong>
            <input class="form-control" type="text" name="telcontacto" id="telcontacto">
          </div>
          <div class="col-sm-4">
           <strong>&nbsp;</strong>
      <input type="submit" class="form-control btn btn-primary"  value="Atender">
    </div> 
    

  </div>
  </form>
  <br/>

  <div class="mdl-card__actions mdl-card--border">
    <a  class="cerrar-overlay mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
      Cerrar
    </a>
  </div>
</div>
</div>