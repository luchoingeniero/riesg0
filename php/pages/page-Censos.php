<div class="portlet">

        <h3 class="portlet-title">
          Listado de Censos
          <?php if($obj->TienePermiso('CREAR')){ ?>
          <button type="button" class="btn btn-primary" id="btn-nuevo-<?php echo $obj->modelo;?>" >Nuevo Censo </button>
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
  <?php $tipo_censo=($sPage=="CensosPrevencion")?"PREVENCION":"ATENCION";?>
<input type="hidden" name="tipocenso" value="<?php echo $tipo_censo ?>">
 <?php if($sPage=="CensosPrevencion"){?>
 <input type="hidden" id="escenario_id" name="escenario_id" value="<?php echo $_REQUEST['rel']?>">
 <?php }?>

 <input type="hidden" name="back" value="<?php echo $_SERVER['REQUEST_URI'];?>">

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
            <strong>Descripcion</strong>
            
            
            
            <input class="form-control" name="descripcion" required="required" id="descripcion">
          </div>
          <div class="col-sm-4">
            <strong>Fecha</strong>
            <input class="form-control" type="date" name="fecha" id="fecha" required="required">
          </div>
          
        
            <div class="col-sm-4">
            <strong>Responsable</strong>
            <select class="form-control" required="required" name="user_id" id="user_id">
              <?php  foreach ($responsables as $key => $responsable) {
                  echo '<option value="'.$responsable->id.'">'.$responsable->login.'</option>';
              }?>
            </select>
          </div>
          <div class="col-sm-4">
            <strong>Municipio</strong>
            <select class="form-control" required="required" name="municipio_id" id="municipio_id">
              <?php  foreach ($municipios as $key => $municipio) {
                  echo '<option value="'.$municipio->id.'">'.$municipio->descripcion.'</option>';
              }?>
            </select>
          </div>
           <div class="col-sm-4">
            <strong>Comunidad</strong>
            <select class="form-control" required="required" name="comunidad_id" id="comunidad_id">
              
            </select>
          </div>

         
        
          <div class="col-sm-4">
            <strong>Lider</strong>
            <select class="form-control"  name="lider_id" id="lider_id">
              
            </select>
            <a href="#" id="CargarLider"> Ver Lider</a>
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
</div>

</form>


<div class="modal fade bs-example-modal-lg" id="FormModalLider" tabindex="-1" role="dialog" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title" id="">Datos del Lider</h4>
      </div>
      <div class="modal-body">

        
          <div class="form-group">

          <div class="row">
          <div class="col-sm-4">
            <strong>Tipo Documento</strong>
             <select class="form-control"  name="tipodocumento_id" id="tipodocumento_id">
          <?php foreach ($tipodocs_list as $key => $tipodocs) {
                   echo '<option value="'.$tipodocs->id.'">'.$tipodocs->descripcion.'</option>';
              }?>
          </select>
          </div>
           <div class="col-sm-4">
            <strong>Identificacion</strong>
            <input class="form-control"  type="text" name="identificacion" id="identificacion">
          </div>
           
           <div class="col-sm-4">
            <strong>Primer Apellido</strong>
            <input class="form-control" type="text"  name="apellido1" id="apellido1">
          </div>
            <div class="col-sm-4">
            <strong>Segundo Apellido</strong>
            <input class="form-control" type="text" name="apellido2" id="apellido2">
          </div>
            <div class="col-sm-4">
            <strong>Primer Nombre</strong>
            <input class="form-control" type="text"  name="nombre1" id="nombre1">
          </div>
            <div class="col-sm-4">
            <strong>Segundo Nombre</strong>
            <input class="form-control" type="text" name="nombre2" id="nombre2">
          </div>
            <div class="col-sm-4">
            <strong>Fecha Nac</strong>
            <input class="form-control" type="date"   name="fechanacimiento" id="fechanacimiento">
          </div>
            <div class="col-sm-4">
            <strong>Telefono</strong>
            <input class="form-control" type="text"  name="telefono" id="telefono">
          </div>
            <div class="col-sm-4">
            <strong>Email</strong>
            <input class="form-control" type="email" name="email" id="email">
          </div>
         

          </div>
          
        
      </div>
      <div class="modal-footer">
        <button type="button" onclick="$('#FormModalLider').hide();" class=" btn btn-warning" >Cerrar</button>
        
      </div>
    </div>
  </div>
</div>
