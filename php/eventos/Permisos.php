<?php 
 if ($sPage=="Permisos"){
        $Permisos=new Permisos($_REQUEST['rel']);
        $Permisos->BloquearPagina();
        $tabla=$Permisos->MostrarObjeto($Permisos->Listar());
        $includePage='php/pages/page-Permisos.php';
         $script='<script src="assets/js/controllers/app/permisos.js"></script>';
        //$script='<script>Permisos.List(rel);</script>';
   }

    if ($sPage=="ModificarPermisos"){
        $Permisos=new Permisos($_REQUEST['rel']);
        $Permisos->Modificar($_REQUEST['accion'],$_REQUEST['operacion']);
        echo "Permisos Modificados";
        exit(0);
        //$script='<script>Permisos.List(rel);</script>';
   }

   ?>