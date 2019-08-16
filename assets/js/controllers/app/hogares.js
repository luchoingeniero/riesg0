$("#codigo").unbind( "change");
	  $("#codigo").change(function(){
	  	var cod=$(this).val();
	  	$.ajax({
	  		url:'?page=ExisteObjetoHogares&codigo='+cod,
	  		success:function(data){
	  			hogar_obj=jQuery.parseJSON(data);
	  			if(hogar_obj.id){
	  				$("#id").val(hogar_obj.id);
			    	for(var i=0;i<Hogar.campos_form.length;i++){
			    		row=Hogar.campos_form[i][0];
			    		val=hogar_obj[row];
			    		$("#"+row).val(val);	
			    	}

	  			}
	  		}
	  	});
	  		});
	  	


