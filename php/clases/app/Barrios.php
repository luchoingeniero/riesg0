<?php 
 class Barrios extends Controller{
 var $modelo='Barrios';
 var $modelo_='Barrio';
 var $tabla="barrios";
 var $campos=array(array('descripcion','Descripcion'));
 var $campos_form=array(array('descripcion','Descripcion'));
 var $descripcion_modelo='descripcion';
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
