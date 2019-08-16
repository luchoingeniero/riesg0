$("#grafico-personas").click(function(){
	$("#ModalGraficos").modal();
	$.ajax({
		url:'?page=BuscarCensosIntegrantesEdades',
		success:function(data){
			$("#container-grafico-p").html('');
			$("#container-grafico-p").append(' <div id="container-grafico" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>');
			CrearGraficaCensosIntegrantesEdades(jQuery.parseJSON(data));
		}
	});

});

function CrearGraficaCensosIntegrantesEdades(datos){

$(function () {
    // Age categories
    var categories = datos.rangos;
   
    $(document).ready(function () {
       $('#container-grafico').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Estadistica General de Afectados por Edades'
            },
            subtitle: {
                text: ''
            },
            xAxis: [{
                categories: categories,
                reversed: false,
                labels: {
                    step: 1
                }
            }, { // mirror axis on right side
                opposite: true,
                reversed: false,
                categories: categories,
                linkedTo: 0,
                labels: {
                    step: 1
                }
            }],
            yAxis: {
                title: {
                    text: null
                },
                labels: {
                    formatter: function () {
                        return Math.abs(this.value) ;
                    }
                }
            },

            plotOptions: {
                series: {
                    stacking: 'normal'
                }
            },

            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + ' en edad ' + this.point.category + '</b><br/>' +
                        'personas: ' + Highcharts.numberFormat(Math.abs(this.point.y), 0);
                }
            },

            series: [{
                name: 'Hombres',
                data: datos.M
            }, {
                name: 'Mujeres',
                data: datos.F
            }]
        });
    });

});


}