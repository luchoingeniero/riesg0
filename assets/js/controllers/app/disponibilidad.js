Disponibilidad.ValidarExisteObject=function(form){
	var obj=this;
	var url_='?page=ExisteObjeto'+this.modelo+'&rel='+$("#id").val()+"&usuario_id="+$("#usuario_id").val()+"&data="+$("#dia").val();
	$.ajax({
			url:url_,
			success:function(data){
				datos=jQuery.parseJSON(data);
				console.log(datos);
				if(datos.id){
					$.growl.error({ message: obj.modelo+" ("+datos.dia+") ya Existe!!"});
				}else{
					form.submit();
				}
			},
			error:function(){
				$.growl.error({ message:"Ocurrio un Error Mientras Consultaba Intente de Nuevo!!"});
			}
	});
}


$(document).ready(function() {
                    function startChange() {
                        var startTime = start.value();

                        if (startTime) {
                            startTime = new Date(startTime);

                            end.max("23:00");

                            startTime.setMinutes(startTime.getMinutes() + this.options.interval);

                            end.min(startTime);
                            end.value(startTime);
                        }
                    }

                    //init start timepicker
                    var start = $("#hora_inicial").kendoTimePicker({
                        change: startChange,
                        format:'HH:mm'
                    }).data("kendoTimePicker");

                    //init end timepicker
                    var end = $("#hora_final").kendoTimePicker({ format:'HH:mm'}).data("kendoTimePicker");

                    //define min/max range
                    start.min("00:00");
                    start.max("22:00");

                    //define min/max range
                    end.min("01:00");
                    end.max("23:00");
                });