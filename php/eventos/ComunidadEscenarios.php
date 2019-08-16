<?php 

 if ($sPage=="ComunidadEscenarios"){
    $com=new Comunidades();
    $comunidad=$com->GetObject($_REQUEST['rel']);
    $obj=new ComunidadEscenarios($_REQUEST['rel']);
    $obj->BloquearPagina();
    $array_list=$obj->Listar();
    $tabla=$obj->MostrarObjeto($array_list);
    $includePage='php/pages/page-Comunidadescenarios.php';
    $script='<script >var Comunidadescenarios = new Controller("'.$obj->modelo.'");</script>';
       $script.='<script>Comunidadescenarios.campos_form='.json_encode($obj->campos_form).';</script>';
    $script.='<script>Comunidadescenarios.eventos();</script>';

    $obj_=new Escenarios();
    $escenarios_list=$obj_->Listar();
     $asignados=array();
    foreach ($array_list as $key => $obj_array) {
      $asignados[]=$obj_array->escenario_id;
    }
    foreach ($escenarios_list as $key => $esc_array) {
      if(in_array($esc_array->id, $asignados)){
        unset($escenarios_list[$key]);
      }
    }
    
    
    
   }

   if($sPage=="ObtenerObjetoComunidadescenarios"){
      $obj=new ComunidadEscenarios();
      $ce=$obj->GetObject($_REQUEST['rel']);
      echo json_encode($ce);

      
      exit(0);
   }
   
  
    if($sPage=="GuardarObjetoComunidadescenarios"){
      $obj=new ComunidadEscenarios();
      $id=$_POST['id'];
      unset($_POST['id']);
      $rs=$obj->GuardarObject($id,$_POST);
      $_SESSION['mensaje']=(is_object($rs))?array("ok"=>$obj->modelo_." (".$rs->{$obj->descripcion_modelo}.") "." Guardado  Satisfactoriamente"):array("error"=>"Ocurrio un error Intente de Nuevo");
      header("location:?page=ComunidadEscenarios&rel=".$_POST['comunidad_id']);
      exit(0);
   }
   if($sPage=="EliminarObjetoComunidadescenarios"){
      $obj=new ComunidadEscenarios();
      $rs=$obj->EliminarObject($_REQUEST['rel']);
      $_SESSION['mensaje']=(is_object($rs))?array("ok"=>$obj->modelo_." (".$rs->{$obj->descripcion_modelo}.") "."Eliminado Satisfactoriamente"):array("error"=>"Ocurrio un error Intente de Nuevo");
      header("location:?page=ComunidadEscenarios&rel=".$_REQUEST['rel2']);
      exit(0);
   }       
    

?>