<?php 
/**
* 
*/

class Disponibilidad extends Controller
{
	
	var $modelo='Disponibilidad';
	var $modelo_='Disponibilidad';
	var $tabla="disponibilidad";
	var $campos=array(array('dia','Dia'),array('hora_inicial','Hora Inicial'),array('hora_final','Hora Final'));
 	var $campos_form=array(array('dia','Dia'),array('hora_inicial','Hora Inicial'),array('hora_final','Hora Final'));
 	var $descripcion_modelo='dia';
 	var $label='Disponibilidad';

 	function ValidarExiste($datos,$usuario_id,$id){
		$url=$this->modelo.'Descripcion/'.urlencode($datos).'/'.$usuario_id.'/'.$id;
		return $this->get($url);
	}

	function DisponiblidadUsuarios(){
		
		$url=$this->modelo.'Usuarios';
		return $this->get($url);
	}

	function AccionEliminar($row){
		$str='';
		if($this->TienePermiso('ELIMINAR')){
			$str='<i style="cursor:pointer" rel="'.$row->id.'" rel2="'.$_REQUEST['rel'].'"  class="el-icon-trash tool_tip btn-eliminar-'.$this->modelo.'" data-original-title="Eliminar '.$row->{$this->descripcion_modelo}.'"></i>';
		}
		return $str;
	}

}
?>