<?php 

 if ($sPage=="Barrios"){
 	$com=new Comunidades();
    $comunidad=$com->GetObject($_REQUEST['rel']);
    $obj=new Barrios($_REQUEST['rel']);
    $obj->BloquearPagina();
    $tabla=$obj->MostrarObjeto($obj->Listar());
    $includePage='php/pages/page-Barrios.php';
    $script='<script >var Barrio = new Controller("'.$obj->modelo.'");</script>';
    //$script.='<script>Barrio.validar_existe=true;</script>';
    $script.='<script>Barrio.campos_form='.json_encode($obj->campos_form).';</script>';
    $script.='<script>Barrio.eventos();</script>';
            
   }
if($sPage=="ExisteObjetoBarrios"){
    $obj=new Barrios();
    echo json_encode($obj->ValidarExiste($_REQUEST['data'],$_REQUEST['rel']));
    exit(0);

   }

   
   if($sPage=="ObtenerObjetoBarrios"){
      $obj=new Barrios();
      echo json_encode($obj->GetObject($_REQUEST['rel']));
      exit(0);
   }
    if($sPage=="GuardarObjetoBarrios"){
      $obj=new Barrios();
      $id=$_POST['id'];
      unset($_POST['id']);
      $rs=$obj->GuardarObject($id,$_POST);
      $_SESSION['mensaje']=(is_object($rs))?array("ok"=>$obj->modelo_." (".$rs->{$obj->descripcion_modelo}.") "." Guardado  Satisfactoriamente"):array("error"=>"Ocurrio un error Intente de Nuevo");
      header("location:?page=Barrios&rel=".$_POST['comunidad_id']);
      exit(0);
   }
   if($sPage=="EliminarObjetoBarrios"){
      $obj=new Barrios();
      $rs=$obj->EliminarObject($_REQUEST['rel']);
      $_SESSION['mensaje']=(is_object($rs))?array("ok"=>$obj->modelo_." (".$rs->{$obj->descripcion_modelo}.") "."Eliminado Satisfactoriamente"):array("error"=>"Ocurrio un error Intente de Nuevo");
      header("location:?page=Barrios&rel=".$_REQUEST['rel2']);
      exit(0);
   }       
    

?>