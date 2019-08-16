<?php 
 class Escenarios extends Controller{
 var $modelo='Escenarios';
 var $modelo_='Escenario';
 var $tabla="Escenarios";
 var $campos=array(array('descripcion','Descripcion'),array('observacion','Observacion'),array('tiporiesgo_id','Tipo Riesgo'));
 var $campos_form=array(array('descripcion','Descripcion'),array('observacion','Observacion'),array('tiporiesgo_id','Tipo Riesgo'),array('comunidades','comunidades'));
 var $descripcion_modelo='descripcion';
 var $label="Escenarios";

function Acciones($row){
		
		return '<td>'.$this->AccionCensos($row).$this->AccionModificar($row).$this->AccionEliminar($row).'</td>';
	}

function AccionCensos($row){
	return '<a href="?page=EscenariosCensos&rel='.$row->id.'"><i style="cursor:pointer" class="el-icon-search tool_tip " data-original-title="Censos del Escenario '.$row->descripcion.'"></i></a>&nbsp;&nbsp;';
}	

}
?>
