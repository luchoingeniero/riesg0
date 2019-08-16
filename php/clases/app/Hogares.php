<?php 
 class Hogares extends Controller{
  var $modelo='Hogares';
 var $modelo_='Hogar';
 var $tabla="hogares";
 var $campos=[["codigo","Codigo"],["descripcion","Descripcion"],["barrio","Barrio"],["direccion","Direccion"]];
 var $campos_form=[["codigo","Codigo"],["descripcion","Descripcion"],["barrio","Barrio"],["direccion","Direccion"]];
 var $descripcion_modelo='descripcion';
 var $label="codigo";
 var $ESTADO_CENSO='';

 function AccionEliminar($row){
		$str='';
		if($this->TienePermiso('ELIMINAR')&&$this->ESTADO_CENSO=="ACTIVO"){
			$str='<i style="cursor:pointer" rel="'.$row->id.'" rel2="'.$this->rel.'" class="el-icon-trash tool_tip btn-eliminar-'.$this->modelo.'" data-original-title="Eliminar '.$row->{$this->descripcion_modelo}.'"></i>';
		}
		return $str;
	}

		

function AccionAfectaciones($row){
	$Censo=new Censos();
	$censo_=$Censo->GetObject($row->pivot->censo_id);
	if($censo_->tipocenso=="ATENCION"){return '<a href="?page=Afectaciones&rel='.$row->pivot->censo_id.'_'.$row->pivot->hogar_id.'"><i class="el-icon-fire  tool_tip" data-original-title="Afectaciones del Hogar '.$row->{$this->descripcion_modelo}.'"></i></a>&nbsp;&nbsp;';}
	else return '';
}
function AccionIntegrantes($row){
	
	 return '<a href="?page=Integrantes&rel='.$row->pivot->censo_id.'_'.$row->pivot->hogar_id.'"><i class="icon_group tool_tip" data-original-title="Integrantes del Hogar '.$row->{$this->descripcion_modelo}.'"></i></a>&nbsp;&nbsp;';
	
}

function AccionModificar($row){
		$str='';
		if($this->TienePermiso('MODIFICAR')&&$this->ESTADO_CENSO=="ACTIVO"){
			$str='<a href="#"><i style="cursor:pointer" rel="'.$row->pivot->censo_id."_".$row->pivot->hogar_id.'" class="el-icon-pencil tool_tip btn-modificar-'.$this->modelo.'" data-original-title="Modificar '.$row->{$this->descripcion_modelo}.'"></i></a>&nbsp;&nbsp;';
		}
		return $str;
	}

function AccionNivelesdeRiesgo($row){
	return '<a href="?page=NivelesRiesgoHogar&rel='.$row->pivot->censo_id.'_'.$row->pivot->hogar_id.'"><i class="el-icon-screenshot tool_tip" data-original-title="Niveles de Riesgo del Hogar '.$row->{$this->descripcion_modelo}.'"></i></a>&nbsp;&nbsp;';
}

function Acciones($row){
	
		return '<td>'.$this->AccionNivelesdeRiesgo($row).$this->AccionAfectaciones($row).$this->AccionIntegrantes($row).$this->AccionModificar($row).$this->AccionEliminar($row).'</td>';
	}

function NivelRiesgo($row){
 return $this->get("HogaresCenso/".$row->pivot->censo_id."/".$row->pivot->hogar_id)->nivelriesgo;
}

function MostrarObjeto($list_Objetos=array()){
		$salida='';
		$row_str='';
		foreach ($list_Objetos as $key => $row) {
			$row_str='';
				foreach ($this->campos as $key => $campo) {
					$column=$this->FormatearColumn($campo[0],$row->$campo[0]);
					$row_str.='<td>'.$column.'</td>';
				}
			
			$row_str.=$this->Acciones($row);
			$salida.='<tr>'.$row_str.'</tr>';	
		}

		return $this->CargarTabla($salida);
	}

function CargarColumnasTabla(){
		$row_str='';
		foreach ($this->campos as $key => $campo) {
			$row_str.='<th>'.$campo[1].'</th>';
		}
		return '<tr>'.$row_str.'<th>Acciones</th></tr>';
	}	




}
?>
