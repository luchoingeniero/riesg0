<?php 

 if ($sPage=="NivelesRiesgoHogar"){
    $censo_id=$_REQUEST['rel'];
    $censo_id=explode('_',$censo_id);
    $hogar_id=$censo_id[1];
    $censo_id=$censo_id[0];


    $cen=new Censos();
    $censo=$cen->GetObject($censo_id);

    $hog=new Hogares();
    $hogar=$hog->GetObject($hogar_id);

    $obj=new CenHogEscenarios($_REQUEST['rel']);


    $obj->ESTADO_CENSO=$censo->estado;
    $obj->BloquearPagina();
    $tabla=$obj->MostrarObjeto($obj->Listar());
    $includePage='php/pages/page-NivelesRiesgoHogar.php';
    $script='<script >var Cenhogescenarios = new Controller("'.$obj->modelo.'");</script>';
    //$script.='<script>Barrio.validar_existe=true;</script>';
    $script.='<script>Cenhogescenarios.campos_form='.json_encode($obj->campos_form).';</script>';
    $script.='<script src="assets/js/controllers/app/cenhogescenarios.js"></script>';
    $script.='<script>Cenhogescenarios.eventos();</script>';
   

    
            
   }
  
     
   if($sPage=="GuardarObjetoCenhogescenarios"){
      $obj=new Cenhogescenarios();
      $id=$_POST['id'];
      unset($_POST['id']);
      $rs=$obj->GuardarObject($id,$_POST);
      //print_r($_POST);
      echo json_encode((is_object($rs))?array("ok"=>$obj->modelo_." (".$rs->{$obj->descripcion_modelo}.") "." Guardado  Satisfactoriamente"):array("error"=>"Ocurrio un error Intente de Nuevo"));
      //header("location:?page=Afectaciones&rel=".$rel);
      exit(0);
   }
   

?>