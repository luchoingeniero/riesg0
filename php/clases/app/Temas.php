<?php 
 class Temas extends Controller{
 var $modelo='Temas';
 var $modelo_='Tema'; 
 var $campos=[["nombre","Nombre"],["descripcion","Descripcion"]];
 var $campos_form=[["nombre","Nombre"],["descripcion","Descripcion"]];
 var $descripcion_modelo='descripcion';
 var $label="Temas";
 var $tabla="temas";

 function AccionEliminar($row){
		$str='';
		if($this->TienePermiso('ELIMINAR')){
			$str='<i style="cursor:pointer" rel="'.$row->id.'" rel2="'.$row->programa_id.'" class="el-icon-trash tool_tip btn-eliminar-'.$this->modelo.'" data-original-title="Eliminar '.$row->{$this->descripcion_modelo}.'"></i>';
		}
		return $str;
	}

}
?>
