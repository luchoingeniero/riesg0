var slot_profundidad="0123";
		//var slots_chart=["1212","1213","1214"];
		var charts_Data={};
		var graficos=$("#graficos");

		for(var i=0;i<slots_chart.length;i++){
				charts_Data[""+slots_chart[i]]=[];
				graficos.append('<div class="col-sm-4"><div id="chart_'+slots_chart[i]+'" style="width:90%; height:600px; background-color: #FFFFFF;" ></div></div>');
				
		}
		
		var chart=[];
		for(var i=0;i<slots_chart.length;i++){
			var slot_div=slots_chart[i]+"";
			var contenedor="chart_"+slot_div;
			chart[""+slot_div]=new Highcharts.Chart({
          
            chart: {
                renderTo: contenedor, 
                backgroundColor: '#FCFFC5',
                zoomType: 'x',
                 inverted: true,
                events: {
                load: function() {
                   console.log("Pilas");
                    
                }
            }
            },

        tooltip: {
            shared: true,
            valueSuffix: ' miles'
        },
            title: {
                text: 'PARAMETROS EN TIEMPO REAL'
            },
            subtitle: {
                text: document.ontouchstart === undefined ?
                        'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
            },
            xAxis: {
                
                 marginTop: 20,
            marginBottom: 20,
            marginLeft: 20,
            marginRight:20,
                 "tickWidth": 0,
                "gridLineWidth": 1,
                "gridLineDashStyle": "ShortDot",
                "gridLineColor": "#c1c2c3",
               minorGridLineWidth: 2,
                 minorTickLength: 10,
            minorTickInterval: 'auto',
                type: 'number',
                
            },
            yAxis: {
                
             
                title: {
                    text: 'DATOS'
                }
            },
            legend: {
                enabled: true
            },
            plotOptions: {
                area: {
                    fillColor: {
                        linearGradient: {
                            x1: 0,
                            y1: 0,
                            x2: 0,
                            y2: 0
                        },
                        stops: [
                            [0, Highcharts.getOptions().colors[0]],
                            [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                        ]
                    },
                    marker: {
                        radius: 2
                    },
                    lineWidth: 1,
                    states: {
                        hover: {
                            lineWidth: 2
                        }
                    },
                    threshold: null
                }
            },

            series: [{
                
                type: 'line',
                name: slot_div,
                data: charts_Data[slot_div]
            }]
        });
   




		}

		function zoomChart(slot) {
    // different zoom methods can be used - zoomToIndexes, zoomToDates, zoomToCategoryValues
    	//chart[slot].zoomToIndexes(charts_Data[slot].length - 5, charts_Data[slot].length - 1);
		}
		

var profundidad=null;
var socket_chart = io('http://'+host+':'+puerto);
var maximos_puntos_permitidos=40;
socket_chart.on('connect', function(){console.log('Conectado');});
socket_chart.on('disconnect', function(){console.log("Descobnectado");});
socket_chart.on('chat message', function (msg) {
      	console.log("Erorr"+msg);
                         slot=msg.split(":");
                          var n_slot=slot[0];
                         var v_slot=parseFloat(slot[1]);
                        //console.log("Esta?"+jQuery.inArray( n_slot, slots_chart ));
                         if(n_slot==slot_profundidad){
                         	profundidad=v_slot;
                         }
                         else if( jQuery.inArray( n_slot, slots_chart )!=-1&&profundidad!=null){
                         var datos=[profundidad,v_slot];
							
						//console.log("Buscando..."+n_slot);
					  var series = chart[""+n_slot].series[0];
                       series.addPoint(datos);




                     }

                       
                    });
