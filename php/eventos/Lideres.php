<?php 

 if ($sPage=="Lideres"){
  	$com=new Comunidades();
    $comunidad=$com->GetObject($_REQUEST['rel']);
    $obj_tipodocs=new Tipodocumentos();
    $tipodocs_list=$obj_tipodocs->Listar();


    $obj=new Lideres($_REQUEST['rel']);
    $obj->BloquearPagina();
    $tabla=$obj->MostrarObjeto($obj->Listar());
    $includePage='php/pages/page-Lideres.php';
    $script='<script >var Lider = new Controller("'.$obj->modelo.'");</script>';
    //$script.='<script>Barrio.validar_existe=true;</script>';
    $script.='<script>Lider.campos_form='.json_encode($obj->campos_form).';</script>';
    $script.='<script>Lider.eventos();</script>';
            
   }
 if($sPage=="LideresList"){
    $obj=new Lideres();
    echo json_encode($obj->Listar($_REQUEST['rel']));
    exit(0);
 }  
if($sPage=="ExisteObjetoLideres"){
    $obj=new Lideres();
    echo json_encode($obj->ValidarExiste($_REQUEST['data'],$_REQUEST['rel']));
    exit(0);

   }

   
   if($sPage=="ObtenerObjetoLideres"){
      $obj=new Lideres();
      echo json_encode($obj->GetObject($_REQUEST['rel']));
      exit(0);
   }
    if($sPage=="GuardarObjetoLideres"){
      $obj=new Lideres();
      $id=$_POST['id'];
      unset($_POST['id']);
      $rs=$obj->GuardarObject($id,$_POST);
      $_SESSION['mensaje']=(is_object($rs))?array("ok"=>$obj->modelo_." (".$rs->{$obj->descripcion_modelo}.") "." Guardado  Satisfactoriamente"):array("error"=>"Ocurrio un error Intente de Nuevo");
      header("location:?page=Lideres&rel=".$_POST['comunidad_id']);
      exit(0);
   }
   if($sPage=="EliminarObjetoLideres"){
      $obj=new Lideres();
      $rs=$obj->EliminarObject($_REQUEST['rel']);
      $_SESSION['mensaje']=(is_object($rs))?array("ok"=>$obj->modelo_." (".$rs->{$obj->descripcion_modelo}.") "."Eliminado Satisfactoriamente"):array("error"=>"Ocurrio un error Intente de Nuevo");
      header("location:?page=Lideres&rel=".$_REQUEST['rel2']);
      exit(0);
   }       
    

?>