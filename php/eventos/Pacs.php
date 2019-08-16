<?php 

 if ($sPage=="Pacs"){
 	  $obj=new Pacs();
    $obj->BloquearPagina();
    $tabla=$obj->MostrarObjeto($obj->Listar());
    $includePage='php/pages/page-Pacs.php';
    $script='<script >var Pacs = new Controller("'.$obj->modelo.'");</script>';
    //$script.='<script>Barrio.validar_existe=true;</script>';
    $script.='<script>Pacs.campos_form='.json_encode($obj->campos_form).';</script>';
    $script.='<script>Pacs.eventos();</script>';
            
   }

if($sPage=="ExisteObjetoPacs"){
    $obj=new Pacs();
    echo json_encode($obj->ValidarExiste($_REQUEST['data'],$_REQUEST['rel']));
    exit(0);

   }

   
   if($sPage=="ObtenerObjetoPacs"){
      $obj=new Pacs();
      echo json_encode($obj->GetObject($_REQUEST['rel']));
      exit(0);
   }
    if($sPage=="GuardarObjetoPacs"){
      $obj=new Pacs();
      $id=$_POST['id'];
      unset($_POST['id']);
      $rs=$obj->GuardarObject($id,$_POST);
      $_SESSION['mensaje']=(is_object($rs))?array("ok"=>$obj->modelo_." (".$rs->{$obj->descripcion_modelo}.") "." Guardado  Satisfactoriamente"):array("error"=>"Ocurrio un error Intente de Nuevo");
      header("location:?page=Pacs");
      exit(0);
   }
   if($sPage=="EliminarObjetoPacs"){
      $obj=new Pacs();
      $rs=$obj->EliminarObject($_REQUEST['rel']);
      $_SESSION['mensaje']=(is_object($rs))?array("ok"=>$obj->modelo_." (".$rs->{$obj->descripcion_modelo}.") "."Eliminado Satisfactoriamente"):array("error"=>"Ocurrio un error Intente de Nuevo");
      header("location:?page=Pacs");
      exit(0);
   }       
    

?>