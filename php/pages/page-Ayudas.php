<div class="portlet">

<a href="home.php?page=Afectaciones&rel=<?php echo $_REQUEST['censo_hogar_id']?>">regresar</a>
       <h3 class="portlet-title">
          Listado de Ayudas para la  Afectacion "<?php echo $obj->GetObjectList($afectacion->tipoafectacion_id,'Tipoafectaciones')->descripcion." (".$afectacion->descripcion.")"?>" del Hogar "<?php echo $hogar->descripcion;?>" para el censo "<?php echo $censo->descripcion?>"
          <?php if($obj->TienePermiso('CREAR')&&$censo->estado=="ACTIVO"){ ?>
          <button type="button" class="btn btn-primary" id="btn-nuevo-<?php echo $obj->modelo;?>" >Nuevo Ayuda </button>
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
   <input type="hidden" id="afectacion_id" name="afectacion_id" value="<?php echo $_REQUEST['rel']?>">
   <input type="hidden" id="censo_hogar_id" name="censo_hogar_id" value="<?php echo $_REQUEST['censo_hogar_id']?>">

  
   

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
            <strong>TipoAyuda</strong>
            <select id="tipoayuda_id" name="tipoayuda_id" required="required" class="form-control">
              <?php foreach ($ayudas as $key => $v) {
                echo '<option value="'.$v->id.'">'.$v->descripcion.'</option>';
              }?>

            </select>
            
            </div>
          <div class="col-sm-4">
            <strong>cantidad</strong>
            <input class="form-control" id="cantidad" required="required" name="cantidad">
          </div>
          <div class="col-sm-12">
            <strong>Observacion</strong>
            <textarea id="observacion"class="form-control" name="observacion" required="required" ></textarea>
            
          </div>

          <div class="col-sm-4">
            <strong>Entregado?</strong>
            <select class="form-control" id="entregado" name="entregado" required="required">
              <option>No</option>
              <option>Si</option>
            </select>
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