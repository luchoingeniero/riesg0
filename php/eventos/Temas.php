<?php 

 if ($sPage=="Temas"){
  	$prog=new Programas();
    $programa=$prog->GetObject($_REQUEST['rel']);
    $obj=new Temas($_REQUEST['rel']);
    $obj->BloquearPagina();
    $tabla=$obj->MostrarObjeto($obj->Listar());
    $includePage='php/pages/page-Temas.php';
    $script='<script >var Tema = new Controller("'.$obj->modelo.'");</script>';
    //$script.='<script>Barrio.validar_existe=true;</script>';
    $script.='<script>Tema.campos_form='.json_encode($obj->campos_form).';</script>';
    $script.='<script>Tema.eventos();</script>';
            
   }
if($sPage=="ExisteObjetoTemas"){
    $obj=new Temas();
    echo json_encode($obj->ValidarExiste($_REQUEST['data'],$_REQUEST['rel']));
    exit(0);

   }

   
   if($sPage=="ObtenerObjetoTemas"){
      $obj=new Temas();
      echo json_encode($obj->GetObject($_REQUEST['rel']));
      exit(0);
   }
    if($sPage=="GuardarObjetoTemas"){
      $obj=new Temas();
      $id=$_POST['id'];
      unset($_POST['id']);
      $rs=$obj->GuardarObject($id,$_POST);
      $_SESSION['mensaje']=(is_object($rs))?array("ok"=>$obj->modelo_." (".$rs->{$obj->descripcion_modelo}.") "." Guardado  Satisfactoriamente"):array("error"=>"Ocurrio un error Intente de Nuevo");
      header("location:?page=Temas&rel=".$_POST['programa_id']);
      exit(0);
   }
   if($sPage=="EliminarObjetoTemas"){
      $obj=new Temas();
      $rs=$obj->EliminarObject($_REQUEST['rel']);
      $_SESSION['mensaje']=(is_object($rs))?array("ok"=>$obj->modelo_." (".$rs->{$obj->descripcion_modelo}.") "."Eliminado Satisfactoriamente"):array("error"=>"Ocurrio un error Intente de Nuevo");
      header("location:?page=Temas&rel=".$_REQUEST['rel2']);
      exit(0);
   }       
    

?>