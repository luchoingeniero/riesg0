<?php 
 class Municipios extends Controller{
 var $modelo='Municipios';
 var $modelo_='Municipio';
 var $tabla="municipios";
 var $campos=array(array('codigo','Codigo'),array('descripcion','Descripcion'));
 var $campos_form=array(array('codigo','Codigo'),array('descripcion','Descripcion'));
 var $descripcion_modelo='descripcion';
 var $label="Municipios";

function Acciones($row){
	return '<td><a href="?page=Comunidades&rel='.$row->id.'"><i style="cursor:pointer" class="el-icon-search tool_tip " data-original-title="Comunidades de '.$row->descripcion.'"></i></a></td>';
}



}
?>
