<div class="portlet">

        <h3 class="portlet-title">
          Listado de Pistas

        </h3>

        <div class="portlet-body">

        <div class="row">
          <div class="col-sm-4">
            <strong>Descripcion</strong>
            <input type="hidden" id="id" value="-1">
            <input class="form-control" id="descripcion">
          </div>
          <div class="col-sm-1">
          <strong>&nbsp;</strong>
          <input type="button" class="btn btn-info" id="btn-guardar-Pistas" value="Guardar">
            
          </div>
          <div class="col-sm-1">
          <strong>&nbsp;</strong>
          <input type="button" class="btn btn-warning" id="btn-cancelar-Pistas" value="Cancelar">
            
          </div>
          
        </div>
        
       <div id="content-table">
          <table class="table table-striped table-bordered" id="tabla-personalizada">
            <thead>
              <tr>
                <th >Descripcion</th>
                <th >Acciones</th>
                </tr>
            </thead>
            <tbody id="table-content">
              

            </tbody>

            <tfoot>
              <tr>
                <th>Descripcion</th>
                <th>Acciones</th>
                
              </tr>
            </tfoot>
          </table>
</div>
        </div> <!-- /.portlet-body -->

      </div> <!-- /.portlet -->