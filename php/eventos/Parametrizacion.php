<?php 
$objetos=array('Tipo-Documentos','Tipo-Afectaciones','Tipo-Riesgos','Tipo-Capacitaciones','Tipo-Ayudas','Parentescos','Categorias','Niveles','Pistas','Respuestasalertas');

foreach ($objetos as $key => $objeto) {
	$destino=str_replace("-",'', $objeto);
	$destino_lower=strtolower($destino);
	$clase=ucfirst($destino_lower);

	if($sPage==$destino){
		$obj=new $clase();
		$obj->BloquearPagina();
        $tabla=$obj->MostrarObjeto($obj->Listar());
        $includePage='php/pages/page-Parametrizacion.php';
        $script='<script >var '.$clase.' = new Controller("'.$destino.'");</script>';
        $script.='<script>'.$clase.'.validar_existe=true;</script>';
        $script.='<script>'.$clase.'.campos_form='.json_encode($obj->campos_form).';</script>';
        $script.='<script>'.$clase.'.eventos();</script>';
        break;
	}
	if($sPage=="ExisteObjeto".$destino){
    $obj=new $clase();
    echo json_encode($obj->ValidarExiste($_REQUEST['data'],$_REQUEST['rel']));
    exit(0);

   }

   
   if($sPage=="ObtenerObjeto".$destino){
   		$obj=new $clase();
   		echo json_encode($obj->GetObject($_REQUEST['rel']));
   		exit(0);
   }
    if($sPage=="GuardarObjeto".$destino){
   		$obj=new $clase();
   		$id=$_POST['id'];
   		unset($_POST['id']);
   		$rs=$obj->GuardarObject($id,$_POST);
   		$_SESSION['mensaje']=(is_object($rs))?array("ok"=>$obj->modelo_." (".$rs->{$obj->descripcion_modelo}.") "." Guardado  Satisfactoriamente"):array("error"=>"Ocurrio un error Intente de Nuevo");
   		header("location:?page=".$destino);
   		exit(0);
   }
   if($sPage=="EliminarObjeto".$destino){
   		$obj=new $clase();
   		$rs=$obj->EliminarObject($_REQUEST['rel']);
   		$_SESSION['mensaje']=(is_object($rs))?array("ok"=>$obj->modelo_." (".$rs->{$obj->descripcion_modelo}.") "."Eliminado Satisfactoriamente"):array("error"=>"Ocurrio un error Intente de Nuevo");
   		header("location:?page=".$destino);
   		exit(0);
   }




	
}



?>