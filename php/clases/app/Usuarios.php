<?php 
 class Usuarios extends Controller{
 var $modelo='Users';
 var $modelo_='User';
 var $tabla='users';
 var $campos=array(array('login','Nick'),array('role_id','Perfil'));
 var $campos_form= [["login","Nick"],['password','Password'],['role_id','Permisos']];
 var $descripcion_modelo='login';

 function Acciones($row){
		
		return '<td>'.$this->AccionVerDisponibilidad($row).$this->AccionVerPermisos($row).$this->AccionModificar($row).$this->AccionEliminar($row).'</td>';
}

function AccionVerPermisos($row){

	return '<a href="?page=Permisos&rel='.$row->id.'"><i style="cursor:pointer" rel="'.$row->id.'" class="el-icon-lock tool_tip " data-original-title="Permisos del Usuario '.$row->{$this->descripcion_modelo}.'"></i></a>&nbsp;&nbsp;';
	}

function AccionVerDisponibilidad($row){

	return '<a href="?page=Disponibilidad&rel='.$row->id.'"><i style="cursor:pointer" rel="'.$row->id.'" class="el-icon-calendar tool_tip " data-original-title="Disponibilidad del Usuario '.$row->{$this->descripcion_modelo}.'"></i></a>&nbsp;&nbsp;';
	}	

}
?>
