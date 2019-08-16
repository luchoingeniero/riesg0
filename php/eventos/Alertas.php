<?php 

 if ($sPage=="Alertas"){
 	  $obj=new Alertas();
    $obj->BloquearPagina("alertas_por_asignar");
    $alertas=$obj->get($obj->modelo."SinVoluntarioAsignado");
    $tabla=$obj->MostrarObjeto($alertas);
    $includePage='php/pages/page-Alertas.php';
   
    //$obj_=new Usuarios();
    //$usuarios=$obj_->Listar();
    }
 if($sPage=="AlertasAsignadas"){
    $obj=new Alertas();
    $obj->BloquearPagina("alertas_asignadas");
    $alertas=$obj->get($obj->modelo."ConVoluntarioAsignado");
    $tabla=$obj->MostrarObjeto($alertas);
    $includePage='php/pages/page-AlertasAsignadas.php';
  
 }   
 if ($sPage=="MisAlertasAsignadas"){
        $user_id=$_SESSION['User']->id;
        $obj=new Alertas();
        //$obj->BloquearPagina();
        $alertas=$obj->get($obj->modelo."MisAsignaciones/".$user_id);
        $tabla=$obj->MostrarObjeto($alertas);
        $includePage='php/pages/page-MisAlertasAsignadas.php';
        $obj_=new Respuestasalertas();
        $respuestas=$obj_->Listar();
  }

    
 if($sPage=="ObtenerObjetoAlertas"){
      $obj=new Alertas();
      $alerta=$obj->GetObject($_REQUEST['rel']);
      echo json_encode($alerta);
      exit(0);
   }
 
  if($sPage=="GuardarObjetoAlertas"){
      $obj=new Alertas();
      $id=$_POST['id'];
      unset($_POST['id']);
      $rs=$obj->GuardarObject($id,$_POST);
      echo json_encode($rs);
      exit(0);
   }
   if($sPage=="GuardarObjetoAlertas_"){
      $obj=new Alertas();
      $id=$_POST['id'];
      unset($_POST['id']);
      $respuestasalerta_id=$_POST['respuestasalerta_id'];
      unset($_POST['respuestasalerta_id']);
      $extra='';
      foreach ($_POST as $key => $val) {
        $extra.=$key."=".$val."&";
        unset($_POST[$key]);
      }
      $_POST['respuestasalerta_id']=$respuestasalerta_id;
      $rs=$obj->GuardarObject($id,$_POST,$extra);
      echo json_encode($rs);
      exit(0);
   }  

?>