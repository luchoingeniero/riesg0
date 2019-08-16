<div class="portlet">

        <h3 class="portlet-title">
          Listado de <?php echo $obj->label ?>
          <?php if($obj->TienePermiso('CREAR')){ ?>
          <button type="button" class="btn btn-primary" id="btn-nuevo-<?php echo $obj->modelo?>" >Nuevo <?php echo $obj->label?> </button>
          <?php } ?>

        </h3>

        <div class="portlet-body">
    
        
       <div id="content-table">
           <?php echo $tabla;?>
</div>
        </div> <!-- /.portlet-body -->

      </div> <!-- /.portlet -->

 <form id="formObjeto<?php echo $obj->modelo?>" method="post" action="?page=GuardarObjeto<?php echo $obj->modelo?>">
  <input type="hidden" id="id" name="id" value="-1">
  <input type="hidden" id="usuario_id" name="usuario_id" value="<?php echo $_REQUEST['rel']?>">
<div class="modal fade" id="FormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><span id="span-accion-<?php echo $obj->modelo?>">Nuevo</span> <?php echo $obj->label?></h4>
      </div>
      <div class="modal-body">

        
          <div class="form-group">
            <label for="dia" class="control-label">Dia:</label>
            <select name="dia" id="dia" class="form-control" required="required">
              <option>LUNES</option>
              <option>MARTES</option>
              <option>MIERCOLES</option>
              <option>JUEVES</option>
              <option>VIERNES</option>
              <option>SABADOS</option>
              <option>DOMINGOS</option>
              
            </select>
            
          </div>
          <div class="form-group">
          <h4 style="margin-top: 2em;">Hora Inicial</h4>
             <input id="hora_inicial" required="required" name="hora_inicial"  style="width: 100%;" />

                <h4 style="margin-top: 2em;">Hora Final</h4>
                <input id="hora_final" required="required" name="hora_final"  style="width: 100%;" />

          </div>
          
        
      </div>
      <div class="modal-footer">
        <button type="button" id="btn-cancelar-<?php echo $obj->modelo?>" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
        <input type="submit"  class="btn btn-info" id="btn-guardar-<?php echo $obj->modelo?>" value="Guardar"/>
      </div>
    </div>
  </div>
</div>
</form>