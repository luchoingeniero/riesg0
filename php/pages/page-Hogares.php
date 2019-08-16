<div class="portlet">

        <?php if( $censo->tipocenso=="ATENCION"){?>
        <a class="regresar" href="?page=Censos">Regresar</a>
        <?php }else{?>
        <a class="regresar" href="?page=EscenariosCensos&rel=<?php echo $censo->escenario_id;?>">Regresar</a>
        <?php } ?>


         <h3 class="portlet-title">
          Listado de Hogares del Censo de <?php echo $censo->tipocenso?> "<?php echo $censo->descripcion;?>"
          <?php if($obj->TienePermiso('CREAR')&&$censo->estado=="ACTIVO"){ ?>
          <button type="button" class="btn btn-primary" id="btn-nuevo-<?php echo $obj->modelo;?>" >Nuevo Hogar </button>
          <?php } ?>

        </h3>



        <div class="portlet-body">

        
        
       <div id="content-table">
        <?php echo $tabla;?>
</div>
        </div> <!-- /.portlet-body -->

      </div> <!-- /.portlet -->

      <form id="formObjeto<?php echo $obj->modelo?>" method="post" action="?page=GuardarObjeto<?php echo $obj->modelo?>">
  <input type="hidden" name="id" id="id" value="-1">
  <input type="hidden" name="censo_id" id="censo_id" value="<?php echo $_REQUEST['rel'];?>"> 

<div class="modal fade" id="FormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><span id="span-accion-<?php echo $obj->modelo?>">Nuevo</span> <?php echo $obj->label?></h4>
      </div>
      <div class="modal-body">

        
          <div class="form-group">
            <div class="row">
               <div class="col-sm-6">
            <strong>Consecutivo</strong>
            
            <input class="form-control" name="codigo" required="required" id="codigo">
          </div>
          <div class="col-sm-6">
            <strong>Descripcion</strong>
           
            <input class="form-control" name="descripcion" required="required" id="descripcion">
          </div>
          <div class="col-sm-6">
            <strong>Barrio</strong>
            <input class="form-control" type="text" required="required" name="barrio" id="barrio">
          </div>
          
          <div class="col-sm-6">
            <strong>Direccion</strong>
            <input type="text" class="form-control"  required="required" name="direccion" id="direccion">
              
            
          </div>
     
            </div>
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