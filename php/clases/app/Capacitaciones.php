<?php 
 class Capacitaciones extends Controller{
 var $modelo='Capacitaciones';
 var $modelo_='Capacitacion';
 var $campos=[["programa_id","Programa"],["tipocapacitacion_id","Tipo de Capacitacion"],['user_id','Encargado'],["descripcion","Descripcion"],["fecha","Fecha"],];
 var $campos_form=[["programa_id","Programa"],["tipocapacitacion_id","Tipo de Capacitacion"],['user_id','Encargado'],["descripcion","Descripcion"],["fecha","Fecha"]];
 var $descripcion_modelo='descripcion';
 var $tabla="capacitaciones";
 var $label="Capacitaciones";

 function AccionEliminar($row){
		$str='';
		if($this->TienePermiso('ELIMINAR')){
			$str='<i style="cursor:pointer" rel="'.$row->id.'" rel2="'.$row->pac_id.'" class="el-icon-trash tool_tip btn-eliminar-'.$this->modelo.'" data-original-title="Eliminar '.$row->{$this->descripcion_modelo}.'"></i>';
		}
		return $str;
	}
}
?>
