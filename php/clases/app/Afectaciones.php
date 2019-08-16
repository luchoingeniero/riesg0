<?php 
 class Afectaciones extends Controller{
 var $modelo='Afectaciones';
 var $modelo_='Afectacion';
 var $tabla='afectaciones';
 var $campos=[["tipoafectacion_id","Tipo Afectacion"],["cantidad","Cantidad"],["valoraproximado","Valor Aproximado"],["descripcion","Descripcion"]];
 var $campos_form=[["tipoafectacion_id","Tipo Afectacion"],["cantidad","Cantidad"],["valoraproximado","Valor Aproximado"],["descripcion","Descripcion"]];
 var $descripcion_modelo='descripcion';
 var $label='Afectaciones';
  var $ESTADO_CENSO='';


 function Acciones($row){
		
		return '<td>'.$this->AccionAyudas($row).$this->AccionModificar($row).$this->AccionEliminar($row).'</td>';
	}

function AccionAyudas($row){
	return '<a href="?page=Ayudas&amp;rel='.$row->id.'&censo_hogar_id='.$_REQUEST['rel'].'"><i class="el-icon-shopping-cart  tool_tip" data-original-title="Ayudas de la Afectacion '.$row->descripcion.'"></i></a>&nbsp;&nbsp;';
}	

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
