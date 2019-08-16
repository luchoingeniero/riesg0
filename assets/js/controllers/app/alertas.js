$("abbr.timeago").timeago();
 $( ".item-alerta-list").unbind( "click" );
 $(".item-alerta-list").click(function(){
         MostrarAlerta($(this).attr('rel'));
    });

var Alerta = new Controller("Alertas");
Alerta.Atender=function(){
	
	if (confirm("Estas Seguro de Marcar la Alerta como Atendida?")){

	var data="id="+$("#alerta_id").val()+"&respuestasalerta_id="+$("#respuestasalerta_id").val()+"&"+
				  "nombrecontacto="+$("#nombrecontacto").val()+"&"+
				  "telcontacto="+$("#telcontacto").val()+"&"+
				 "crear_censo="+(($("#crear-censo").is(':checked'))?'Si':'');
				

	$("#nombrecontacto").val("");
	$("#telcontacto").val("");
	$("#crear-censo").prop("checked", false);
	$('#crear-censo').change();

	$.ajax(
		{   url:'?page=GuardarObjetoAlertas_',
			method:'post',
			data:data,
			success:function(data){
				Alerta.callback_atender(jQuery.parseJSON(data));

			}
		});

	//Alerta.obj_Riesg0.post({request:Alerta.obj.modelo+'/'+$("#alerta_id").val(),d:data,callback:Alerta.callback_atender});
	

   }
   $('select').selectpicker('refresh');	
}

Alerta.callback_atender=function(data){
	$(".item_alerta_"+data.id).remove();
	$(".cerrar-overlay").click();
	$.growl.notice({ message: "Alerta Atendida Satisfactoriamente!!" });
};

$("#AsignarAlerta").unbind("submit");
  	$("#AsignarAlerta").submit(function( event ) {
  		 Alerta.AsignarVoluntario();
		 event.preventDefault();
		
	});

$("#RespuestaCenso").unbind("submit");
  	$("#RespuestaCenso").submit(function( event ) {
  		 Alerta.Atender();
		 event.preventDefault();
		
	});	


Alerta.AsignarVoluntario=function(){
	var user_id=$("#user_id").val();
	var id=$("#alerta_id").val();
   $.ajax({
		url:'?page=GuardarObjetoAlertas',
		data:'id='+id+'&user_id='+user_id,
		method:'post',
		success:function(data){
			Alerta.callback_as(jQuery.parseJSON(data));
		}
	});
   $('select').selectpicker('refresh');	
	
};

Alerta.callback_as=function(data){
	$(".item_alerta_"+data.id).remove();
	$(".cerrar-overlay").click();
	pubnub.publish({channel:'alertas_asignadas_'+data.user_id,message:data});
	$.growl.notice({ message: "Alerta Asignada al Voluntario Satisfactoriamente!!" });
};


function MostrarAlerta(rel_id){
	//var url_=Riesg0.host+'Alertas/'+rel_id+'/'+Riesg0.secret_key;
	$("#user_id").html('');
	var url_="?page=ObtenerObjetoAlertas&rel="+rel_id;
	console.log(url_);
	 $.ajax({
            url:url_,
             success:function(data){
             	//Usuario.ResfreshList({callback:CargarUsuarios,p:2});
             	//Respuestasalerta.ResfreshList({callback:CargarRespuestasalertas});
                
                $.ajax({
                	url:'?page=DisponiblidadUsuarios',
                	success:function(d){
                		usuarios=jQuery.parseJSON(d);
                		for(var i=0;i<usuarios.length;i++){
                			console.log(usuarios[i]);
                			$("#user_id").append('<option value="'+usuarios[i].id+'">'+usuarios[i].login+'</option>');
                		}
                		 $('select').selectpicker('refresh');	
                		CargarAlertaOverlay(jQuery.parseJSON(data));
                	}
                });
                //loading.hide();
             },
             error:function(){
                alert("Oops!! No Pude Comunicarme con el Servidor ");
                //loading.hide();
             }
        });

	$("#div-overlay").removeClass("overlay-out").addClass('overlay').show();
}

function CargarAlertaOverlay(alerta_obj){
	var time=new Date().getTime();
	$("#overlay-imagen").hide();
	var nombres=(alerta_obj.invitado)?alerta_obj.invitado.nombres:'';
	var categoria=(alerta_obj.categoria)?alerta_obj.categoria.descripcion:'';
	var nivel=(alerta_obj.nivel)?alerta_obj.nivel.descripcion:'';	
	var usuario_asignado=(alerta_obj.user)?alerta_obj.user.login:'';
	$("#alerta_id").val(alerta_obj.id);
	$("#overlay-img").attr("src",'http://riesg0.gyltechnologies.com/archivos/invitados/'+alerta_obj.invitado_id+'.jpg?time='+time);
	$("#overlay-nombres").text(nombres);
	$("#overlay-categoria").text(categoria);
	$("#overlay-nivel").text(nivel);
	$("#overlay-direccion").text("en "+alerta_obj.direccion);
	$("#volutario-asignado").text(usuario_asignado);
	if(alerta_obj.foto){
	$("#overlay_imagen_").attr("src",'http://riesg0.gyltechnologies.com/archivos/alertas/'+alerta_obj.id+'.jpg');
	$("#overlay-imagen").show();	
	}
	$("#nombrecontacto").val("");
	$("#telcontacto").val("");
	$("#crear-censo").prop("checked", false);
	$('#crear-censo').change();

	CrearMapa(alerta_obj.posicion);

}


function CrearMapa(pos){
	var posicion=pos.split(',');
	
	

	try{
      
        var latitude=posicion[0];
		var longitude=posicion[1];
        position_actual = new window.google.maps.LatLng(latitude, longitude);

        var mapOptions = {
            draggable: true,
            center: position_actual,
            zoom: 17,
            mapTypeId: window.google.maps.MapTypeId.ROADMAP
        };

        var map = new window.google.maps.Map(document.getElementById("maps_canvas_overlay"), mapOptions);
    
        var marker = new window.google.maps.Marker({
              position: position_actual,
              map: map,
              title: 'Emergencia Aqui'
          });
        


  
}catch(e){alert(e);}
}



function CargarAlerta_(alerta_obj){
	 CargarAlerta(alerta_obj,$("#content-table"));
	var nombres=(alerta_obj.invitado)?alerta_obj.invitado.nombres:'';
	var categoria=(alerta_obj.categoria)?alerta_obj.categoria.descripcion:'';
	var nivel=(alerta_obj.nivel)?alerta_obj.nivel.descripcion:'';	
	$.growl.notice({ message:nombres+" Alertó Sobre "+categoria+" Nivel "+nivel+" cerca de "+alerta_obj.direccion });

}

function CargarAlerta_As(alerta_obj){
	 CargarAlerta(alerta_obj,$("#content-table3"));
	var nombres=(alerta_obj.invitado)?alerta_obj.invitado.nombres:'';
	var categoria=(alerta_obj.categoria)?alerta_obj.categoria.descripcion:'';
	var nivel=(alerta_obj.nivel)?alerta_obj.nivel.descripcion:'';	

	$.growl.notice({ message:"Se te Asigno una  Alerta Sobre "+categoria+" Nivel "+nivel+" cerca de "+alerta_obj.direccion });

}

function CargarAlerta(alerta_obj,s){
var time=new Date().getTime();
var nombres=(alerta_obj.invitado)?alerta_obj.invitado.nombres:'';
var categoria=(alerta_obj.categoria)?alerta_obj.categoria.descripcion:'';
var nivel=(alerta_obj.nivel)?alerta_obj.nivel.descripcion:'';	
var hace=''; 
var str='<div  rel="'+alerta_obj.id+'" class="item-alerta item_alerta_'+alerta_obj.id+' item-alerta-list mdl-js-button mdl-js-ripple-effect" >'+
 		'<div class="item-alerta-body">'+
		'	<img src="http://riesg0.gyltechnologies.com/archivos/invitados/'+alerta_obj.invitado_id+'.jpg" >'+
		'	<div>'+
		'	<strong>'+nombres+'</strong> Alertó Sobre <strong>'+categoria+'</strong> Nivel <strong>'+nivel+'</strong> '+
		
		'	</div>'+
		'	<p  >'+
		'	<span > en '+alerta_obj.direccion+'</span></p>'+
		'<p><abbr class="timeago" title="'+alerta_obj.fecha+'">'+alerta_obj.fecha+'</abbr></p>'+
		'</div>'+
		'</div><hr class="hr-divider item_alerta_'+alerta_obj.id+'" >';
s.append(str);

 $("abbr.timeago").timeago();
 $( ".item-alerta-list").unbind( "click" );
 $(".item-alerta-list").click(function(){
         MostrarAlerta($(this).attr('rel'));
    });


}


$('#crear-censo').change(function() {
        if($(this).is(":checked")) {
        	$("#nombrecontacto").attr("required","required");
        	$("#telcontacto").attr("required","required");
        	$(".datos-contacto").show();
           
        }else{
        	$(".datos-contacto").hide();
        	$("#nombrecontacto").removeAttr("required");
        	$("#telcontacto").removeAttr("required");
        }
        
    });

$('#crear-censo').change();