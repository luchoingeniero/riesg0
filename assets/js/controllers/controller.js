function Controller(modelo){
	this.modelo=modelo;
	this.validar_existe=false;
	this.campo_unico='descripcion';
}

Controller.prototype.ModificarObjeto = function(obj_id) {
  var obj=this;	
  var url='?page=ObtenerObjeto'+obj.modelo+"&rel="+obj_id;
		$.ajax({
			url:url,
			success:function(data_obj){
				obj.MostrarObjeto(jQuery.parseJSON(data_obj));
				$("#formObjeto"+obj.modelo).find('input, textarea, button, select').removeAttr('disabled');
			},
			error:function(){
				$.growl.error({ message: "Ocurrio un Error intentando acceder a la direccion: "+url});
			}
		});

};

Controller.prototype.VerObjeto = function(obj_id) {
  var obj=this;	
  var url='?page=ObtenerObjeto'+obj.modelo+"&rel="+obj_id;
		$.ajax({
			url:url,
			success:function(data_obj){
				obj.MostrarObjeto(jQuery.parseJSON(data_obj));
				$("#formObjeto"+obj.modelo).find('input, textarea,select').attr('disabled','disabled');
			},
			error:function(){
				$.growl.error({ message: "Ocurrio un Error intentando acceder a la direccion: "+url});
			}
		});

};


Controller.prototype.MostrarObjeto = function(obj_data) {
	$("#id").val(obj_data.id);
	
	$("#span-accion-"+this.modelo).text("Modificar");

	for(var i=0;i<this.campos_form.length;i++){
    		row=this.campos_form[i][0];
    		
    		val=obj_data[row];
    		
    		$("#"+row).val(val);	
    	}
    $('select').selectpicker('refresh');	
    $('#FormModal').modal();
};

Controller.prototype.eventos=function(){
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
    	if(confirm('Estas seguro de desea eliminar el Registro?')){
    		location.href="?page=EliminarObjeto"+obj.modelo+"&rel="+id+"&rel2="+rel
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

Controller.prototype.ValidarExisteObject=function(form){
	var obj=this;
	var url_='?page=ExisteObjeto'+this.modelo+'&rel='+$("#id").val()+"&data="+$("#"+this.campo_unico).val();
	$.ajax({
			url:url_,
			success:function(data){
				datos=jQuery.parseJSON(data);
				console.log(datos);
				if(datos.id){
					$.growl.error({ message: obj.modelo+" ("+datos[obj.campo_unico]+") ya Existe!!"});
				}else{
					form.submit();
				}
			},
			error:function(){
				$.growl.error({ message:"Ocurrio un Error Mientras Consultaba Intente de Nuevo!!"});
			}
	});
}

Controller.prototype.LimpiarForm=function(){
		$("#btn-guardar-"+this.modelo).show();
		$("#btn-guardar-"+this.modelo).val("Guardar");
		$("#span-accion-"+this.modelo).text("Nuevo");
		$("#formObjeto"+this.modelo).find('input, textarea, button, select').removeAttr('disabled');

		$("#id").val("-1");
	   	for(var i=0;i<this.campos_form.length;i++){
    		row=this.campos_form[i][0];
    		if($("#"+row).attr("type")!="hidden"){
    		$("#"+row).val('');		
    		}
    		
    	}

    	$('select').selectpicker('refresh');	

	}