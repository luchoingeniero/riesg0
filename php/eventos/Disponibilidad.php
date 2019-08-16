<?php 

 if ($sPage=="Disponibilidad"){
 	  $obj=new Disponibilidad();
    $obj->BloquearPagina();
    $tabla=$obj->MostrarObjeto($obj->Listar($_REQUEST['rel']));
    $includePage='php/pages/page-Disponibilidad.php';
    $script='<script >var Disponibilidad = new Controller("'.$obj->modelo.'");</script>';
     $script.='<script>Disponibilidad.validar_existe=true;</script>';
    $script.='<script>Disponibilidad.campos_form='.json_encode($obj->campos_form).';</script>';
    $script.='<script>Disponibilidad.eventos();</script>';
    $script.='<script src="assets/js/controllers/app/disponibilidad.js"></script>';    
            
   /*Lista de Pistas*/
   $obj_pistas=new Pistas();
   $pistas_list=$obj_pistas->Listar();
   
   }

 if($sPage=="DisponiblidadUsuarios"){
   $obj=new Disponibilidad();

  echo json_encode($obj->DisponiblidadUsuarios());
  exit(0);
 }  

if($sPage=="ExisteObjetoDisponibilidad"){
    $obj=new Disponibilidad();

    echo json_encode($obj->ValidarExiste($_REQUEST['data'],$_REQUEST['usuario_id'],$_REQUEST['rel']));
    exit(0);

   }

   
   if($sPage=="ObtenerObjetoDisponibilidad"){
      $obj=new Disponibilidad();
      $disponibilidad=$obj->GetObject($_REQUEST['rel']);
     
    echo json_encode($disponibilidad);

      
      exit(0);
   }
    if($sPage=="GuardarObjetoDisponibilidad"){
      $obj=new Disponibilidad();
      $id=$_POST['id'];
      unset($_POST['id']);
      $rs=$obj->GuardarObject($id,$_POST);
      $_SESSION['mensaje']=(is_object($rs))?array("ok"=>$obj->modelo_." (".$rs->{$obj->descripcion_modelo}.") "." Guardado  Satisfactoriamente"):array("error"=>"Ocurrio un error Intente de Nuevo");
      header("location:?page=Disponibilidad&rel=".$_REQUEST['usuario_id']);
      exit(0);
   }
   if($sPage=="EliminarObjetoDisponibilidad"){
      $obj=new Disponibilidad();
      $rs=$obj->EliminarObject($_REQUEST['rel']);
      $_SESSION['mensaje']=(is_object($rs))?array("ok"=>$obj->modelo_." (".$rs->{$obj->descripcion_modelo}.") "."Eliminado Satisfactoriamente"):array("error"=>"Ocurrio un error Intente de Nuevo");
      header("location:?page=Disponibilidad&rel=".$_REQUEST['rel2']);
      exit(0);
   }       
    

?>