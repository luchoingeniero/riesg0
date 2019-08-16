<div class="portlet">

        <h3 class="portlet-title">
          Listado de Programas
          <?php if($obj->TienePermiso('CREAR')){ ?>
          <button type="button" class="btn btn-primary" id="btn-nuevo-<?php echo $obj->modelo;?>" >Nuevo Programa </button>
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
   
<div class="modal fade" id="FormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><span id="span-accion-<?php echo $obj->modelo?>">Nuevo</span> <?php echo $obj->label?></h4>
      </div>
      <div class="modal-body">

        
          <div class="form-group">
            <label for="descripcion" class="control-label">Descripcion:</label>
            <input type="text" class="form-control" required="required" id="descripcion" name="descripcion">
          </div>
          
           <div class="form-group">
            <label for="pistas" class="control-label">Pistas:</label>
            <select id="pistas" name="pistas[]" multiple="multiple" class="form-control">
              <?php 
                    foreach ($pistas_list as $key => $pista) {
                      echo '<option value="'.$pista->id.'">'.$pista->descripcion.'</option>';
                    }
              ?>
            </select>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" id="btn-cancelar-<?php echo $destino?>" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
        <input type="submit"  class="btn btn-info" id="btn-guardar-<?php echo $obj->modelo?>" value="Guardar"/>
      </div>
    </div>
  </div>
</div>
</form>