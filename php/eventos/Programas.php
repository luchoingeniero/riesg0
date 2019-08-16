<?php 

 if ($sPage=="Programas"){
 	  $obj=new Programas();
    $obj->BloquearPagina();
    $tabla=$obj->MostrarObjeto($obj->Listar());
    $includePage='php/pages/page-Programas.php';
    $script='<script >var Programas = new Controller("'.$obj->modelo.'");</script>';
    $script.='<script>Programas.validar_existe=true;</script>';
    $script.='<script>Programas.campos_form='.json_encode($obj->campos_form).';</script>';
    $script.='<script>Programas.eventos();</script>';
            
   /*Lista de Pistas*/
   $obj_pistas=new Pistas();
   $pistas_list=$obj_pistas->Listar();
   
   }

if($sPage=="ExisteObjetoProgramas"){
    $obj=new Programas();

    echo json_encode($obj->ValidarExiste($_REQUEST['data'],$_REQUEST['rel']));
    exit(0);

   }

   
   if($sPage=="ObtenerObjetoProgramas"){
      $obj=new Programas();
      $programa=$obj->GetObject($_REQUEST['rel']);
      $pistas=$programa->pistas;
      $array_pistas=array();
    foreach ($pistas as $key => $pista) {
      $array_pistas[]=$pista->id;
    }
    $programa->pistas=$array_pistas;
    echo json_encode($programa);

      
      exit(0);
   }
    if($sPage=="GuardarObjetoProgramas"){
      $obj=new Programas();
      $id=$_POST['id'];
      $pistas=$_POST['pistas'];
      unset($_POST['id']);
      unset($_POST['pistas']);
      $extra='pistas='.implode(',', $pistas);
      $rs=$obj->GuardarObject($id,$_POST,$extra);
      $_SESSION['mensaje']=(is_object($rs))?array("ok"=>$obj->modelo_." (".$rs->{$obj->descripcion_modelo}.") "." Guardado  Satisfactoriamente"):array("error"=>"Ocurrio un error Intente de Nuevo");
      header("location:?page=Programas");
      exit(0);
   }
   if($sPage=="EliminarObjetoProgramas"){
      $obj=new Programas();
      $rs=$obj->EliminarObject($_REQUEST['rel']);
      $_SESSION['mensaje']=(is_object($rs))?array("ok"=>$obj->modelo_." (".$rs->{$obj->descripcion_modelo}.") "."Eliminado Satisfactoriamente"):array("error"=>"Ocurrio un error Intente de Nuevo");
      header("location:?page=Programas");
      exit(0);
   }       
    

?>