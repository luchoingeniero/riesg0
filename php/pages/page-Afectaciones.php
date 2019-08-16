<div class="portlet">
<a href="home.php?page=Hogares&rel=<?php echo $censo->id?>">regresar</a>
       <h3 class="portlet-title">
          Listado de Afectaciones del Hogar "<?php echo $hogar->descripcion;?>" para el censo "<?php echo $censo->descripcion?>"
          <?php if($obj->TienePermiso('CREAR')&&$censo->estado=="ACTIVO"){ ?>
          <button type="button" class="btn btn-primary" id="btn-nuevo-<?php echo $obj->modelo;?>" >Nuevo Afectacion </button>
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
   <input type="hidden" id="censo_hogar_id" name="censo_hogar_id" value="<?php echo $_REQUEST['rel']?>">
  
   

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
            <strong>Tipo Afectacion</strong>
            <select id="tipoafectacion_id" required="required" name="tipoafectacion_id" class="form-control">
              <?php foreach ($afectaciones as $key => $p) {
                echo '<option value="'.$p->id.'">'.$p->descripcion.'</option>';
              }?>
            </select>
            
            </div>
          <div class="col-sm-4">
            <strong>cantidad</strong>
            <input class="form-control" type="number" required="required" name="cantidad" id="cantidad">
          </div>
           <div class="col-sm-4">
            <strong>Valor Aproximado</strong>
            <input type="text" id="valoraproximado" required="required" name="valoraproximado" class="form-control">
            
            </div>
          <div class="col-sm-12">
            <strong>Descripcion</strong>
            <textarea id="descripcion" name="descripcion" required="required" class="form-control" ></textarea>
            
          </div>

        </div>
          
        
      </div>
      <div class="modal-footer">
        <button type="button" id="btn-cancelar-<?php echo $obj->modelo?>" class="pull-left btn btn-warning" data-dismiss="modal">Cancelar</button>
        <input type="submit"  class="pull-right btn btn-info" id="btn-guardar-<?php echo $obj->modelo?>" value="Guardar"/>
      </div>
    </div>
  </div>
</div>
</form>