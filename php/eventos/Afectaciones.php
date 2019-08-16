<?php 

 if ($sPage=="Afectaciones"){
    $censo_id=$_REQUEST['rel'];
    $censo_id=explode('_',$censo_id);
    $hogar_id=$censo_id[1];
    $censo_id=$censo_id[0];


 	  $cen=new Censos();
    $censo=$cen->GetObject($censo_id);

    $hog=new Hogares();
    $hogar=$hog->GetObject($hogar_id);

    $obj=new Afectaciones($_REQUEST['rel']);
    $obj->ESTADO_CENSO=$censo->estado;
    $obj->BloquearPagina();
    $tabla=$obj->MostrarObjeto($obj->Listar());
    $includePage='php/pages/page-Afectaciones.php';
    $script='<script >var Afectacion = new Controller("'.$obj->modelo.'");</script>';
    //$script.='<script>Barrio.validar_existe=true;</script>';
    $script.='<script>Afectacion.campos_form='.json_encode($obj->campos_form).';</script>';
    $script.='<script>Afectacion.eventos();</script>';
   // $script.='<script src="assets/js/controllers/app/Afectaciones.js"></script>';

    $obj_=new Tipoafectaciones();
    $afectaciones=$obj_->Listar();
    
            
   }
  
  if($sPage=="ExisteObjetoAfectaciones"){
    $obj=new Afectaciones();
    $url=$obj->modelo.'Codigo/'.$_REQUEST['codigo'];
    echo json_encode($obj->get($url));
    exit(0);
   }

   
   if($sPage=="ObtenerObjetoAfectaciones"){
      $obj=new Afectaciones();
      echo json_encode($obj->GetObject($_REQUEST['rel']));
      exit(0);
   }
    if($sPage=="GuardarObjetoAfectaciones"){
      $obj=new Afectaciones();
      $id=$_POST['id'];
      unset($_POST['id']);
      $rel=$_POST['censo_hogar_id'];
      if($id!='-1'){
        unset($_POST['censo_hogar_id']);
      }   
      $rs=$obj->GuardarObject($id,$_POST);
      //print_r($_POST);
      $_SESSION['mensaje']=(is_object($rs))?array("ok"=>$obj->modelo_." (".$rs->{$obj->descripcion_modelo}.") "." Guardado  Satisfactoriamente"):array("error"=>"Ocurrio un error Intente de Nuevo");
      header("location:?page=Afectaciones&rel=".$rel);
      exit(0);
   }
   if($sPage=="EliminarObjetoAfectaciones"){
      $obj=new Afectaciones();
      $rs=$obj->EliminarObject($_REQUEST['rel']);
      $_SESSION['mensaje']=(is_object($rs))?array("ok"=>$obj->modelo_." (".$rs->{$obj->descripcion_modelo}.") "."Eliminado Satisfactoriamente"):array("error"=>"Ocurrio un error Intente de Nuevo");
      header("location:?page=Afectaciones&rel=".$_REQUEST['rel2']);
      exit(0);
   }       
    

?>