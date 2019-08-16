var silenciar=false;

if(puerto>0){
  var socket = io('http://'+host+':'+puerto);
  socket.on('connect', function(){console.log('Conectado');});
  socket.on('disconnect', function(){console.log("Descobnectado");});
  socket.on('chat message', function(msg){
    
      slot=msg.split(":");
      var n_slot=slot[0];
      var v_slot=parseFloat(slot[1]);
      var slotobj=$("."+n_slot);
          slotobj.find("div.metric").text(v_slot);
      var valor_minimo=slotobj.attr("rel-valor-minimo");    
      var valor_maximo=slotobj.attr("rel-valor-maximo");

      if(v_slot<valor_minimo){
        slotobj.css("background-color",slotobj.attr("rel-color-bajo")).css("color",slotobj.attr("rel-fuente-bajo"));
        slotobj.find("a").css("color",slotobj.attr("rel-fuente-bajo"));
        
      }else if(v_slot>valor_maximo){
        
        slotobj.css("background-color",slotobj.attr("rel-color-encima")).css("color",slotobj.attr("rel-fuente-encima"));
        slotobj.find("a").css("color",slotobj.attr("rel-fuente-encima"));
      }else{
        
        slotobj.css("background-color",slotobj.attr("rel-color-normal")).css("color",slotobj.attr("rel-fuente-normal"));
        slotobj.find("a").css("color",slotobj.attr("rel-fuente-normal"));
      }    
              
       // console.log(n_slot,v_slot);
        
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
