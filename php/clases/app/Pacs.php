<?php 
 class Pacs extends Controller{
 var $modelo='Pacs';
 var $modelo_='Pac';
 var $tabla='pacs';
 var $campos=[["descripcion","Descripcion"],["anio","Año"]];
 var $campos_form=[["descripcion","Descripcion"],["anio","Año"]];
 var $descripcion_modelo='descripcion';
 var $label="Planes Anual de Capacitacion";


function Acciones($row){
		
		return '<td>'.$this->AccionCapactitaciones($row).$this->AccionModificar($row).$this->AccionEliminar($row).'</td>';
	}

function AccionCapactitaciones($row){

	return '<a href="?page=Capacitaciones&rel='.$row->id.'"><i style="cursor:pointer" rel="'.$row->id.'" class="el-icon-search tool_tip " data-original-title="Capcitaciones  de '.$row->{$this->descripcion_modelo}.'"></i></a>&nbsp;&nbsp;';
}	

}
?>
