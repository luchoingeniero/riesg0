<?php 

 if ($sPage=="Censos"){
 	  $obj=new Censos();
    $obj->BloquearPagina();
    $tabla=$obj->MostrarObjeto($obj->ListarByAtencion());
    $includePage='php/pages/page-Censos.php';
    $script='<script >var Censos = new Controller("'.$obj->modelo.'");</script>';
    $script.='<script>Censos.campos_form='.json_encode($obj->campos_form).';</script>';
    $script.='<script src="assets/js/controllers/app/censos.js"></script>';

            
   /*Lista de Pistas*/
   $obj_=new Usuarios();
   $responsables=$obj_->Listar();
   $obj_=new Municipios();
   $municipios=$obj_->Listar();
   $obj_=new Tipodocumentos();
   $tipodocs_list=$obj_->Listar();

   
   }

   if ($sPage=="CensosPrevencion"){
    $obj=new Censos();
    $obj->BloquearPagina();
    $tabla=$obj->MostrarObjeto($obj->ListarByPrevencion());
    $includePage='php/pages/page-Censos.php';
    $script='<script >var Censos = new Controller("'.$obj->modelo.'");</script>';
    $script.='<script>Censos.campos_form='.json_encode($obj->campos_form).';</script>';
    $script.='<script src="assets/js/controllers/app/censos.js"></script>';

            
   /*Lista de Pistas*/
   $obj_=new Usuarios();
   $responsables=$obj_->Listar();
   $obj_=new Municipios();
   $municipios=$obj_->Listar();
   $obj_=new Tipodocumentos();
   $tipodocs_list=$obj_->Listar();

   
   }

if($sPage=="ExisteObjetoCensos"){
    $obj=new Censos();

    echo json_encode($obj->ValidarExiste($_REQUEST['data'],$_REQUEST['rel']));
    exit(0);

   }

   
   if($sPage=="ObtenerObjetoCensos"){
      $obj=new Censos();
      $censo=$obj->GetObject($_REQUEST['rel']);
      echo json_encode($censo);

      
      exit(0);
   }
    if($sPage=="GuardarObjetoCensos"){
      $obj=new Censos();
      $back=$_POST['back'];
      unset($_POST['back']);
      
      $id=$_POST['id'];
      unset($_POST['id']);
      $rs=$obj->GuardarObject($id,$_POST);
      $_SESSION['mensaje']=(is_object($rs))?array("ok"=>$obj->modelo_." (".$rs->{$obj->descripcion_modelo}.") "." Guardado  Satisfactoriamente"):array("error"=>"Ocurrio un error Intente de Nuevo");
      header("location:".$back);
      exit(0);
   }
   if($sPage=="EliminarObjetoCensos"){
      $obj=new Censos();
      $rs=$obj->EliminarObject($_REQUEST['rel']);
      $_SESSION['mensaje']=(is_object($rs))?array("ok"=>$obj->modelo_." (".$rs->{$obj->descripcion_modelo}.") "."Eliminado Satisfactoriamente"):array("error"=>"Ocurrio un error Intente de Nuevo");
      
      header("location:?page=".$_REQUEST['pagina'].((!empty($_REQUEST['rel2']))?"&rel=".$_REQUEST['rel2']:''));
      exit(0);
   }   

   if($sPage=="CerrarCenso"){
      $obj=new Censos();
      $rs=$obj->CerrarCenso($_REQUEST['rel']);
      $_SESSION['mensaje']=(is_object($rs))?array("ok"=>$obj->modelo_." (".$rs->{$obj->descripcion_modelo}.") "."Cerrado Satisfactoriamente"):array("error"=>"Ocurrio un error Intente de Nuevo");
      
      header("location:?page=".$_REQUEST['pagina'].((!empty($_REQUEST['rel2']))?"&rel=".$_REQUEST['rel2']:''));
      exit(0);
   }       
    

?>