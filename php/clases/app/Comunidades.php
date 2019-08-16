<?php 
 class Comunidades extends Controller{
 var $modelo='Comunidades';
 var $modelo_='Comunidad';
 var $tabla="comunidades";
 var $campos=array(array('descripcion','Descripcion'));
 var $campos_form=array(array('descripcion','Descripcion'));
 var $descripcion_modelo='descripcion';
 var $label="Comunidades";

function Acciones($row){
		
		return '<td>'.$this->AccionEscenarios($row).$this->AccionLideres($row).$this->AccionBarrios($row).$this->AccionModificar($row).$this->AccionEliminar($row).'</td>';
}

function AccionEliminar($row){
		$str='';
		if($this->TienePermiso('ELIMINAR')){
			$str='<i style="cursor:pointer" rel2="'.$row->municipio_id.'" rel="'.$row->id.'" class="el-icon-trash tool_tip btn-eliminar-'.$this->modelo.'" data-original-title="Eliminar '.$row->{$this->descripcion_modelo}.'"></i>';
		}
		return $str;
	}


function AccionEscenarios($row){
	return '<a href="?page=ComunidadEscenarios&rel='.$row->id.'"><i style="cursor:pointer" class="el-icon-screenshot tool_tip " data-original-title="Escenarios de Riesgo de '.$row->descripcion.'"></i></a>&nbsp;&nbsp;';
}



function AccionBarrios($row){
	return '<a href="?page=Barrios&rel='.$row->id.'"><i style="cursor:pointer" class="el-icon-search tool_tip " data-original-title="Barrios de '.$row->descripcion.'"></i></a>&nbsp;&nbsp;';
}

function AccionLideres($row){
	return '<a href="?page=Lideres&rel='.$row->id.'"><i style="cursor:pointer" class="el-icon-user tool_tip " data-original-title="Lideres de '.$row->descripcion.'"></i></a>&nbsp;&nbsp;';
}


}
?>
