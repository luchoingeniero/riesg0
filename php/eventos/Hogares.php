<?php 

 if ($sPage=="Hogares"){
 	  $cen=new Censos();
    $censo=$cen->GetObject($_REQUEST['rel']);
    $obj=new Hogares($_REQUEST['rel']);
    $obj->ESTADO_CENSO=$censo->estado;
    $obj->BloquearPagina();
    $tabla=$obj->MostrarObjeto($obj->Listar());
    $includePage='php/pages/page-Hogares.php';
    $script='<script >var Hogar = new Controller("'.$obj->modelo.'");</script>';
    //$script.='<script>Barrio.validar_existe=true;</script>';
    $script.='<script>Hogar.campos_form='.json_encode($obj->campos_form).';</script>';
    $script.='<script>Hogar.eventos();</script>';
    $script.='<script src="assets/js/controllers/app/hogares.js"></script>';
            
   }
  
  if($sPage=="ExisteObjetoHogares"){
    $obj=new Hogares();
    $url=$obj->modelo.'Codigo/'.$_REQUEST['codigo'];
    echo json_encode($obj->get($url));
    exit(0);
   }

   
   if($sPage=="ObtenerObjetoHogares"){
      $obj=new Hogares();
      $pivot=explode('_', $_REQUEST['rel']);
      
      $rs=$obj->get("HogaresCenso/".$pivot[0]."/".$pivot[1]);
      echo json_encode($rs);
      exit(0);
   }
    if($sPage=="GuardarObjetoHogares"){
      $obj=new Hogares();
      $id=$_POST['id'];
      $censo_id=$_POST['censo_id'];
       unset($_POST['id']);
      unset($_POST['censo_id']);
      $extra="censo_id=".$censo_id;
      $rs=$obj->GuardarObject($id,$_POST,$extra);
      //print_r($_POST);
      $_SESSION['mensaje']=(is_object($rs))?array("ok"=>$obj->modelo_." (".$rs->{$obj->descripcion_modelo}.") "." Guardado  Satisfactoriamente"):array("error"=>"Ocurrio un error Intente de Nuevo");
      header("location:?page=Hogares&rel=".$censo_id);
      exit(0);
   }
   if($sPage=="EliminarObjetoHogares"){
      $obj=new Hogares();
      $rs=$obj->EliminarObject($_REQUEST['rel2']."_".$_REQUEST['rel']);
      $_SESSION['mensaje']=(is_object($rs))?array("ok"=>$obj->modelo_." (".$rs->{$obj->descripcion_modelo}.") "."Eliminado Satisfactoriamente"):array("error"=>"Ocurrio un error Intente de Nuevo");
      header("location:?page=Hogares&rel=".$_REQUEST['rel2']);
      exit(0);
   }       
    

?>