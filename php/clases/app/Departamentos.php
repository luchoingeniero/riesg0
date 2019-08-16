<?php 
 class Departamentos extends Controller{
 var $modelo='Departamentos';
 var $modelo_='Departamento';
 var $tabla="departamentos";
 var $campos=array(array('codigo','Codigo'),array('descripcion','Descripcion'));
 var $campos_form=array(array('codigo','Codigo'),array('descripcion','Descripcion'));
 var $descripcion_modelo='descripcion';
 var $label="Departamentos";

function Acciones($row){
	return '<td><a href="?page=Municipios&rel='.$row->id.'"><i style="cursor:pointer" class="el-icon-search tool_tip " data-original-title="Municipios de '.$row->descripcion.'"></i></a></td>';
}


}
?>
