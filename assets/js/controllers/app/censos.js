var comunidad_id_='';
var lider_id_='';
Censos.eventos=function(){
	var obj=this;
	/*evento Modificar*/
	$(".btn-modificar-"+this.modelo).unbind( "click");
		$(".btn-modificar-"+this.modelo).click(function(){
		$("#btn-guardar-"+obj.modelo).show();
		$("#btn-guardar-"+obj.modelo).val("Actualizar");
    	var id=$(this).attr("rel");
    	obj.ModificarObjeto(id);
    	
  	  });

	/*evento Ver*/
	$(".btn-ver-"+this.modelo).unbind( "click");
		$(".btn-ver-"+this.modelo).click(function(){
			
		$("#btn-guardar-"+obj.modelo).hide();
    	var id=$(this).attr("rel");
    	obj.VerObjeto(id);
    	
  	  });	

	/*Nuevo Objeto*/
	/*evento Limpiar Formulario*/	
	 $("#btn-nuevo-"+this.modelo).unbind( "click");
  	  $("#btn-nuevo-"+this.modelo).click(function(){
	   		obj.LimpiarForm();
	   		console.log("Nuevo Censo");
	   		$("#municipio_id").change();
	   		$('select').selectpicker('refresh');
	   		$('#FormModal').modal();

	  	
	  });

	/*evento Limpiar Formulario*/	
	 $("#btn-cancelar-"+this.modelo).unbind( "click");
  	  $("#btn-cancelar-"+this.modelo).click(function(){
  	  	    $("#btn-guardar-"+this.modelo).show();
	   		obj.LimpiarForm();
	  	
	  });
	  	
  	/*Evento Elimniar Registro*/  

	$(".btn-eliminar-"+this.modelo).unbind( "click");
  	  $(".btn-eliminar-"+this.modelo).click(function(){
      	var id=$(this).attr("rel");
      	var rel=$(this).attr("rel2");
      	var page=$(this).attr("page");

    	if(confirm('Estas seguro de desea eliminar el Registro?')){
    		location.href="?page=EliminarObjeto"+obj.modelo+"&rel="+id+"&rel2="+rel+"&pagina="+page
    	}
    	    	
  	  });

  	  	/*Evento Cerrar Censo*/  

	$(".btn-cerrar-"+this.modelo).unbind( "click");
  	  $(".btn-cerrar-"+this.modelo).click(function(){
      	var id=$(this).attr("rel");
      	var rel=$(this).attr("rel2");
      	var page=$(this).attr("page");

    	if(confirm('Estas seguro de desea cerrar el Censo?')){
    		location.href="?page=CerrarCenso&rel="+id+"&rel2="+rel+"&pagina="+page
    	}
    	    	
  	  });

  	$("#formObjeto"+this.modelo).unbind("submit");
  	$("#formObjeto"+this.modelo).submit(function( event ) {
  		var form=this;
		if (obj.validar_existe==true){
			obj.ValidarExisteObject(form);
		    event.preventDefault();
		}
		
	});




}

Censos.MostrarObjeto = function(obj_data) {
	$("#id").val(obj_data.id);
	$("#btn-guardar-"+this.modelo).val("Actualizar");
	$("#span-accion-"+this.modelo).text("Modificar");

	for(var i=0;i<this.campos_form.length;i++){
    		row=this.campos_form[i][0];
    		val=obj_data[row];
    		if(row=="comunidad_id"){comunidad_id_=val;}
    		if(row=="lider_id"){lider_id_=val;}	
    		
    		$("#"+row).val(val);	
    	}
    $("#municipio_id").change();
    $('select').selectpicker('refresh');		
    $('#FormModal').modal();
};

Censos.LimpiarForm=function(){
		$("#btn-guardar-"+this.modelo).show();
		$("#formObjeto"+this.modelo).find('input, textarea, button, select').removeAttr('disabled');
		$("#btn-guardar-"+this.modelo).val("Guardar");
		$("#span-accion-"+this.modelo).text("Nuevo");

		$("#id").val("-1");
	   	for(var i=0;i<this.campos_form.length;i++){
    		row=this.campos_form[i][0];
    		
    		if(row=="comunidad_id"){comunidad_id_='';}
    		if(row=="lider_id"){lider_id_='';}	

    		if($("#"+row).attr("type")!="hidden"){
    		$("#"+row).val('');		
    		}
    		
    	}
$('select').selectpicker('refresh');	
	}





$("#municipio_id").change(function(){
	var mun_id=$(this).val();
	$.ajax({
		url:'?page=ComunidadesList&rel='+mun_id,
		success:function(data){
			comunidades=jQuery.parseJSON(data);
			CargarComunidades(comunidades);
		}
	});
		
});

$("#comunidad_id").change(function(){

var com_id=$(this).val();
	$.ajax({
		url:'?page=LideresList&rel='+com_id,
		success:function(data){
			lideres=jQuery.parseJSON(data);
			CargarLideres(lideres);
		}
	});
	$('select').selectpicker('refresh');	

});

function CargarComunidades(datos){
	$("#comunidad_id").html('');
   for (var i = 0; i<datos.length; i++) {
		$("#comunidad_id").append('<option value="'+datos[i].id+'">'+datos[i].descripcion+'</option>');
	};
	$("#comunidad_id").val(comunidad_id_);
	$('select').selectpicker('refresh');	
	$("#comunidad_id").change();
}

function CargarLideres(datos){
	$("#lider_id").html('');
	
	for (var i = 0; i<datos.length; i++) {
		$("#lider_id").append('<option value="'+datos[i].id+'">'+datos[i].identificacion+' '+datos[i].nombre1+' '+datos[i].apellido1+'</option>');
	};
	$("#lider_id").val(lider_id_);
	
$('select').selectpicker('refresh');	
}


$("#municipio_id").val('');
Censos.eventos();

$("#CargarLider").click(function(){
	var lider_id=$("#lider_id").val();
	if(!lider_id){alert("No Tiene Ningun Lider Seleccionado");}
	else{
		$.ajax({
			url:'?page=ObtenerObjetoLideres&rel='+lider_id,
			success:function(data){
				lider=jQuery.parseJSON(data);
				$("#tipodocumento_id").val(lider.tipodocumento_id);
				$("#identificacion").val(lider.identificacion);
				$("#apellido1").val(lider.apellido1);
				$("#apellido2").val(lider.apellido2);
				$("#nombre1").val(lider.nombre1);
				$("#nombre2").val(lider.nombre2);
				$("#fechanacimiento").val(lider.fechanacimiento);
				$("#telefono").val(lider.telefono);
				$("#email").val(lider.email);

				$('#FormModalLider').show();
				$('#FormModalLider').modal();
			}
		});

	
	}
	$('select').selectpicker('refresh');	
});

//$('select').selectpicker('refresh');	

