<?php 
class Controller{
	var $host='http://riesg0api.gyltechnologies.com/';
 	var $private_key='12345';
 	var $campos=array(array('campo1','label1'),array('campo2','label2'),);
 	var $campos_form=array(array('campo1','label1'),array('campo2','label2'),);
	var $rel;
	var $filtrar_siempre=false;
	var $modelo='MODELO_API';
	var $modelo_='MODELO_API';
	var $tabla='tabla';
	var $label='';
	VAR $descripcion_modelo='descripcion';
	var $permisos_user=null;
	
	
	var $mis_permisos_Todos=array();



	function __construct($rel=null){
		if($rel!=null){
		$this->rel=$rel;
		$this->filtrar_siempre=true;
		}
	}

	function BuscarCensosHogaresAtendidos(){
		return $this->get("CensosHogaresAtendidos");
	}
	function BuscarCensosHogaresAyudasEntregadas(){
		return $this->get("CensosHogaresAyudasEntregadas");
	}

	function BuscarCensosHogaresIntegrantes(){
		return $this->get("CensosHogaresIntegrantes");
	}

	function BuscarCensosIntegrantesEdades(){
		return $this->get("CensosIntegrantesEdades");
	}
	function BuscarCensosMunicipios(){
		return $this->get("CensosMunicipios");
	}

	function ValidarExiste($datos,$id){
		$url=$this->modelo.'Descripcion/'.urlencode($datos).'/'.$id;
		return $this->get($url);
	}

	function TienePermiso($permiso){
		return (in_array($permiso,$this->PermisosUser()));
	}

	function TienePermiso_($permiso,$user_id,$tabla){
		if(count($this->mis_permisos_Todos)==0){
			$permisos=new Permisos();
			$this->mis_permisos_Todos=$permisos->Mispermisos($_SESSION['User']->id);	
		}
		
		
		$array_permisos=(isset($this->mis_permisos_Todos->{$tabla}))?$this->mis_permisos_Todos->{$tabla}:array();
		return (in_array($permiso,$array_permisos));
	}

	function BloquearPagina(){
		if(!$this->TienePermiso('LEER')){
			$_SESSION['mensaje']['error']="Opss! Intestastes Acceder a un Lugar Donde No tienes Permiso!!";
			header("location:home.php");
			exit(0);
		}
	}

	function PermisosUser(){
		if($this->permisos_user==null){
		$permisos=new Permisos();
		$this->permisos_user=$permisos->MisPermisosTabla($_SESSION['User']->id,$this->tabla);
		}
		
		return $this->permisos_user;
	}

	function GetObject($id){
		return $this->get($this->modelo."/".$id);
	}

	function GuardarObject($id=-1,$datos=array(),$extra=''){
		
		return ($id==-1)?$this->NuevoObject($datos,$extra):$this->ModificarObject($id,$datos,$extra);
	}

	function NuevoObject($datos,$extra=''){
		return $this->post($this->modelo,$datos,$extra);
	}
	function ModificarObject($id,$datos,$extra=''){
		return $this->post($this->modelo."/".$id,$datos,$extra);
	}
	function EliminarObject($id){
		return $this->delete($this->modelo."/".$id);
	}
	function FormatearCampos($campos=array()){
		$salida='';
		//$datos=array("$this->modelo"=>$datos);
		foreach ($campos as $key => $value) {
			$salida.=$this->modelo_."[".$key."]=".$value."&";
		}
		
	return $salida;
	}
	
	function Listar($filtro=null){
		$filtro=($filtro)?$filtro:(($this->filtrar_siempre)?$this->rel:null);
		$salida= ($filtro==null)?($this->get($this->modelo)):($this->get($this->modelo."List/".$filtro));
		
		return $salida;
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

	
	function GetObjectList($obj_id,$clase){
		if(!isset($this->{$clase."_list"})){
			$this->{$clase."_list"}=array();
		}

		if(count($this->{$clase."_list"})==0){
			$obj_list=new $clase();
			$rs=$obj_list->Listar();	
			foreach ($rs as $key => $o) {
				$this->{$clase."_list"}[$o->id]=$o;
			}
		}
		return @$this->{$clase."_list"}[$obj_id];
	}



	function FormatearColumn($column,$valor){
	if (strpos($column, '_id') !== false) {
    	switch ($column) {
				case 'role_id':
				$valor=$this->GetObjectList($valor,'Roles')->descripcion;
				break;
				case 'tipodocumento_id':
				$valor=$this->GetObjectList($valor,'Tipodocumentos')->descripcion;
				break;
				case 'user_id':
				$valor=@$this->GetObjectList($valor,'Usuarios')->login;
				break;
				case 'lider_id':
				$valor=@$this->GetObjectList($valor,'Usuarios')->login;
				break;
				case 'tipocapacitacion_id':
				$valor=$this->GetObjectList($valor,'Tipocapacitaciones')->descripcion;
				break;
				case 'programa_id':
				$valor=$this->GetObjectList($valor,'Programas')->descripcion;
				break;
				case 'tipoafectacion_id':
				$valor=$this->GetObjectList($valor,'Tipoafectaciones')->descripcion;
				break;
				case 'tipoayuda_id':
				$valor=$this->GetObjectList($valor,'Tipoayudas')->descripcion;
				break;
				case 'tiporiesgo_id':
				$valor=$this->GetObjectList($valor,'Tiporiesgos')->descripcion;
				break;
				case 'municipio_id':
				@$valor=$this->GetObjectList($valor,'Municipios')->descripcion;
				break;
				case 'escenario_id':
				@$valor=$this->GetObjectList($valor,'Escenarios')->descripcion;
				break;
				case 'parentesco_id':
				@$valor=$this->GetObjectList($valor,'Parentescos')->descripcion;
				break;

				

			
				default:
				# code...
				break;
		}
	}
	return $valor;
	}

	function Acciones($row){
		
		return '<td>'.$this->AccionModificar($row).$this->AccionEliminar($row).'</td>';
	}

	function AccionModificar($row){
		$str='';
		if($this->TienePermiso('MODIFICAR')){
			$str='<a href="#"><i style="cursor:pointer" rel="'.$row->id.'" class="el-icon-pencil tool_tip btn-modificar-'.$this->modelo.'" data-original-title="Modificar '.$row->{$this->descripcion_modelo}.'"></i></a>&nbsp;&nbsp;';
		}
		return $str;
	}
	function AccionEliminar($row){
		$str='';
		if($this->TienePermiso('ELIMINAR')){
			$str='<i style="cursor:pointer" rel="'.$row->id.'"  class="el-icon-trash tool_tip btn-eliminar-'.$this->modelo.'" data-original-title="Eliminar '.$row->{$this->descripcion_modelo}.'"></i>';
		}
		return $str;
	}

	function CargarTabla($str){
		$str_row=$this->CargarColumnasTabla();
		return 	'<table class="table table-striped table-bordered" id="tabla-personalizada">'.
            	'<thead>'.$str_row.'</thead>'.
            	'<tbody id="table-content">'.$str.'</tbody>'.
            	'<tfoot>'.$str_row.'</tfoot>'.
             	'</table>';
	}
	
	function CargarColumnasTabla(){
		$row_str='';
		foreach ($this->campos as $key => $campo) {
			$row_str.='<th>'.$campo[1].'</th>';
		}
		return '<tr>'.$row_str.'<th>Acciones</th></tr>';
	}



	function post($url,$campos=array(),$extra=''){
	$url=$this->host.$url."/".$this->private_key;
	$campos=$this->FormatearCampos($campos).$extra;

	$curl_connection = curl_init($url);
	curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
	curl_setopt($curl_connection, CURLOPT_USERAGENT,"Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
	curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl_connection, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($curl_connection, CURLOPT_POSTFIELDS,$campos);
	$result = curl_exec($curl_connection);
	//echo $campos;
	//echo $result;
	return json_decode($result);
	}

	function get($url,$campos=array()){
	$url=$this->host.$url."/".$this->private_key;
	//echo $url;
	$curl_connection = curl_init($url);
	curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
	curl_setopt($curl_connection, CURLOPT_USERAGENT,"Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
	curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl_connection, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($curl_connection, CURLOPT_POST, 0);
	curl_setopt($curl_connection, CURLOPT_HTTPGET, 1);
	$result = curl_exec($curl_connection);
	//echo $result;
	return json_decode($result);
	}

	function delete($url,$campos=array()){
	$url=$this->host.$url."/".$this->private_key;
	$curl_connection = curl_init($url);
	curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
	curl_setopt($curl_connection, CURLOPT_USERAGENT,"Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
	curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl_connection, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($curl_connection, CURLOPT_CUSTOMREQUEST, "DELETE");
	$result = curl_exec($curl_connection);
	//echo $result;
	return json_decode($result);
	}
}
?>