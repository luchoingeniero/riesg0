<?php if ($sPage=="Usuarios"){
		$obj=new Usuarios();
		$obj->BloquearPagina();
    $obj_rol=new Roles();
    $roles_list=$obj_rol->Listar();
        $tabla=$obj->MostrarObjeto($obj->Listar());
        $includePage='php/pages/page-Usuarios.php';
        $script='<script src="assets/js/controllers/app/usuarios.js"></script>';
        $script.='<script>Usuario.campos_form='.json_encode($obj->campos_form).';</script>';
        $script.='<script>Usuario.validar_existe=true;</script>';
        $script.='<script>Usuario.campo_unico=\''.$obj->descripcion_modelo.'\';</script>';
        $script.='<script>Usuario.eventos();</script>';
        
   }
   if($sPage=="ExisteObjetoUsers"){
    $obj=new Usuarios();
    echo json_encode($obj->ValidarExiste($_REQUEST['data'],$_REQUEST['rel']));
    exit(0);

   }
   if($sPage=="ObtenerObjetoUsers"){
   		$obj=new Usuarios();
   		echo json_encode($obj->GetObject($_REQUEST['rel']));
   		exit(0);
   }
    if($sPage=="GuardarObjetoUsers"){
   		$obj=new Usuarios();
      $back="?page=Usuarios";
      if(isset($_POST['back'])){
        $back=$_POST['back'];
        unset($_POST['back']);
      }
   		$id=$_POST['id'];
   		unset($_POST['id']);
      $extra='password_old='.$_POST['password_old'];
      unset($_POST['password_old']);
      $rs=$obj->GuardarObject($id,$_POST,$extra);
  		$_SESSION['mensaje']=(is_object($rs))?array("ok"=>$obj->modelo_." (".$rs->{$obj->descripcion_modelo}.") "." Guardado  Satisfactoriamente"):array("error"=>"Ocurrio un error Intente de Nuevo");
      if(isset($_SESSION['mensaje']['ok'])&&$_SESSION['User']->id==$rs->id){
        $_SESSION['User']->password=$rs->password;
      }
   		header("location:".$back);
   		exit(0);
   }
   if($sPage=="EliminarObjetoUsers"){
   		$obj=new Usuarios();
   		$rs=$obj->EliminarObject($_REQUEST['rel']);
   		$_SESSION['mensaje']=(is_object($rs))?array("ok"=>$obj->modelo_." (".$rs->{$obj->descripcion_modelo}.") "."Eliminado Satisfactoriamente"):array("error"=>"Ocurrio un error Intente de Nuevo");
   		header("location:?page=Usuarios");
   		exit(0);
   }
?>