

<div class="portlet">
<a href="home.php?page=Hogares&rel=<?php echo $censo->id?>">regresar</a>
       <h3 class="portlet-title">
          Listado de Integrantes del Hogar "<?php echo $hogar->descripcion;?>" para el censo "<?php echo $censo->descripcion?>"
          <?php if($obj->TienePermiso('CREAR')&&$censo->estado=="ACTIVO"){ ?>
          <button type="button" class="btn btn-primary" id="btn-nuevo-<?php echo $obj->modelo;?>" >Nuevo Integrante </button>
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
   <input type="hidden" id="hogar_id" name="hogar_id" value="<?php echo $hogar->id?>">
   <input type="hidden" id="censo_id" name="censo_id" value="<?php echo $censo->id?>">
   

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
            <strong>Parentesco</strong>
            
            <select class="form-control" name="parentesco_id" id="parentesco_id">
              <?php foreach ($parentescos as $key => $p) {
                echo '<option value="'.$p->id.'">'.$p->descripcion.'</option>';
              }?>
            </select>
          </div>
          <div class="col-sm-4">
            <strong>Tipo Documentos</strong>
            <select class="form-control" name="tipodocumento_id" id="tipodocumento_id">
            <?php foreach ($tipodocs as $key => $p) {
                echo '<option value="'.$p->id.'">'.$p->descripcion.'</option>';
              }?>
              
            </select>
          </div>
          
          <div class="col-sm-4">
            <strong>Identificacion</strong>
            <input type="text" class="form-control" name="identificacion" id="identificacion">
              
            
          </div>
        

 <div class="col-sm-4">
            <strong>Primer Nombre</strong>
            <input type="text" class="form-control" name="primer_nombre" id="primer_nombre">
              
            
          </div>
 <div class="col-sm-4">
            <strong>Segundo Nombre</strong>
            <input type="text" class="form-control" name="segundo_nombre" id="segundo_nombre">
              
            
          </div>
 <div class="col-sm-4">
            <strong>Primer Apellido</strong>
            <input type="text" class="form-control" name="primer_apellido" id="primer_apellido">
              
            
          </div>
 <div class="col-sm-4">
            <strong>Segundo Apellido</strong>
            <input type="text" class="form-control" name="segundo_apellido" id="segundo_apellido">
              
            
          </div>
           <div class="col-sm-4">
            <strong>Fecha de Nacimiento</strong>
            <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento">
              
            
          </div>

          <div class="col-sm-4">
            <strong>Genero</strong>
            <select class="form-control" id="genero" name="genero"><option value="M">M</option><option value="F">F</option></select>
            
              
            
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