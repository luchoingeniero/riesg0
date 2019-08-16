<?php 
 class Integrantes extends Controller{
 var $modelo='Integrantes';
 var $modelo_='Integrante';
 var $tabla='integrantes_hogares';
 var $campos=[["parentesco_id","Parentesco"],["tipodocumento_id","Tipo Doc"],["identificacion","Documento"],["primer_nombre","Primer Nombre"],["segundo_nombre","Segundo Nombre"],["primer_apellido","Primer Apellido"],["segundo_apellido","Segundo Apellido"],["fecha_nacimiento","Fecha Nac"],['genero','Genero']];
 var $campos_form=[["parentesco_id","Parentesco"],["tipodocumento_id","Tipo Doc"],["identificacion","Documento"],["primer_nombre","Primer Nombre"],["segundo_nombre","Segundo Nombre"],["primer_apellido","Primer Apellido"],["segundo_apellido","Segundo Apellido"],["fecha_nacimiento","Fecha Nac"],['genero','Genero']];
 var $descripcion_modelo='identificacion';
 var $label='Integrantes';
 var $ESTADO_CENSO='';

 function AccionEliminar($row){
		$str='';
		if($this->TienePermiso('ELIMINAR')&&$this->ESTADO_CENSO=="ACTIVO"){
			$str='<i style="cursor:pointer" rel="'.$row->id.'" rel2="'.$_REQUEST['rel'].'" class="el-icon-trash tool_tip btn-eliminar-'.$this->modelo.'" data-original-title="Eliminar '.$row->{$this->descripcion_modelo}.'"></i>';
		}
		return $str;
	}

function AccionModificar($row){
		$str='';
		if($this->TienePermiso('MODIFICAR')&&$this->ESTADO_CENSO=="ACTIVO"){
			$str='<a href="#"><i style="cursor:pointer" rel="'.$row->id.'" class="el-icon-pencil tool_tip btn-modificar-'.$this->modelo.'" data-original-title="Modificar '.$row->{$this->descripcion_modelo}.'"></i></a>&nbsp;&nbsp;';
		}
		return $str;
	}	


}
?>
