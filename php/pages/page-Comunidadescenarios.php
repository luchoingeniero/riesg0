<div class="portlet">
<a class="regresar" href="?page=Comunidades&rel=<?php echo $comunidad->municipio_id?>">Regresar</a>

      <h3 class="portlet-title">
          Listado de Escenarios de Riesgo de la Comunidad <?php echo $comunidad->descripcion?> del Municipio de 
          <?php echo $obj->GetObjectList($comunidad->municipio_id,'Municipios')->descripcion; ?>
          <?php if($obj->TienePermiso('CREAR')){ ?>
          <button type="button" class="btn btn-primary" id="btn-nuevo-<?php echo $obj->modelo;?>" >Agregar Escenario </button>
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
   <input type="hidden" id="comunida_id" name="comunidad_id" value="<?php echo $_REQUEST['rel']?>">
<div class="modal fade" id="FormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><span id="span-accion-<?php echo $obj->modelo?>">Agregar</span> <?php echo $obj->label?></h4>
      </div>
      <div class="modal-body">

         <div class="form-group">
            <label for="escenario_id" class="control-label">Escenario de Riesgo:</label>
            <select required="required" id="escenario_id" name="escenario_id"  class="form-control">
              <?php 
                    foreach ($escenarios_list as $key => $escenario) {
                      echo '<option value="'.$escenario->id.'">'.$escenario->descripcion.'</option>';
                    }
              ?>
            </select>


          </div>



          <div class="form-group">
            <label for="observacion" class="control-label">Nivel:</label>
            <select required="required" name="nivel" id="nivel">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
            </select>
            
          </div>

          <div class="form-group">
            <label for="observacion" class="control-label">Observacion:</label>
            <textarea class="form-control" required="required" id="observacion" name="observacion"></textarea>
            
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