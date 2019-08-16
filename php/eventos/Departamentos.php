<?php 
if ($sPage=="Departamentos"){
		$obj=new Departamentos();
		$obj->BloquearPagina();
        $tabla=$obj->MostrarObjeto($obj->Listar());
        $includePage='php/pages/page-Departamentos.php';
      
        
   }

 if ($sPage=="Municipios"){
    $dpto=new Departamentos();
    $departamento=$dpto->GetObject($_REQUEST['rel']);
    $obj=new Municipios($_REQUEST['rel']);
    $obj->BloquearPagina();
    $tabla=$obj->MostrarObjeto($obj->Listar());
    $includePage='php/pages/page-Municipios.php';
        
   }  

?>