<?php 

 if ($sPage=="Capacitaciones"){
 	  $com=new Pacs();
    $pac=$com->GetObject($_REQUEST['rel']);
    $obj=new Capacitaciones($_REQUEST['rel']);
    $obj->BloquearPagina();
    $tabla=$obj->MostrarObjeto($obj->Listar());
    $includePage='php/pages/page-Capacitaciones.php';
    $script='<script >var Capacitaciones = new Controller("'.$obj->modelo.'");</script>';
    //$script.='<script>Barrio.validar_existe=true;</script>';
    $script.='<script>Capacitaciones.campos_form='.json_encode($obj->campos_form).';</script>';
    $script.='<script>Capacitaciones.eventos();</script>';
    /*Variables*/

    $obj_=new Programas();
    $programas=$obj_->Listar();
    $obj_=new Tipocapacitaciones();
    $tipocapacitaciones=$obj_->Listar();
    $obj_=new Usuarios();
    $encargados=$obj_->Listar(2);
            
   }
if($sPage=="ExisteObjetoCapacitaciones"){
    $obj=new Capacitaciones();
    echo json_encode($obj->ValidarExiste($_REQUEST['data'],$_REQUEST['rel']));
    exit(0);

   }

   
   if($sPage=="ObtenerObjetoCapacitaciones"){
      $obj=new Capacitaciones();
      echo json_encode($obj->GetObject($_REQUEST['rel']));
      exit(0);
   }
    if($sPage=="GuardarObjetoCapacitaciones"){
      $obj=new Capacitaciones();
      $id=$_POST['id'];
      unset($_POST['id']);
      $rs=$obj->GuardarObject($id,$_POST);
      $_SESSION['mensaje']=(is_object($rs))?array("ok"=>$obj->modelo_." (".$rs->{$obj->descripcion_modelo}.") "." Guardado  Satisfactoriamente"):array("error"=>"Ocurrio un error Intente de Nuevo");
      header("location:?page=Capacitaciones&rel=".$_POST['pac_id']);
      exit(0);
   }
   if($sPage=="EliminarObjetoCapacitaciones"){
      $obj=new Capacitaciones();
      $rs=$obj->EliminarObject($_REQUEST['rel']);
      $_SESSION['mensaje']=(is_object($rs))?array("ok"=>$obj->modelo_." (".$rs->{$obj->descripcion_modelo}.") "."Eliminado Satisfactoriamente"):array("error"=>"Ocurrio un error Intente de Nuevo");
      header("location:?page=Capacitaciones&rel=".$_REQUEST['rel2']);
      exit(0);
   }       
    

?>