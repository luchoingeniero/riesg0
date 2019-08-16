<?php 

 if ($sPage=="Ayudas"){
    $censo_id=$_REQUEST['censo_hogar_id'];
    $censo_id=explode('_',$censo_id);
    $hogar_id=$censo_id[1];
    $censo_id=$censo_id[0];


 	  $cen=new Censos();
    $censo=$cen->GetObject($censo_id);

    $hog=new Hogares();
    $hogar=$hog->GetObject($hogar_id);

    $afe=new Afectaciones();
    $afectacion=$afe->GetObject($_REQUEST['rel']);

    $obj=new Ayudas($_REQUEST['rel']);
    $obj->CENSO_ESTADO=$censo->estado;
    $obj->BloquearPagina();
    $tabla=$obj->MostrarObjeto($obj->Listar());
    $includePage='php/pages/page-Ayudas.php';
    $script='<script >var Afectacion = new Controller("'.$obj->modelo.'");</script>';
    //$script.='<script>Barrio.validar_existe=true;</script>';
    $script.='<script>Afectacion.campos_form='.json_encode($obj->campos_form).';</script>';
    $script.='<script>Afectacion.eventos();</script>';
   // $script.='<script src="assets/js/controllers/app/Ayudas.js"></script>';

    $obj_=new TipoAyudas();
    $ayudas=$obj_->Listar();
    
            
   }
  
  if($sPage=="ExisteObjetoAyudas"){
    $obj=new Ayudas();
    $url=$obj->modelo.'Codigo/'.$_REQUEST['codigo'];
    echo json_encode($obj->get($url));
    exit(0);
   }

   
   if($sPage=="ObtenerObjetoAyudas"){
      $obj=new Ayudas();
      echo json_encode($obj->GetObject($_REQUEST['rel']));
      exit(0);
   }
    if($sPage=="GuardarObjetoAyudas"){
      $obj=new Ayudas();
      $id=$_POST['id'];
      unset($_POST['id']);
      $rel=$_POST['censo_hogar_id'];
      unset($_POST['censo_hogar_id']);

      $rs=$obj->GuardarObject($id,$_POST);
      //print_r($_POST);
      $_SESSION['mensaje']=(is_object($rs))?array("ok"=>$obj->modelo_." (".$rs->{$obj->descripcion_modelo}.") "." Guardado  Satisfactoriamente"):array("error"=>"Ocurrio un error Intente de Nuevo");
      header("location:?page=Ayudas&rel=".$_POST['afectacion_id'].'&censo_hogar_id='.$rel);
      exit(0);
   }
   if($sPage=="EliminarObjetoAyudas"){
      $obj=new Ayudas();
      $rs=$obj->EliminarObject($_REQUEST['rel']);
      $_SESSION['mensaje']=(is_object($rs))?array("ok"=>$obj->modelo_." (".$rs->{$obj->descripcion_modelo}.") "."Eliminado Satisfactoriamente"):array("error"=>"Ocurrio un error Intente de Nuevo");
      $rel=explode('-', $_REQUEST['rel2']);
      header("location:?page=Ayudas&rel=".$rel[0]."&censo_hogar_id=".$rel[1]);
      exit(0);
   }       
    

?>