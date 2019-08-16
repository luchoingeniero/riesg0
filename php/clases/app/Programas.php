<?php 
 class Programas extends Controller{
 var $modelo='Programas';
 var $modelo_='Programa';
 var $tabla="programas";
 var $campos=array(array('descripcion','Descripcion'));
 var $campos_form=array(array('descripcion','Descripcion'),array('pistas','Pistas'));
 var $descripcion_modelo='descripcion';
 var $label="Programas";

function Acciones($row){
		
		return '<td>'.$this->AccionTemas($row).$this->AccionModificar($row).$this->AccionEliminar($row).'</td>';
	}

function AccionTemas($row){
return '<a href="?page=Temas&rel='.$row->id.'"><i class="el-icon-search tool_tip" data-original-title=" Temas del Programa '.$row->descripcion.'"></i></a>&nbsp;&nbsp;';
}


}
?>
