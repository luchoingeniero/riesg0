<div class="portlet">
<a class="regresar" href="?page=Comunidades&rel=<?php echo $comunidad->municipio_id?>">Regresar</a>

        <h3 class="portlet-title">
          Listado de Lideres de la Comunidad de <?php echo $comunidad->descripcion;?>
          <?php if($obj->TienePermiso('CREAR')){ ?>
          <button type="button" class="btn btn-primary" id="btn-nuevo-<?php echo $obj->modelo;?>" >Nuevo Lider </button>
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
   <input type="hidden" id="municipio_id" name="comunidad_id" value="<?php echo $_REQUEST['rel']?>">

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
            <strong>Tipo Documento</strong>
            <input type="hidden" id="id" value="-1">
            <input type="hidden" id="comunidad_id" name="comunidad_id" value="<?php echo $_REQUEST['rel']?>">
          <select class="form-control" required="required" name="tipodocumento_id" id="tipodocumento_id">
          <?php foreach ($tipodocs_list as $key => $tipodocs) {
                   echo '<option value="'.$tipodocs->id.'">'.$tipodocs->descripcion.'</option>';
              }?>
          </select>
          </div>
           <div class="col-sm-4">
            <strong>Identificacion</strong>
            <input class="form-control" required="required" type="text" name="identificacion" id="identificacion">
          </div>
           
           <div class="col-sm-4">
            <strong>Primer Apellido</strong>
            <input class="form-control" type="text" required="required" name="apellido1" id="apellido1">
          </div>
            <div class="col-sm-4">
            <strong>Segundo Apellido</strong>
            <input class="form-control" type="text" name="apellido2" id="apellido2">
          </div>
            <div class="col-sm-4">
            <strong>Primer Nombre</strong>
            <input class="form-control" type="text" required="required" name="nombre1" id="nombre1">
          </div>
            <div class="col-sm-4">
            <strong>Segundo Nombre</strong>
            <input class="form-control" type="text" name="nombre2" id="nombre2">
          </div>
            <div class="col-sm-4">
            <strong>Fecha Nac</strong>
            <input class="form-control" type="date" required="required"  name="fechanacimiento" id="fechanacimiento">
          </div>
            <div class="col-sm-4">
            <strong>Telefono</strong>
            <input class="form-control" type="text" required="required" name="telefono" id="telefono">
          </div>
            <div class="col-sm-4">
            <strong>Email</strong>
            <input class="form-control" type="email" name="email" id="email">
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