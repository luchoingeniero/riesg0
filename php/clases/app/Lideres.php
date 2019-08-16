<?php 
 class Lideres extends Controller{


 var $modelo='Lideres';
 var $modelo_='Lider';
 var $tabla="lideres";
 var $campos=[["tipodocumento_id","Tipo Doc"],["identificacion","Identificacion"],["apellido1","P Apellido"],["apellido2","S apellido"],["nombre1","P Nombre"],["nombre2","S Nombre"],["fechanacimiento","FechaNac"],["email","Email"],["telefono","Telefono"],];
 var $campos_form=[["tipodocumento_id","Tipo Doc"],["identificacion","Identificacion"],["apellido1","P Apellido"],["apellido2","S apellido"],["nombre1","P Nombre"],["nombre2","S Nombre"],["fechanacimiento","FechaNac"],["email","Email"],["telefono","Telefono"]];
 var $descripcion_modelo='identificacion';
 var $label="Barrios";

 function AccionEliminar($row){
		$str='';
		if($this->TienePermiso('ELIMINAR')){
			$str='<i style="cursor:pointer" rel2="'.$row->comunidad_id.'" rel="'.$row->id.'" class="el-icon-trash tool_tip btn-eliminar-'.$this->modelo.'" data-original-title="Eliminar '.$row->{$this->descripcion_modelo}.'"></i>';
		}
		return $str;
	}





}
?>
