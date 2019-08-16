<?php 
 class Alertas extends Controller{
 var $modelo='Alertas';
 var $modelo_='Alerta';
 var $tabla="alertas";
 var $label="Alertas";
 var $campos=array(array('campo1','campo1'));
 var $campos_form=array(array('campo1','campo1'));
 var $descripcion_modelo='descripcion';

 function MostrarObjeto($alertas){
 	$salida='';
 		foreach ($alertas as $key => $alerta) {
 			$salida.=$this->CargarAlerta($alerta);
 		}
 		return $salida;
 		
 }

 function CargarAlerta($alerta){
 	$str='';
 	$nombres=(isset($alerta->invitado->nombres))?$alerta->invitado->nombres:'';
 	$categoria=(isset($alerta->invitado->categoria))?$alerta->invitado->categoria:'';
 	$nivel=(isset($alerta->invitado->nivel))?$alerta->invitado->nivel:'';
	$str='<div  rel="'.$alerta->id.'" class="item-alerta item_alerta_'.$alerta->id.' item-alerta-list mdl-js-button mdl-js-ripple-effect" >'.
 		'<div class="item-alerta-body">'.
		'	<img src="http://riesg0.gyltechnologies.com/archivos/invitados/'.$alerta->invitado_id.'.jpg" >'.
		'	<div>'.
		'	<strong>'.$nombres.'</strong> Alertó Sobre <strong>'.$categoria.'</strong> Nivel <strong>'.$nivel.'</strong> '.
		
		'	</div>'.
		'	<p  >'.
		'	<span > en '.$alerta->direccion.'</span></p>'.
		'<p><abbr class="timeago" title="'.$alerta->fecha.'">'.$alerta->fecha.'</abbr></p>'.
		'</div>'.
		'</div><hr class="hr-divider item_alerta_'.$alerta->id.'" >';

	return $str;	
 }

 function BloquearPagina($tabla){
		if(!$this->TienePermiso_('LEER',$_SESSION['User']->id,$tabla)){
			$_SESSION['mensaje']['error']="Opss! Intestastes Acceder a un Lugar Donde No tienes Permiso!!";
			header("location:home.php");
			exit(0);
		}
	}


}
?>
