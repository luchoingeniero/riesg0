<div class="portlet">

        <h3 class="portlet-title">
          Listado de Usuarios
          <?php if($obj->TienePermiso('CREAR')){ ?>
          <button type="button" class="btn btn-primary" id="btn-nuevo-Users" >Nuevo Usuario</button>
          <?php } ?>


        </h3>

        <div class="portlet-body">


        
       <div id="content-table">
       <?php echo $tabla;?>
</div>
        </div> <!-- /.portlet-body -->

      </div> <!-- /.portlet -->


<form id="formObjetoUsers" method="post" action="?page=GuardarObjetoUsers">
  <input type="hidden" id="id" name="id" value="-1">
<div class="modal fade" id="FormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Usuarios</h4>
      </div>
      <div class="modal-body">

        
          <div class="form-group">
            <label for="descripcion" class="control-label">Nick:</label>
            <input type="text" class="form-control" required="required" id="login" name="login">
          </div>
           <div class="form-group">
            <label for="password" class="control-label">Password:</label>
            <input type="hidden" class="form-control" name="password_old" id="password_old">
            <input type="password" class="form-control" required="required" id="password" name="password">
          </div>
           <div class="form-group">
            <label for="role" class="control-label">Perfil:</label>
            <select class="form-control" name="role_id" id="role_id">
              <?php foreach ($roles_list as $key => $role) {
                   echo '<option value="'.$role->id.'">'.$role->descripcion.'</option>';
              }?>
            </select> 
          </div>
          
        
      </div>
      <div class="modal-footer">
        <button type="button" id="btn-cancelar-Users" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
        <input type="submit"  class="btn btn-info" value="Guardar"/>
      </div>
    </div>
  </div>
</div>
</form>