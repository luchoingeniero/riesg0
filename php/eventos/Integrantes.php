<?php 

 if ($sPage=="Integrantes"){
    $censo_id=$_REQUEST['rel'];
    $censo_id=explode('_',$censo_id);
    $hogar_id=$censo_id[1];
    $censo_id=$censo_id[0];


 	  $cen=new Censos();
    $censo=$cen->GetObject($censo_id);

    $hog=new Hogares();
    $hogar=$hog->GetObject($hogar_id);

    $obj=new Integrantes($hogar_id);
    $obj->ESTADO_CENSO=$censo->estado;
    $obj->BloquearPagina();
    $tabla=$obj->MostrarObjeto($obj->Listar());
    $includePage='php/pages/page-Integrantes.php';
    $script='<script >var Integrante = new Controller("'.$obj->modelo.'");</script>';
    //$script.='<script>Barrio.validar_existe=true;</script>';
    $script.='<script>Integrante.campos_form='.json_encode($obj->campos_form).';</script>';
    $script.='<script>Integrante.eventos();</script>';
   // $script.='<script src="assets/js/controllers/app/Integrantes.js"></script>';

    $obj_=new Parentescos();
    $parentescos=$obj_->Listar();
    $obj_=new Tipodocumentos();
    $tipodocs=$obj_->Listar();
            
   }
  
  if($sPage=="ExisteObjetoIntegrantes"){
    $obj=new Integrantes();
    $url=$obj->modelo.'Codigo/'.$_REQUEST['codigo'];
    echo json_encode($obj->get($url));
    exit(0);
   }

   
   if($sPage=="ObtenerObjetoIntegrantes"){
      $obj=new Integrantes();
      echo json_encode($obj->GetObject($_REQUEST['rel']));
      exit(0);
   }
    if($sPage=="GuardarObjetoIntegrantes"){
      $obj=new Integrantes();
      $id=$_POST['id'];
      $censo_id=$_POST['censo_id'];
      unset($_POST['id']);
      unset($_POST['censo_id']);
      
      $rs=$obj->GuardarObject($id,$_POST);
      //print_r($_POST);
      $_SESSION['mensaje']=(is_object($rs))?array("ok"=>$obj->modelo_." (".$rs->{$obj->descripcion_modelo}.") "." Guardado  Satisfactoriamente"):array("error"=>"Ocurrio un error Intente de Nuevo");
      header("location:?page=Integrantes&rel=".$censo_id."_".$_POST['hogar_id']);
      exit(0);
   }
   if($sPage=="EliminarObjetoIntegrantes"){
      $obj=new Integrantes();
      $rs=$obj->EliminarObject($_REQUEST['rel']);
      $_SESSION['mensaje']=(is_object($rs))?array("ok"=>$obj->modelo_." (".$rs->{$obj->descripcion_modelo}.") "."Eliminado Satisfactoriamente"):array("error"=>"Ocurrio un error Intente de Nuevo");
      header("location:?page=Integrantes&rel=".$_REQUEST['rel2']);
      exit(0);
   }       
    

?>