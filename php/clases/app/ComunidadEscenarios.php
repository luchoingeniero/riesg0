<?php 
 class ComunidadEscenarios extends Controller{
 var $modelo='Comunidadescenarios';
 var $modelo_='Comunidadescenarios';
 var $tabla="comunidadescenarios";
 var $campos=array(array('escenario_id','Escenario de Riesgo'),array('nivel','Nivel'),array('observacion','Observacion'));
 var $campos_form=array(array('escenario_id','Escenario de Riesgo'),array('nivel','Nivel'),array('observacion','Observacion'));
 var $descripcion_modelo='observacion';
 var $label="Comunidad Escenarios de Riesgo";

 function AccionEliminar($row){
		$str='';
		if($this->TienePermiso('ELIMINAR')){
			$str='<i style="cursor:pointer" rel="'.$row->id.'" rel2="'.$_REQUEST['rel'].'" class="el-icon-trash tool_tip btn-eliminar-'.$this->modelo.'" data-original-title="Eliminar '.$row->{$this->descripcion_modelo}.'"></i>';
		}
		return $str;
	}

}
?>
