var slot_profundidad="0123";
		var slots_chart=["1212","1213","1214"];
		var charts_Data={};
		var graficos=$("#graficos");

		for(var i=0;i<slots_chart.length;i++){
				charts_Data[""+slots_chart[i]]=[];
				graficos.append('<div class="col-sm-4"><div id="chart_'+slots_chart[i]+'" style="width:90%; height:600px; background-color: #FFFFFF;" ></div></div>');
				
		}
		
		var chart=[];
		for(var i=0;i<slots_chart.length;i++){
			var slot_div=slots_chart[i]+"";
			chart[""+slot_div]=AmCharts.makeChart("chart_"+slot_div,
				{
					"type": "serial",
					 "theme": "light",
					"categoryField": "profundidad",
					"rotate": true,
					"marginRight": 10,
                    "autoMarginOffset":20,
                    "marginTop": 7,
					"categoryAxis": {
						
					},
					"chartCursor": {
						
					},
					"chartScrollbar": {
						"enabled":false,
						"autoGridCount": true,
				        "graph": "g1",
				        "scrollbarHeight": 1
					},
					"trendLines": [],
					"graphs": [
						{
							"bullet": "round",
							"id": "AmGraph-1",
							"title": "graph 1",
							"valueField": "valor",
							"balloonText": "[[category]]<br/><b><span style='font-size:14px;'>valor: [[value]]</span></b>",
        
					        "bulletBorderAlpha": 1,
					        "bulletColor": "#FFFFFF",
					        "hideBulletsCount": 50,
					        "title": slot_div,
					    
					        "useLineColorForBulletBorder": true
						}
					],
					"guides": [],
					"valueAxes": [
						{
							"id": "ValueAxis-1",
							"title": "Valor"
						}
					],
					"allLabels": [],
					"balloon": {},
					"legend": {
						"useGraphSettings": true
					},
					"titles": [
						{
							"id": "Title-1",
							"size": 15,
							"text": "Slot "+slot_div
						}
					],
					"dataProvider": charts_Data[slot_div]
				}
			);

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
                         var datos={
							"valor": v_slot,
							"profundidad":profundidad
						};
						//console.log("Buscando..."+n_slot);
						var chartData=chart[""+n_slot].dataProvider;
						if(chartData.length==maximos_puntos_permitidos){
						var temp=chartData.slice(1,chartData.length);
							chartData=temp;
						    chartData.push(datos);
						   // console.log(chartData);
						}
						else{
							chartData.push(datos);
						}
					   chart[""+n_slot].dataProvider=chartData;
                       chart[""+n_slot].validateData();
                       zoomChart(n_slot+"");
                       console.log(n_slot,profundidad,v_slot);
                     }

                       
                    });
