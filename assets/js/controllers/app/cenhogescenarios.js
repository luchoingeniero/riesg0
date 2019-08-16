Cenhogescenarios.eventos=function(){

	$(".NivelesEscenarios").change(function(){
		var data="id="+$(this).attr('rel')+"&nivel="+$(this).val();
		$.ajax({
			url:'?page=GuardarObjetoCenhogescenarios',
			method:'post',
			data:data,
			success:function(data){
				console.log(data);
			}
		});

	});

	$(".ObservacionEscenarios").change(function(){
		var data="id="+$(this).attr('rel')+"&observacion="+$(this).val();
		$.ajax({
			url:'?page=GuardarObjetoCenhogescenarios',
			method:'post',
			data:data,
			success:function(data){
				console.log(data);
			}
		});
	});
}