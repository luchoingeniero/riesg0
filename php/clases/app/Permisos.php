<?php 
/**
* 
*/

class Permisos extends Controller
{
	
	var $modelo='Permisos';
	var $modelo_='Permiso';
	var $tabla="permisos";
	var $campos=array(array('accion_id','Permiso'));
 	var $campos_form=array(array('accion_id','Permiso'));
 	var $descripcion_modelo='accion_id';

 	function MisPermisosTabla($user_id,$tabla){
 		return $this->get($this->modelo."Tabla/".$user_id."/".$tabla);
 	}

 	function Mispermisos($user_id){
 		return $this->get($this->modelo."User/".$user_id);
 	}


 	function Modificar($accion,$operacion){
 		return ($operacion=="true")?$this->Agregar($accion):$this->Quitar($accion);
 	}

 	function Agregar($accion){
 		$url=$this->modelo."/".$this->rel;
 		return $this->post($url,array('accion'=>$accion));
 	}
 	function Quitar($accion){
 		$url=$this->modelo."/".$this->rel."/".$accion;
 		return $this->delete($url,$_POST);

 	}

 	function MostrarObjeto($permisos=array()){

 		$opciones=new Opciones();
 		$opciones_list=$opciones->Listar();
 		$permisos=$this->FormatearPermisos($permisos);
		$salida='';
		$row_str='';
		foreach ($opciones_list as $key => $row) {
			$acciones=$row->acciones;
		    $row_str='<td>'.$row->descripcion.'</td>';
		    $row_str.=$this->CrearSwhicht($acciones,$permisos);
			//$row_str.=$this->Acciones($row);
			$salida.='<tr>'.$row_str.'</tr>';	
		}

		return $this->CargarTabla($salida);
	}

	function FormatearPermisos($permisos){
		$salida=array();
		foreach ($permisos as $key => $p) {
			$salida[]=$p->accion_id;
		}
		return $salida;
	}

	function CrearSwhicht($arreglo,$permisos){
		$opciones=array('LEER','CREAR','MODIFICAR','ELIMINAR');
		$row_str_='';
		foreach ($opciones as $key => $opt) {
			$obj=$this->Accion($arreglo,$opt);

			$row_str_.='<td><input rel="'.$this->rel.'" id="'.$obj->id.'" type="checkbox" '.(in_array($obj->id,$permisos)?"checked='true'":"").' class="js-switch permisos permisos-'.$obj->descripcion.'" /></td>';
		}
		return $row_str_;

	}

	function Accion($arreglo,$accion_){
		$salida=array();
		foreach ($arreglo as $key => $accion) {
		    	if($accion->descripcion==$accion_){
		    			$salida=$accion;
		    			break;
		    	}
		    }
		    return $salida;
	}

	function CargarTabla($str){
		
		return 	'<table class="table table-striped table-bordered" id="tabla-personalizada">'.
            	'<thead><th>Tabla</th><th>LEER</th><th>CREAR</th><th>MODIFICAR</th><th>ELIMINAR</th></thead>'.
            	'<tbody id="table-content">'.$str.'</tbody>'.
            	'<tfoot><th>Tabla</th><th>LEER</th><th>CREAR</th><th>MODIFICAR</th><th>ELIMINAR</th></tfoot>'.
             	'</table>';
	}

/*

	function CargarTabla($str){
		
		return 	'<table class="table table-striped table-bordered" id="tabla-personalizada">'.
            	'<thead><th>Tabla</th><th>LEER<p><input type="checkbox" rel="LEER" class="js-switch sel-all"/></p></th><th>CREAR<p><input type="checkbox" rel="CREAR" class="js-switch sel-all"/></p></th><th>MODIFICAR<p><input type="checkbox" rel="MODIFICAR" class="js-switch sel-all"/></p></th><th>ELIMINAR<p><input type="checkbox" rel="ELIMINAR" class="js-switch sel-all"/></p></th></thead>'.
            	'<tbody id="table-content">'.$str.'</tbody>'.
            	'<tfoot><th>Tabla</th><th>LEER</th><th>CREAR</th><th>MODIFICAR</th><th>ELIMINAR</th></tfoot>'.
             	'</table>';
	}
	*/
	


}
?>