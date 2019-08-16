<?php 
 class CenHogEscenarios extends Controller{
 var $modelo='Cenhogescenarios';
 var $modelo_='Cenhogescenario';
 var $tabla="cenhogescenarios";
 var $campos=array(array('escenario_id','Escenario'),array('nivel','Nivel de Riesgo'),array('observacion','Observacion'));
 var $campos_form=array(array('nivel','Nivel'));
 var $descripcion_modelo='observacion';
 var $label="Niveles de Riesgo del Hogar";

function CargarColumnasTabla(){
		$row_str='';
		foreach ($this->campos as $key => $campo) {
			$row_str.='<th>'.$campo[1].'</th>';
		}
		return '<tr>'.$row_str.'</tr>';
	}

function MostrarObjeto($list_Objetos=array()){
		$salida='';
		$row_str='';
		$array_niveles=array('1','2','3');
		foreach ($list_Objetos as $key => $row) {
			$row_str='';
			$row_str.='<td>'.$this->FormatearColumn('escenario_id',$row->escenario_id).'</td>';
			$opciones='<select rel="'.$row->id.'" id="nivel_'.$row->id.'" class="NivelesEscenarios form-control"><option value="">Seleccione:</option>';
			foreach ($array_niveles as $key => $nivel) {
					$opciones.='<option '.(($nivel==$row->nivel)?'selected="selected"':'').' value="'.$nivel.'">'.$nivel.'</option>';
				}
				$opciones.='</select>';

			$row_str.='<td>'.$opciones.'</td>';
			$row_str.='<td><textarea cols="72" rows="4" id="Observacion_'.$row->id.'" class="ObservacionEscenarios form-control" rel="'.$row->id.'">'.$row->observacion.'</textarea></td>';


			
			$salida.='<tr>'.$row_str.'</tr>';	
		}

		return $this->CargarTabla($salida);
	}


}



?>
