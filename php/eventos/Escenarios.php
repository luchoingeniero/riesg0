<?php 

 if ($sPage=="Escenarios"){
 	  $obj=new Escenarios();
    $obj->BloquearPagina();
    $tabla=$obj->MostrarObjeto($obj->Listar());
    $includePage='php/pages/page-Escenarios.php';
    $script='<script >var Escenarios = new Controller("'.$obj->modelo.'");</script>';
    $script.='<script>Escenarios.validar_existe=true;</script>';
    $script.='<script>Escenarios.campos_form='.json_encode($obj->campos_form).';</script>';
    $script.='<script>Escenarios.eventos();</script>';
            
   /*Lista de Comunidades*/
   //$obj_Comunidades=new Comunidades();
   //$comunidades_list=$obj_Comunidades->Listar();
   $obj_tiporiesgos=new Tiporiesgos();
   $tiporiesgos_list=$obj_tiporiesgos->Listar();
   
   }

if ($sPage=="EscenariosCensos"){

  $obj=new Censos();
  $obj->BloquearPagina();
  $rel=$_REQUEST['rel'];
  $tabla=$obj->MostrarObjeto($obj->ListarByEscenario($rel));
  $includePage='php/pages/page-Censos.php';
     $script='<script >var Censos = new Controller("'.$obj->modelo.'");</script>';
    $script.='<script>Censos.campos_form='.json_encode($obj->campos_form).';</script>';
    $script.='<script src="assets/js/controllers/app/censos.js"></script>';

            
   /*Lista de Pistas*/
   $obj_=new Usuarios();
   $responsables=$obj_->Listar();
   $obj_=new Municipios();
   $municipios=$obj_->Listar();
   $obj_=new Tipodocumentos();
   $tipodocs_list=$obj_->Listar();
   

}

if($sPage=="ExisteObjetoEscenarios"){
    $obj=new Escenarios();
    echo json_encode($obj->ValidarExiste($_REQUEST['data'],$_REQUEST['rel']));
    exit(0);

   }

   
   if($sPage=="ObtenerObjetoEscenarios"){
      $obj=new Escenarios();
      $programa=$obj->GetObject($_REQUEST['rel']);
      $Comunidades=$programa->comunidades;
      $array_Comunidades=array();
      foreach ($Comunidades as $key => $pista) {
      $array_Comunidades[]=$pista->id;
      }
      $programa->comunidades=$array_Comunidades;
      echo json_encode($programa);

      
      exit(0);
   }
    if($sPage=="GuardarObjetoEscenarios"){
      $obj=new Escenarios();
      $id=$_POST['id'];
      //$comunidades=$_POST['comunidades'];
      unset($_POST['id']);
      //unset($_POST['comunidades']);
      //$extra='comunidades='.implode(',', $comunidades);

      $rs=$obj->GuardarObject($id,$_POST);
      $_SESSION['mensaje']=(is_object($rs))?array("ok"=>$obj->modelo_." (".$rs->{$obj->descripcion_modelo}.") "." Guardado  Satisfactoriamente"):array("error"=>"Ocurrio un error Intente de Nuevo");
      header("location:?page=Escenarios");
      exit(0);
   }
   if($sPage=="EliminarObjetoEscenarios"){
      $obj=new Escenarios();
      $rs=$obj->EliminarObject($_REQUEST['rel']);
      $_SESSION['mensaje']=(is_object($rs))?array("ok"=>$obj->modelo_." (".$rs->{$obj->descripcion_modelo}.") "."Eliminado Satisfactoriamente"):array("error"=>"Ocurrio un error Intente de Nuevo");
      header("location:?page=Escenarios");
      exit(0);
   }       
    

?>