<div class="portlet">

       <a class="regresar" href="?page=Pacs">Regresar</a>

         <h3 class="portlet-title">
          Listado de Capacitaciones del PAC <?php echo $pac->descripcion;?>
          <?php if($obj->TienePermiso('CREAR')){ ?>
          <button type="button" class="btn btn-primary" id="btn-nuevo-<?php echo $obj->modelo;?>" >Nuevo Capacitacion </button>
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
   <input type="hidden" id="pac_id" name="pac_id" value="<?php echo $_REQUEST['rel']?>">

<div class="modal fade bs-example-modal-lg" id="FormModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><span id="span-accion-<?php echo $destino?>">Nuevo</span> <?php echo $obj->label?></h4>
      </div>
      <div class="modal-body">

        
          <div class="form-group">

          <div class="row">
          <div class="col-sm-4">
            <strong>Programa</strong>
            <select  class="form-control" name="programa_id" required="required" id="programa_id">
            <?php 
                    foreach ($programas as $key => $programa) {
                     echo '<option value="'.$programa->id.'">'.$programa->descripcion.'</option>';
                    }
              ?>

            </select>
              
          </div>
           <div class="col-sm-4">
            <strong>Tipo Capacitacion</strong>
            <select  class="form-control" required="required" name="tipocapacitacion_id" id="tipocapacitacion_id">
              
              <?php 
                    foreach ($tipocapacitaciones as $key => $tipocap) {
                     echo '<option value="'.$tipocap->id.'">'.$tipocap->descripcion.'</option>';
                    }
              ?>
            </select>
              
          </div>
           <div class="col-sm-4">
            <strong>Encargado</strong>
            <select id="user_id" name="user_id" required="required"  class="form-control">
              <?php 
                    foreach ($encargados as $key => $encargado) {
                     echo '<option value="'.$encargado->id.'">'.$encargado->login.'</option>';
                    }
              ?>

            </select>
          </div>
          <div class="col-sm-4">
            <strong>Descripcion</strong>
            
            <input class="form-control" name="descripcion" id="descripcion" required="required">
          </div>
           <div class="col-sm-4">
            <strong>Fecha</strong>
            <input  class="form-control" type="date" name="fecha" id="fecha" required="required">
              
          </div>
         
         

          </div>
          
        
      </div>
      <div class="modal-footer">
        <button type="button" id="btn-cancelar-<?php echo $destino?>" class="pull-left btn btn-warning" data-dismiss="modal">Cancelar</button>
        <input type="submit"  class="pull-right btn btn-info" id="btn-guardar-<?php echo $destino?>" value="Guardar"/>
      </div>
    </div>
  </div>
</div>
</form>