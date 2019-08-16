var Usuario = new Controller("Users");
Usuario.MostrarObjeto = function(obj_data) {
	$("#id").val(obj_data.id);
	$("#password_old").val(obj_data.password);
	for(var i=0;i<this.campos_form.length;i++){
    		row=this.campos_form[i][0];
    		val=obj_data[row];
    		$("#"+row).val(val);	
    	}
    $('#FormModal').modal();
    $('select').selectpicker('refresh');	
};
