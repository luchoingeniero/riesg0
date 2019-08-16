<?php 
 class Ayudas extends Controller{
 var $modelo='Ayudas';
 var $modelo_='Ayuda';
 var $tabla='ayudas';
 var $campos=[["tipoayuda_id","Tipo Ayuda"],["cantidad","Cantidad"],["observacion","Observacion"],["entregado","Entregado"]];
 var $campos_form=[["tipoayuda_id","Tipo Ayuda"],["cantidad","Cantidad"],["observacion","Observacion"],["entregado","Entregado"]];
 var $descripcion_modelo='observacion';
 var $label='Ayudas';
 var $CENSO_ESTADO='';

 function AccionEliminar($row){
		$str='';
		if($this->TienePermiso('ELIMINAR')&&$this->CENSO_ESTADO=="ACTIVO"){
			$str='<i style="cursor:pointer" rel="'.$row->id.'" rel2="'.$_REQUEST['rel']."-".$_REQUEST['censo_hogar_id'].'" class="el-icon-trash tool_tip btn-eliminar-'.$this->modelo.'" data-original-title="Eliminar '.$row->{$this->descripcion_modelo}.'"></i>';
		}
		return $str;
	}

function AccionModificar($row){
		$str='';
		if($this->TienePermiso('MODIFICAR')&&$this->CENSO_ESTADO=="ACTIVO"){
			$str='<a href="#"><i style="cursor:pointer" rel="'.$row->id.'" class="el-icon-pencil tool_tip btn-modificar-'.$this->modelo.'" data-original-title="Modificar '.$row->{$this->descripcion_modelo}.'"></i></a>&nbsp;&nbsp;';
		}
		return $str;
	}		


}
?>
