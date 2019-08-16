$(".permisos").change(function(){
	var activo=$(this).is(':checked');

	$.ajax({
		url:'?page=ModificarPermisos',
		method:'post',
		data:'rel='+($(this).attr('rel'))+'&accion='+($(this).attr('id'))+'&operacion='+activo,
		success:function(data){
			console.log(data);
		}
	});
});

$(".sel-all").change(function(){
	var temp=$(this).attr("rel");
	var activo=$(this).is(':checked');
	if(activo){
	$(".permisos-"+temp).each(function() {
		console.log($(this));
		$(this).attr("checked",true).trigger('rerender');
		$(this).change();
	});
	}else{
	$(".permisos-"+temp).each(function() {
		console.log($(this));
		$(this).removeAttr('checked').trigger('rerender');
		$(this).change();
	});
	}
});