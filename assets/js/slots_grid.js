

var silenciar=false;

if(puerto>0){
  var socket = io('http://'+host+':'+puerto);
  socket.on('connect', function(){console.log('Conectado');});
  socket.on('disconnect', function(){console.log("Descobnectado");});
  socket.on('chat message', function(msg){
    
      slot=msg.split(":");
      var n_slot=slot[0];
      var v_slot=parseFloat(slot[1]);
      var slotobj=$("#"+n_slot);
          slotobj.find("div.metric").text(v_slot);
      var valor_minimo=slotobj.attr("rel-valor-minimo");    
      var valor_maximo=slotobj.attr("rel-valor-maximo");

      if(v_slot<valor_minimo){
        slotobj.addClass("blink");
        slotobj.css("background-color",slotobj.attr("rel-color-bajo")).css("color",slotobj.attr("rel-fuente-bajo"));
        slotobj.find("a").css("color",slotobj.attr("rel-fuente-bajo"));
        if(!slotobj.find("#alarma-audio").length&&!silenciar){
        slotobj.append('<div id="alarma-audio"><audio style="display:none;"  src="assets/audio/beep-09.mp3" controls autoplay loop></audio></div>');
         }
      }else if(v_slot>valor_maximo){
        if(!slotobj.find("#alarma-audio").length&&!silenciar){
        slotobj.append('<div id="alarma-audio"><audio style="display:none;"  src="assets/audio/beep-09.mp3" controls autoplay loop></audio></div>');
         }
        slotobj.addClass("blink");
        slotobj.css("background-color",slotobj.attr("rel-color-encima")).css("color",slotobj.attr("rel-fuente-encima"));
        slotobj.find("a").css("color",slotobj.attr("rel-fuente-encima"));
      }else{
        slotobj.find("#alarma-audio").html('').remove();
        slotobj.removeClass("blink");
        slotobj.css("background-color",slotobj.attr("rel-color-normal")).css("color",slotobj.attr("rel-fuente-normal"));
        slotobj.find("a").css("color",slotobj.attr("rel-fuente-normal"));
      }    
              
        console.log(n_slot,v_slot);
        
      });

}

              $("#maximizar").click(function(){
                $(this).hide();
                $(this).parent().parent().addClass("full-screen");
                $("#minimizar").show();
                
              });
                $("#minimizar").click(function(){
                $(this).hide();
                $("#maximizar").show();
                $(this).parent().parent().removeClass("full-screen");
                
              });

               $("#escuchar").click(function(){
                $(this).hide();
                silenciar=false;
               $("#silenciar").show();
                
              });
                $("#silenciar").click(function(){
                $(this).hide();
                silenciar=true;
                $("#escuchar").show();
                 $("#sortable").children().each(function(index){
                    $(this).find("#alarma-audio").html('').remove();

                  });
                
                
              });



               $( "#sortable" ).sortable({
      revert: true,
       stop: function (event, ui) {
        RecorrerSlots();
        
    }
    });
  $( "#sortable" ).disableSelection();

  function RecorrerSlots(){
    $("#sortable").children().each(function(index){
    $(this).removeClass("ui-sortable-handle");
     var configuracion=$(this).attr("rel-configuracion");
     if(!configuracion){
        $(this).attr('rel-configuracion','-1');
        $(this).attr('id',generateUUID());
     }

     GuardarConfiguracion(configuracion,index);

    });


}

function GuardarConfiguracion(id_configuracion,posicion){
  $.ajax({
    url:'home.php?page=guardar-configuracion&id='+id_configuracion+'&posicion='+posicion,
    success:function(data){
      console.log(data);

    }
  });
}

function generateUUID(){
    var d = new Date().getTime();
    var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
        var r = (d + Math.random()*16)%16 | 0;
        d = Math.floor(d/16);
        return (c=='x' ? r : (r&0x3|0x8)).toString(16);
    });
    return uuid;
};
 
