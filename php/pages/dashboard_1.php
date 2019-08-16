                    <div class="row">

                    <div class="col-lg-4 col-sm-6">
                    <?php $hogares_atendidos=$obj->BuscarCensosHogaresAtendidos(); 
                          $hogares_ayud_entre=$obj->BuscarCensosHogaresAyudasEntregadas(); 
                          $nro_integrantes=$obj->BuscarCensosHogaresIntegrantes(); 
                     ?>
                            <div class="info_box_var_1 box_bg_c">
                                <div class="info_box_body">
                                    <span class="info_box_icon icon_house_alt"></span>
                                    <span class="countUpMe" data-endVal="<?php echo $hogares_atendidos?>"><?php echo $hogares_atendidos?></span>
                                </div>
                                <div class="info_box_footer">
                                  Hogares Atendidos
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="info_box_var_1 box_bg_a">
                                <div class="info_box_body">
                                    <span class="info_box_icon el-icon-font"></span>
                                    <span class="countUpMe" data-endVal="<?php echo $hogares_ayud_entre?>"><?php echo $hogares_ayud_entre?></span>
                                </div>
                                <div class="info_box_footer">
                                    Hogares que han recibido ayudas
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-sm-6" id="grafico-personas">
                            <div class="info_box_var_1 box_bg_b">
                                <div class="info_box_body">
                                    <span class="info_box_icon social_myspace"></span>
                                    <span class="countUpMe" data-endVal="<?php echo $nro_integrantes?>"><?php echo $nro_integrantes?></span>
                                </div>
                                <div class="info_box_footer">
                                    
                                    <small>Personas Afectadas</small>
                                </div>
                            </div>
                        </div>
                                          </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading_a"><span class="heading_text">Cordoba</span></div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div id="world_map_vector" style="width:100%;height:300px">
                                        <script>
                                            countries_data = {
                                                "US": 2320,
                                                "BR": 1945,
                                                "IN": 1779,
                                                "AU": 1486,
                                                "TR": 1024,
                                                "CN": 753
                                            };
                                        </script>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <table class="table table-yuk">
                                        <thead>
                                        <tr>
                                            <th colspan="2">Municipios</th>
                                            <th>Usuarios</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="cw"><span class="icon_pin" style="color:#FF69B4"></td>
                                            <td>Planeta Rica</td>
                                            <td>2320</td>
                                        </tr>
                                        <tr>
                                            <td class="cw"><span class="icon_pin" style="color:#4169E1"></span></td>
                                            <td>Pueblo Nuevo</td>
                                            <td>1024</td>
                                        </tr>
                                        <tr>
                                            <td class="cw"><span class="icon_pin" style="color:#23E86B"></td>
                                            <td>Buenavista</td>
                                            <td>1779</td>
                                        </tr>
                                        <tr>
                                            <td class="cw"><span class="icon_pin" style="color:#109604"></td>
                                            <td>Montelibano</td>
                                            <td>1486</td>
                                        </tr>
                                        <tr>
                                            <td class="cw"><span class="icon_pin" style="color:#0865AC"></td>
                                            <td>La Apartada</td>
                                            <td>1945</td>
                                        </tr>
                                        
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    


  <div class="modal fade bs-example-modal-lg" id="ModalGraficos" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><span >Graficos</h4>
      </div>
      <div class="modal-body">

        <div id="container-grafico-p">
          <div id="container-grafico" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
          </div>
          
         
          
        
      </div>
      <div class="modal-footer">
        <button type="button" id="btn-cancelar" class="pull-left btn btn-warning" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>
