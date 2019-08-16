<?php 
 class Censos extends Controller{
 var $modelo='Censos';
 var $modelo_='Censo';
 var $tabla="censos";
 var $campos=[["descripcion","Descripcion"],["fecha","Fecha"],["municipio_id","Municipio"],['user_id','Responsable'],['tipocenso','Tipo Censo']];
 var $campos_form=[["descripcion","Descripcion"],["fecha","Fecha"],["municipio_id","Municipio"],["comunidad_id","Municipio"],['user_id','Responsable'],['nombrecontacto','Nombre Contacto'],['telcontacto','Tel Contacto'],['lider_id','Lider']];
 var $descripcion_modelo='descripcion';
 var $label="Censos";

function Acciones($row){
		
		return '<td>'.$this->AccionVerPdf($row).$this->AccionVer($row).$this->AccionHogares($row).$this->AccionModificar($row).$this->AccionEliminar($row).$this->AccionCerrarCenso($row).'</td>';
}

function AccionHogares($row){
	return '<a href="?page=Hogares&rel='.$row->id.'"><i class="el-icon-search tool_tip" data-original-title="Listado de Hogares de '.$row->descripcion.'"></i></a>&nbsp;&nbsp;';
}

function AccionVerPdf($row){
return '<a target="_blank" href="http://200.35.56.198:8081/jasperserver/flow.html?_flowId=viewReportFlow&reportUnit=%2Freports%2FReporteCenso&CENSO_ID='.$row->id.'&output=pdf&j_username=ReportesLectura&j_password=ReportesLectura"><i style="cursor:pointer"  class="el-icon-file tool_tip " data-original-title="Reoorte Censo '.$row->{$this->descripcion_modelo}.'"></i></a>&nbsp;&nbsp;';
	
}


function AccionVer($row){
return '<a href="#"><i style="cursor:pointer" rel="'.$row->id.'" class="el-icon-eye-open tool_tip btn-ver-'.$this->modelo.'" data-original-title="Ver '.$row->{$this->descripcion_modelo}.'"></i></a>&nbsp;&nbsp;';
	
}

function AccionModificar($row){
		$str='';
		if($this->TienePermiso('MODIFICAR')&&$row->estado=='ACTIVO'){
			$str='<a href="#"><i style="cursor:pointer" rel="'.$row->id.'" class="el-icon-pencil tool_tip btn-modificar-'.$this->modelo.'" data-original-title="Modificar '.$row->{$this->descripcion_modelo}.'"></i></a>&nbsp;&nbsp;';
		}
		return $str;
	}
function AccionCerrarCenso($row){
	$str='';
		if($this->TienePermiso('MODIFICAR')&&$row->estado=='ACTIVO'){
			$str='<a href="#"><i style="cursor:pointer;color:red" rel="'.$row->id.'" rel2="'.(@$_REQUEST['rel']).'" page="'.$_REQUEST['page'].'" class="icon_close_alt tool_tip btn-cerrar-'.$this->modelo.'" data-original-title="Cerrar Censo '.$row->{$this->descripcion_modelo}.'"></i></a>&nbsp;&nbsp;';
		}
		return $str;
}	
	

function ListarByEscenario($escenario_id){
return ($this->get($this->modelo."Escenarios/".$escenario_id));
}

function ListarByAtencion(){
return ($this->get($this->modelo."Atencion"));
}

function ListarByPrevencion(){
return ($this->get($this->modelo."Prevencion"));
}
	function AccionEliminar($row){
		$str='';
		if($this->TienePermiso('ELIMINAR')&&$row->estado=='ACTIVO'){
			$str='<i style="cursor:pointer" rel="'.$row->id.'" rel2="'.(@$_REQUEST['rel']).'" page="'.$_REQUEST['page'].'" class="el-icon-trash tool_tip btn-eliminar-'.$this->modelo.'" data-original-title="Eliminar '.$row->{$this->descripcion_modelo}.'"></i>&nbsp;&nbsp;';
		}
		return $str;
	}

function CerrarCenso($censo_id){
	return $this->post($this->modelo."Cerrar/".$censo_id);
}	

}
?>
