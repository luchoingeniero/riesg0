<?php 

 if ($sPage=="Comunidades"){
 	  $mnpo=new Municipios();
    $municipio=$mnpo->GetObject($_REQUEST['rel']);
    $obj=new Comunidades($_REQUEST['rel']);
    $obj->BloquearPagina();
    $tabla=$obj->MostrarObjeto($obj->Listar());
    $includePage='php/pages/page-Comunidades.php';
    $script='<script >var Comunidad = new Controller("'.$obj->modelo.'");</script>';
    $script.='<script>Comunidad.validar_existe=true;</script>';
    $script.='<script>Comunidad.campos_form='.json_encode($obj->campos_form).';</script>';
    $script.='<script>Comunidad.eventos();</script>';
    
    
   }
if($sPage=="ComunidadesList"){
  $obj=new Comunidades($_REQUEST['rel']);
   $rs=$obj->Listar();
  echo json_encode($rs);
   exit(0);
}

if($sPage=="ExisteObjetoComunidades"){
    $obj=new Comunidades();
    echo json_encode($obj->ValidarExiste($_REQUEST['data'],$_REQUEST['rel']));
    exit(0);

   }

   
   if($sPage=="ObtenerObjetoComunidades"){
      $obj=new Comunidades();
      echo json_encode($obj->GetObject($_REQUEST['rel']));
      exit(0);
   }
    if($sPage=="GuardarObjetoComunidades"){
      $obj=new Comunidades();
      $id=$_POST['id'];
      unset($_POST['id']);
      $rs=$obj->GuardarObject($id,$_POST);
      $_SESSION['mensaje']=(is_object($rs))?array("ok"=>$obj->modelo_." (".$rs->{$obj->descripcion_modelo}.") "." Guardado  Satisfactoriamente"):array("error"=>"Ocurrio un error Intente de Nuevo");
      header("location:?page=Comunidades&rel=".$_POST['municipio_id']);
      exit(0);
   }
   if($sPage=="EliminarObjetoComunidades"){
      $obj=new Comunidades();
      $rs=$obj->EliminarObject($_REQUEST['rel']);
      $_SESSION['mensaje']=(is_object($rs))?array("ok"=>$obj->modelo_." (".$rs->{$obj->descripcion_modelo}.") "."Eliminado Satisfactoriamente"):array("error"=>"Ocurrio un error Intente de Nuevo");
      header("location:?page=Comunidades&rel=".$_REQUEST['rel2']);
      exit(0);
   }       
    

?>